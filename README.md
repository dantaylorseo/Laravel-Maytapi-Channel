# This is my package laravel-maytapi-channel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/dantaylorseo/Laravel-Maytapi-Channel.svg?style=flat-square)](https://packagist.org/packages/dantaylorseo/laravel-maytapi-channel)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/dantaylorseo/Laravel-Maytapi-Channel/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/dantaylorseo/laravel-maytapi-channel/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/dantaylorseo/Laravel-Maytapi-Channel/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/dantaylorseo/laravel-maytapi-channel/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/dantaylorseo/Laravel-Maytapi-Channel.svg?style=flat-square)](https://packagist.org/packages/dantaylorseo/laravel-maytapi-channel)

## Installation

You can install the package via composer:

```bash
composer require dantaylorseo/laravel-maytapi-channel
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-maytapi-channel-config"
```

This is the contents of the published config file:

```php
return [
    'api_key' => env('MAYTAPI_API_KEY'),
    'product_id' => env('MAYTAPI_PRODUCT_ID'),
    'phone_id' => env('MAYTAPI_PHONE_ID'),
    'group_id' => env('MAYTAPI_GROUP_ID'),
];
```

## Usage

Your notification class should look something like:
```php
<?php

namespace App\Notifications;

use dantaylorseo\MaytapiChannel\MaytapiChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WebpageChangedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return [
            'mail',
            MaytapiChannel::class
        ];
    }
    
    // Other parts of class here

    /**
     * Get the WhatsApp representation of the notification.
     *
     * @param object $notifiable
     * @return string
     *//
    public function toWhatsApp(object $notifiable): string
    {
        return "This is the message that will be sent to the user via WhatsApp!";
    }

}
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [dantaylorseo](https://github.com/dantaylorseo)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
