# Tests Cakephp Authentication and Authorization plugin

Details of what I've done are in the commit comments and also in the added comments
Steps performed:

1: Initial installation of cake

2: Install Authorization Plugin

3: Install Authentication Plugin

4: Configure Database and base objects

5: Loads basic Authentication plugin

6: Creates resources for Login Form

7: Enables REST for the /api Scope

8: Loads basic Authorization plugin

9: Create basic User Policy

10: Allow Debug toolkit through the Authorization using a custom RequestHandler

11: Create basic Book and BooksTable Policies

12: Implements Authorization for UsersController::login()

13: Configure the Authorization\IdentityInterface and Authentication\IdentityInterface interface for User Entity

14: Implements Authorization for BooksController (Testing skipAuthorization)

15: Configures scopeIndex for BooksTablePolicy

16: Use scopes to restrain the application of CSRF middleware to the /api route

17: Handle preflight requests with the OPTIONS method by adding HttpOptionsMiddleware to the middleware queue, this is later needed to implement JWT requests
https://www.munderwood.ca/index.php/2017/02/28/responding-to-http-options-requests-in-cakephp/

18: Implement JWT by adding a it to getAuthenticationService and adding BodyParserMiddleware in order to be able to use FormAuthenticator when sending a json object

# Steps to be performed:

Test Authorization to resourceless action Using Controller as Resource

Test Authorization to resourceless action Using Requests as Resource
https://github.com/cakephp/authorization/blob/18a821301c91b9fa419046958015276af8fabdfa/tests/test_app/TestApp/Policy/RequestPolicy.php

Test Authorization to resourceless action Using StringResolver
https://github.com/cakephp/authorization/blob/18a821301c91b9fa419046958015276af8fabdfa/tests/test_app/TestApp/Policy/StringResolver.php
