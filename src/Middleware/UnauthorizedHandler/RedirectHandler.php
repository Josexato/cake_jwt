<?php
/**
 * @copyright 2015-2018 josexato
 * @license MIT
 *
 * Date: 19/11/2018
 * Time: 7:04 PM
 */

namespace App\Middleware\UnauthorizedHandler;

use Authorization\Exception\Exception;
use Authorization\Middleware\UnauthorizedHandler\RedirectHandler as BaseRedirectHandler;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;


class RedirectHandler extends BaseRedirectHandler
{

    public function handle(Exception $exception, ServerRequestInterface $request, ResponseInterface $response, array $options = [])

    {

        $path = $request->getUri()->getPath();

        if (stripos($path, '/debug-kit') === 0) {

            return $response;

        }


        return parent::handle($exception, $request, $response, $options);

    }

}