# Site wide password access protection for Laravel

This will add a simple password form in front of your application to protected it from any access. The password is specified using the .env file.
You can protect development or staging sites.

Also, since the request code is configurable, you can enjoy this package without health check errors if your application is 
behind Elastic Beanstalk.

You can define multiple passwords.

### Installation

```bash
composer require gorankrgovic/laravel-access-protect
```

#### Laravel >= 5.5

You don't need to add this package to your `app/config/app.php` since it supports auto discovery.

### Add Middleware

Add Middleware to `app/Http/Kernel.php` or specific routes you want to protect.

```php
protected $middlewareGroups = [
    'web' => [
        ...
        \Gox\Laravel\Http\Middleware\AccessProtect::class,
    ],
    ...
];
```

### Configuration

Add your password to `.env`. You can use multiple passwords separated by comma.


```
ACCESS_PROTECT_PASSWORDS=pass1,pass2
```
To revoke access to your site simply change the password. This requires every user using the old password to re-enter a password.

### Customization

You can modify the view that handles password entry by publishing the views to your resource folder.

```bash
php artisan vendor:publish --provider="Gox\Laravel\AccessProtect\Provides\AccessProtectServiceProvider" --tag=views
```

and config

```bash
php artisan vendor:publish --provider="Gox\Laravel\AccessProtect\Provides\AccessProtectServiceProvider" --tag=config
```

That's it...
