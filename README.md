# Tests Cakephp Authentication and Authorization plugin

Details of what I've done are in the commit comments and also in the added comments.

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

19: Implements Execption management

20: Test Authorization to resourceless action Using Controller as Resource (using canIndex and authorizeModel)

# Roadmap:

Test Authorization for action with an specific resource
ie:
 - [x] Any authenticated user (AttUser) can add Words
 - [x] Any AttUser can view/index Words
 - [ ] Any AttUser can edit/delete Words that don't have weightings or that belong to books owned by the AttUser
 - [ ] In case that the user cant edit a word the error message should give a descriptive message (the owner of the books that share the word)
 - [ ] The AttUser can add books only if he will be the owner of the books.
 - [ ] The AttUser can  list and view only weightings that belong to Books that are owned by AttUser.
 - [ ] Only The authenticated user can delete or edit books that belong to him
 - [ ] The authenticated user can add weightings only to books that belong to him
 - [ ] Only the owner of a book can edit or delete the weightings related to that book
 - [ ] Any one can edit or delete a word that has no weightings
 - [ ] The authenticated user can edit a word that has weightings only if all the books that have associations to that word belong to that user
 

Handle UnAuthorized requests for main scope /

Handle Unauthorized requests for api scope /api/


# Postponed

Test Authorization to resourceless action Using Requests as Resource
https://github.com/cakephp/authorization/blob/18a821301c91b9fa419046958015276af8fabdfa/tests/test_app/TestApp/Policy/RequestPolicy.php

Test Authorization to resourceless action Using StringResolver
https://github.com/cakephp/authorization/blob/18a821301c91b9fa419046958015276af8fabdfa/tests/test_app/TestApp/Policy/StringResolver.php
