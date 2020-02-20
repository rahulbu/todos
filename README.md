Todos
=========

A Symfony project created on February 13, 2020, 10:35 am.

The app allows users to login in to their accounts, and lets them see their todos.
The users can create, edit, update and delete their todos. Users can also edit their profile, and change password.  
The app has the following features:
* Authentication
* Pagination
# Requirements
 symfony 3.4  
 mysql
## Database Creation
  To generate database, run `php bin/console doctrine:database:create`  
  To generate entities, run `php bin/console doctrine:generate:entities AppBundle/Entity`  
  
##### To run server, `php bin/console server:run`
##### To run tests, `./vendor/bin/simple-phpunit`