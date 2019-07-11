# Images
Manage images with different entities

## Requirements
- PHP >=5.4
- Fileinfo Extension

## Supported Image Libraries

- GD Library (>=2.0)
- Imagick PHP extension (>=6.5.7)

## Installation
`composer require nour/images`

After you have installed Intervention Image, open your Laravel config file config/app.php and add the following lines.

In the $providers array add the service providers for this package.

`Nour\Images\Providers\ImagesServiceProvider::class,`


## Code Examples

```php
// get user
$user=Auth::user(); 
// upload photo
$user->photo($request->file('photo'))->upload();

// resize image instance
$user->photo($request->file('photo'))->width(756)->height(425)->upload();

// get image model
$user->Image;
```

## Storage
All images store in :
`public\images\{model_name}`
please create a correct folder path

