# NearYou
Platform allowing to list the different merchants discovered according to the category of products/services they offer!


## Installation 

Make sure you have [WampServer](https://www.wampserver.com/en/), [Composer](https://getcomposer.org/) and [Symfony](https://symfony.com/download) otherwise download them.
Download the repo and start working. You should consider to use a virtual environnement, below you just have a to open a command prompt (cmd) in the repo's folder.
```
composer install
php bin/console doctrine:database:create
php bin/console doctrine:schema:update --force
php bin/console doctrine:fixtures:load
```
And after that, you can run the website with the command:
```
symfony server:start
```
[Open on localhost:8000](http://localhost:8000/)

## Folders
- [Controller](https://github.com/15087/archiWeb/tree/main/archiLog/src/Controller)

Different function controlling the entire system.

- [Entity](https://github.com/15087/archiWeb/tree/main/archiLog/src/Entity)

Defines different object models used in this project.

- [DataFixtures](https://github.com/15087/archiWeb/tree/main/archiLog/src/DataFixtures)

Fixtures are used to load a “fake” set of data into a database that can then be used for testing or to help give you some interesting data.

- [Form](https://github.com/15087/archiWeb/tree/main/archiLog/src/Form)

Symfony provides a “form builder” object which allows you to describe the form fields using a fluent interface. Later, this builder creates the actual form object used to render and process contents.
You will find the forms for the creation of a category and/or an ad.

- [Repository](https://github.com/15087/archiWeb/tree/main/archiLog/src/Repository)

Repositories are design patterns that encapsulate queries to the database.

- [Tests](https://github.com/15087/archiWeb/tree/main/archiLog/tests)
Various tests to ensure the proper functioning of our application.

- [Templates](https://github.com/15087/archiWeb/tree/main/archiLog/templates)

The [blog folder](https://github.com/15087/archiWeb/tree/main/archiLog/templates/blog) contains all the web pages of this project.

## License 
[MIT License](https://github.com/15087/archiWeb/blob/main/LICENSE)

## Upcoming features

- Search articles by title
- Add Authentication (Security component)

## Links 

[Based on the tutorial by Mr. Lior Chamla](https://www.youtube.com/watch?v=_GjHWa9hQic)
[Symfony Documentation](https://symfony.com/doc/current/index.html)
[Panther Library for the forms tests](https://github.com/symfony/panther)
