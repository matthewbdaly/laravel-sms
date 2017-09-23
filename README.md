# laravel-sms
[![Build Status](https://travis-ci.org/matthewbdaly/laravel-sms.svg?branch=master)](https://travis-ci.org/matthewbdaly/laravel-sms)

SMS service provider for Laravel. Uses [SMS Client](https://github.com/matthewbdaly/sms-client) to enable sending SMS messages using the following drivers:

* `nexmo`
* `lockwork`

Also has the following drivers for testing purposes:

* `log`
* `null`

Installation
------------

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
```
