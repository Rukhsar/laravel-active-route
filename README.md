# Laravel Active Route

A laravel helper package.

## Installation

Install using composer

```
composer require rukhsar/laravel-active-route
```

Add below line to your service providers array in `config/app.php`

```php
Rukhsar\ActiveRoute\ActiveRouteServiceProvider::class,
```

Add below line to your **aliases** array in `config/app.php`

```php
'Active'    =>  Rukhsar\ActiveRoute\Facades\Active::class,
```

Publish config file using

```
php artisan vendor:publish --provider="Rukhsar\ActiveRoute\ActiveRouteServiceProvider" --tag="config"
```

### Config File

In `config/activeroute.php` you can modify the css active class which notmally `active` if you are using bootsrap.

```php
return [

    // The default css class value if the request match given route name
    'class' => 'active',

];
```

## Usage

You can use this package in different ways like...

```php

Active::route('route.name'); // Facade example
app('active')->route('route.name'); // Application container example
active_route('route.name'); // Helper function

// Wildcard exmaples

Active::route('route.name.*');
active_route('route.name.*');

// Multiple Routes

Active::route(['route.name1.*', 'route.name2.*']);
active_route(['route.name1.*', 'route.name2.*']);
```

You can also use custom blade directive in your blade templates.

```
@ifActiveRoute('route.name')
    <p>True</p>
@else
    <p>False</p>
@endif
```

### Practical use in application

```html
<li class="item {{ active_route('admin.index') }}">
    <a href="admin/index">Dashboard</a>
</li>
```

---
This project is open-sourced software licensed under the [MIT License](https://opensource.org/licenses/MIT).