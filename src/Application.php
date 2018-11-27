<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.3.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App;

use App\Middleware\HttpOptionsMiddleware;
use Cake\Core\Configure;
use Cake\Core\Exception\MissingPluginException;
use Cake\Error\Middleware\ErrorHandlerMiddleware;
use Cake\Http\BaseApplication;
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\Middleware\AssetMiddleware;
use Cake\Routing\Middleware\RoutingMiddleware;
use Cake\Http\Middleware\EncryptedCookieMiddleware;
use Cake\Http\Middleware\BodyParserMiddleware;
use Authentication\AuthenticationService;
use Authentication\AuthenticationServiceProviderInterface;
use Authentication\Middleware\AuthenticationMiddleware;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Authorization\AuthorizationService;
use Authorization\AuthorizationServiceProviderInterface;
use Authorization\Middleware\AuthorizationMiddleware;
use Authorization\Policy\OrmResolver;
use Authorization\Policy\Exception\MissingMethodException;
use Authorization\Exception\MissingIdentityException;

/**
 * Application setup class.
 *
 * This defines the bootstrapping logic and middleware layers you
 * want to use in your application.
 */
class Application extends BaseApplication implements AuthenticationServiceProviderInterface, AuthorizationServiceProviderInterface
{
    /**
     * {@inheritDoc}
     */
    public function bootstrap()
    {
        // Call parent to load bootstrap from files.
        parent::bootstrap();

        if (PHP_SAPI === 'cli') {
            try {
                $this->addPlugin('Bake');
            } catch (MissingPluginException $e) {
                // Do not halt if the plugin is missing
            }

            $this->addPlugin('Migrations');
        }
        /*
         * Adds the Authentication Plugin
         */
        $this->addPlugin('Authentication');
        /*
         * Adds the Authorization Plugin
         */
        $this->addPlugin('Authorization');
        /*
         * Only try to load DebugKit in development mode
         * Debug Kit should not be installed on a production system
         */
        if (Configure::read('debug')) {
            $this->addPlugin(\DebugKit\Plugin::class);
        }
    }

    /**
     * Setup the middleware queue your application will use.
     *
     * @param \Cake\Http\MiddlewareQueue $middlewareQueue The middleware queue to setup.
     * @return \Cake\Http\MiddlewareQueue The updated middleware queue.
     */
    public function middleware($middlewareQueue)
    {
        /*
         * Deines the the Authentication middleware
         * Configures the Unauthenticated Redirect action
         */
        $authentication = new AuthenticationMiddleware($this, ['unauthenticatedRedirect' => '/users/login']);

        $middlewareQueue
            // Catch any exceptions in the lower layers,
            // and make an error page/response
            ->add(ErrorHandlerMiddleware::class)

            // Handle plugin/theme assets like CakePHP normally does.
            ->add(new AssetMiddleware([
                'cacheTime' => Configure::read('Asset.cacheTime')
            ]))
            // HttpOptionsMiddleware is needed to respond preflight requeriments for the OPTIONS method
            ->add(new HttpOptionsMiddleware())

            // Add routing middleware.
            // Routes collection cache enabled by default, to disable route caching
            // pass null as cacheConfig, example: `new RoutingMiddleware($this)`
            // you might want to disable this cache in case your routing is extremely simple
            ->add(new RoutingMiddleware($this, '_cake_routes_'))
            // Body Parser is needed to decode the json credentials needed for the Form authenticator
            ->add(new BodyParserMiddleware())
            ->add($authentication);
        $middlewareQueue->add(new AuthorizationMiddleware($this, [
            'unauthorizedHandler' => [
                'className' => 'Redirect',
                'url' => '/users/login',
                'queryParam' => 'redirectUrl',
                'exceptions' => [
                    MissingIdentityException::class,
                    MissingMethodException::class
                ],
            ],
            'identityDecorator' => function ($auth, $user) {
                return $user->setAuthorization($auth);
            }
        ]));

        return $middlewareQueue;
    }

    /**
     * Returns a service provider instance.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request Request
     * @param \Psr\Http\Message\ResponseInterface $response Response
     * @return \Authentication\AuthenticationServiceInterface
     */
    public function getAuthenticationService(ServerRequestInterface $request, ResponseInterface $response)
    {
        $service = new AuthenticationService();

        $fields = [
            'username' => 'email',
            'password' => 'password'
        ];

        // Load identifiers
        $service->loadIdentifier('Authentication.JwtSubject');
        $service->loadIdentifier('Authentication.Password', compact('fields'));

        // Load the authenticators, you want session first
        // Loads JWT authenticator with returnPayload configuration in false so the authorization plugin can call
        // the Indentifier Class, if this is set to no the identifier only has the basic payload.
        $service->loadAuthenticator('Authentication.JWT',['returnPayload' => false]);
        $service->loadAuthenticator('Authentication.Session');
        $service->loadAuthenticator('Authentication.Form', [
            'fields' => $fields,
            // we need to inform to the Form authenticator all the login URL's we will be allowed
            // to use the authenticate method, so we added the /api/users/token.json
            'loginUrl' => ['/users/login','/api/users/token.json']
        ]);

        return $service;
    }

    public function getAuthorizationService(ServerRequestInterface $request, ResponseInterface $response){
        $resolver = new OrmResolver();

        return new AuthorizationService($resolver);
    }
}
