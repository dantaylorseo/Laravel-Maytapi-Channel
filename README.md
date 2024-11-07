# Mytapi Laravel Notification Channel

This package provides a notification channel for [Laravel](https://laravel.com) that sends WhatsApp messages using the [Maytapi](https://maytapi.com) API.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/dantaylorseo/Laravel-Maytapi-Channel.svg?style=flat-square)](https://packagist.org/packages/dantaylorseo/laravel-maytapi-channel)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/dantaylorseo/Laravel-Maytapi-Channel/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/dantaylorseo/laravel-maytapi-channel/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/dantaylorseo/Laravel-Maytapi-Channel/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/dantaylorseo/laravel-maytapi-channel/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/dantaylorseo/Laravel-Maytapi-Channel.svg?style=flat-square)](https://packagist.org/packages/dantaylorseo/laravel-maytapi-channel)
[![Packagist License](https://img.shields.io/packagist/l/dantaylorseo/laravel-maytapi-channel?style=flat-square&color=purple)](LICENSE.md)

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
    'send_to_channel' => env('MAYTAPI_SEND_TO_CHANNEL', false), // if set to true, messages will be sent to the channel instead of the user
    'group_id' => env('MAYTAPI_GROUP_ID'), // if the message is being sent to a group, this is the group ID
];
```

## Usage

This channel uses the `toMail()` method on the notification class to determine the outgoing message. `line()` and `action()` methods are supported.

To set the phone number to send the message to, add the `routeNotificationForMaytapi` method to your `Notifiable` model.

```php
public function routeNotificationForMaytapi()
{
    return $this->phone_number; // in the format 447123456789 (country code followed by the number, no leading 0, no spaces)
}
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

[//]: # (## Contributing)

[//]: # ()
[//]: # (Please see [CONTRIBUTING]&#40;CONTRIBUTING.md&#41; for details.)

[//]: # ()
[//]: # (## Security Vulnerabilities)

[//]: # ()
[//]: # (Please review [our security policy]&#40;../../security/policy&#41; on how to report security vulnerabilities.)

## Credits

- [dantaylorseo](https://github.com/dantaylorseo)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
