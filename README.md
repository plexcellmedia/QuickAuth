# Laravel 5 QuickAuth - Sentinel
---------------------------------

QuickAuth is extension for Sentinel package that can be found [here](https://cartalyst.com/manual/sentinel/2.0).  
With QuickAuth you can setup user authentication in few minutes!

## Features
- Login / Register / Password Recovery / Logout
- Necessary emails
- Translations support
- Easily customizable config and layout (or use your own)
- Username support if needed (default is email)

## Requirements
Before installation, make sure these packages are correctly set up.
- [Catalyst Sentinel](https://cartalyst.com/manual/sentinel/2.0#installation)
- [Laravel Collective Forms & HTML](https://laravelcollective.com/docs/master/html#installation)

## Installation

```
$ composer require "plexcellmedia/quickauth"
```
After installing the package, open your Laravel config file located at ***config/app.php*** and add the following lines.


In the **$providers** array add the following service provider for this package.
```
Plexcellmedia\QuickAuth\QuickAuthServiceProvider::class,
```

In the **$aliases** array add the following facades for this package.
```
'QuickAuth' => Plexcellmedia\QuickAuth\Facades\QuickAuth::class,
```

Publish assets.
```
php artisan vendor:publish --provider="Plexcellmedia\QuickAuth\QuickAuthServiceProvider"
```

Add following line to **$routeMiddleware** array in Kernel.php
```
'sentinel.auth' => \App\Http\Middleware\SentinelAuth::class,
```
Setup routes
```php
/** QuickAuth Routes */

// Login routes
Route::get('/login', 'QuickAuth\LoginController@showLogin')->name('quickauth.login.show');
Route::post('/login', 'QuickAuth\LoginController@doLogin')->name('quickauth.login.do');

// Register routes
Route::get('/register', 'QuickAuth\RegisterController@showRegister')->name('quickauth.register.show');
Route::post('/register', 'QuickAuth\RegisterController@doRegister')->name('quickauth.register.do');

// Activate user route
Route::get('/activate/{userId}/{code}', 'QuickAuth\ActivateController@doActivate')->name('quickauth.activate.do');

// Password recovery routes
Route::get('/forgot', 'QuickAuth\ForgotController@showForgot')->name('quickauth.forgot.show');
Route::post('/forgot', 'QuickAuth\ForgotController@doForgot')->name('quickauth.forgot.do');
Route::get('/verify/{email}/{code}', 'QuickAuth\ForgotController@verifyForgot')->name('quickauth.forgot.verify');

// Auth protected routes
Route::group(['middleware' => ['sentinel.auth']], function () {

    Route::get('/logout', 'QuickAuth\LogoutController@doLogout')->name('quickauth.logout.do');

});

```

Enter login success redirect route in QuickAuth config.
```
'login_success_route' => '',
```

**DONE**

## Username support

Run SQL query to add username field at database.
```sql
ALTER TABLE `users` ADD `username` VARCHAR(64) AFTER `email`, ADD UNIQUE (`username`);
```

Enable username support in config.
```
'username_support' => true,
```

## Customization
Layouts and template can be found at `resources\views\vendor\quickauth`.

Translations can be found at `resources\lang\vendor\quickauth`.

## Todo
- Tests
- Login with username (currently usernames are supported but can't be logged in with)
- Support Laravel Auth

## License

GPL-3.0
