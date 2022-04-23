# The Post

A simple blog post web application for demonstration purpose. Based on Laravel 8.x with features like:
- [Authentication](https://laravel.com/docs/8.x/authentication)
- [Blade](https://laravel.com/docs/8.x/blade)
- [Mail](https://laravel.com/docs/8.x/mail)
- [Migrations](https://laravel.com/docs/8.x/migrations)
- [Requests](https://laravel.com/docs/8.x/validation#form-request-validation)
- [Seeding & Factories](https://laravel.com/docs/8.x/seeding)
- Custom Helpers

Beside Laravel, this project uses other tools like:
- [Bootstrap 4](https://getbootstrap.com/)
- [Tailwind CSS](https://tailwindcss.com/)
- [Font Awesome](http://fontawesome.io/)
- [JQuery](https://jquery.com/)
- [CKEditor-4](https://ckeditor.com/ckeditor-4/)
- Many more to discover.

## Installation
### Prerequisites
-   Requirements for [laravel](https://laravel.com/docs)
-   Composer
-   NPM
- VirtualBox and Vagrant for [Homestead](https://laravel.com/docs/8.x/homestead) or [WAMP](https://www.wampserver.com/en/)/[LAMP](https://bitnami.com/stack/lamp/installer)/[XAMPP](https://www.apachefriends.org/download.html)

### Manual installation
Setting up your development environment on your local machine :

Get the latest release or clone the repo with
```sh
$ git clone https://github.com/hitarth1999/The-Post.git
```
-   Install composer packages `composer install `
-   Install NPM packages `npm install`
-   Compile Assets `npm run dev`
-   Copy .env.example to .env and modify it to your needs
-   Generate an app key `php artisan key:generate`
-   Migrate the database with seed `php artisan migrate:fresh --seed`
-   Run the server `php artisan serve`