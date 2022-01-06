# EFront PHP SDK

This is an unofficial composer package of the original [eFrontPRO-SDK](https://github.com/epignosis/efrontPRO-SDK/) from [Epignosis](https://www.epignosishq.com/). 
It aims to improve simplicity as well as maintaining/adding endpoints from the official documentation provided on [Swaggerhub page](https://app.swaggerhub.com/apis/Epignosis/Efront-API/1.0.0#/).

This package is in active development. 
Not all endpoints available on Swaggerhub are also available via the SDK (yet).

## Installation

This package can be installed with ```composer require weisl/efront-php-sdk```.

## Usage

```php
use Weisl\EFrontSDK\EFrontAPI;

...

$api = new EFrontAPI("1.0", "https://your-efront-domain.com/API", "your-api-key");
$api->call()->GetAPI('System')->GetInfo();

```

Endpoints can be accessed the same way as before. Please refer to the provided documentation from the previous author.

## Contributing

### Testing

In order to test the application, you need to set apiVersion, apiLocation and apiKey accordingly.

```vendor/bin/phpunit```

## Documentation

The authors provided the following [documentation](https://github.com/epignosis/efrontPRO-SDK/blob/master/Documentation/API%20Documentation.pdf) via GitHub.


## License

[GNU GENERAL PUBLIC LICENSE](https://github.com/kilianweisl/efront-php-sdk/blob/main/LICENSE.md)