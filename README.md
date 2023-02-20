<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"> <img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About The Project

This platform was developed for the company "ADS PUBLICIDAD" located in the city of Guaranda Ecuador. With the aim of broadcasting live sporting events.

### Features

A complete live streaming feature:

-   🎬 Live Streaming
-   🤖 Payment Management
-   🔊 Chat
-   💎 Responsive design

### Developed By

<a href="https://github.com/KleverFabian">
<img alt="GitHub followers" src="https://img.shields.io/github/followers/KleverFabian?label=Klever%20Castillo&style=social">
</a>

<a href="https://github.com/NesCh99">
<img alt="GitHub followers" src="https://img.shields.io/github/followers/NesCh99?label=N%C3%A9stor%20Chela%20&style=social">
</a>



## Technologies Used

The web system was developed with the following technologies for both the Backend and Frontend.

### Backend

-   🖥️ [Laravel](https://laravel.com/).

### Frontend

-   ⚙️ [Tailwindcss](https://tailwindcss.com/).
-   🧩 [Bootstrap](https://getbootstrap.com/).

### Integrated APIs

In addition, services for video transmission, payment management and chat were integrated into the system.

-   💲 For the management of payments, it was integrated: [PayPal](https://developer.paypal.com/home).
-   🎬 For live streaming it was integrated: [Wowza Video](https://www.wowza.com/).
-   💬 For the chats it was integrated: [Tidio](https://www.tidio.com/).

## Requirements

-   Node.js and npm
-   Composer
-   local web server

## Getting started

Run the following command on your local environment:

```bash
git clone https://github.com/KleverCastillo/StreamingSystem.git
cd my-project-name
composer install
npm install
```

## Project settings

### Service Credentials

Edit the .env file with the paypal credentials

```bash
PAYPAL_CLIENT_ID=
PAYPAL_SECRET=
PAYPAL_MODE=

```

Edit the .env file with the wowza api key 

```bash
WOWZA_API_VERSION=v1.9
WOWZA_TOKEN=


```

Edit the .env file with the Tido src

```bash
TIDIO_CHAT=

```

### Rest API SDK PAYPAL

Rest API of PAYPAL have a warning therefore modify the code found in the following file

```bash
vendor\paypal\rest-api-sdk-php\lib\PayPal\Common\PayPalModel.php

```

Edit the line number 170

```bash
foreach ($param as $k => $v)
{
    if ($v instanceof PayPalModel){
        $ret[$k] = $v->toArray();
    } else if (is_array($v) && sizeof($v) <= 0){
        $ret[$k] = array();
    }else if (is_array($v)){
        $ret[$k] = $this->_convertToArray($v);
    } else
    {
        ret[$k] = $v;
    }
}
```

## Project running


Publish the shortcut for image hosting on the local server:
```bash
php artisan storage:link
```

Run the following command for the server to send emails that are queued:

```bash
php artisan queue:work
```

Then, you can run locally in development mode with live reload:

```bash
npm run dev
php artisan serve
```

## License

Licensed under the MIT License, Copyright © 2023
