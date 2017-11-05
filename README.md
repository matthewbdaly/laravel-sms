# laravel-sms
[![Build Status](https://travis-ci.org/matthewbdaly/laravel-sms.svg?branch=master)](https://travis-ci.org/matthewbdaly/laravel-sms)

SMS service provider for Laravel and Lumen. Uses [SMS Client](https://github.com/matthewbdaly/sms-client) to enable sending SMS messages using the following drivers:

* `nexmo`
* `clockwork`
* `textlocal`
* `aws` (requires installation of `aws/aws-sdk-php`)
* `mail` (somewhat untested and may be too generic to be much use)

Also has the following drivers for testing purposes:

* `log`
* `null`
* `requestbin`

Installation for Laravel
------------------------

This package is only intended for Laravel 5.5 and up. Install it with the following command:

```bash
$ composer require matthewbdaly/laravel-sms
```

Then publish the config file:

```bash
$ php artisan vendor:publish
```

You will need to select the service provider `Matthewbdaly\LaravelSMS\LaravelSMSProvider`. Then set your driver and any settings required in the `.env` file for your project:

```
SMS_DRIVER=nexmo
NEXMO_API_KEY=foo
NEXMO_API_SECRET=bar
CLOCKWORK_API_KEY=baz
TEXTLOCAL_API_KEY=baz
REQUESTBIN_PATH=foo
AWS_SNS_API_KEY=foo
AWS_SNS_API_SECRET=bar
AWS_SNS_API_REGION=baz
MAIL_SMS_DOMAIN=my.sms-gateway.com
```

Installation for Lumen
----------------------

The installation process with Lumen is identical to that for Laravel, although if you wish to use the facade you will need to uncomment the appropriate section of `bootstrap/app.php` as usual.

Usage
-----

Once the package is installed and configured, you can use the facade to send SMS messages:

```php
use SMS;

$msg = [
    'to'      => '+44 01234 567890',
    'content' => 'Just testing',
];
SMS::send($msg);
```

Or fetch it from the app:

```php
$msg = [
    'to'      => '+44 01234 567890',
    'content' => 'Just testing',
];
$sms = app()['sms']
$sms->send($msg);
```

Or resolve the interface `Matthewbdaly\SMS\Contracts\Client`:

```php
$msg = [
    'to'      => '+44 01234 567890',
    'content' => 'Just testing',
];
$sms = app()->make('Matthewbdaly\SMS\Contracts\Client');
$sms->send($msg);
```

Here we use the `app()` helper, but you'll normally want to inject it into a constructor or method of another class.
