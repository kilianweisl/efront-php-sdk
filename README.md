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
$api->get()->GetAPI('System')->GetInfo();

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

## Supported Endpoints

| Endpoint                          | Method   | Support     |
| -----------                       | -------- | ----------- |
| /user-types                       | GET      | ✅          |
| /user-type/{id}                   | GET      | ✅          |
| /training-sessions                | GET      | ✅          |
| /training-session/{id}            | GET      | ✅          |
| /course/{id}/training-sessions    | GET      | ✅          |
| /training-session/{id}/users      | GET      | ✅          |
| /Plugins                          | GET      | ✅          |
| /Plugin/{pluginName}              | GET      | ✅          |
| /Plugin/{pluginName}              | POST     | ✅          |
| /Autologin/{loginName}            | GET      | ✅          |
| /Users                            | GET      | ✅          |
| /Logout/{loginName}               | GET      | ✅          |
| /Users/{id}                       | GET      | ✅          |
| /Users/{id}                       | PUT      | ✅          |
| /Users/{eMailAddress}             | GET      | ✅          |
| /User                             | POST     | ✅          |
| /User/{Id}/Activate               | PUT      | ✅          |
| /User/{Id}/Deactivate             | PUT      | ✅          |
| /Branch/{Id}                      | GET      | ✅          |
| /Branches/                        | GET      | ✅          |
| /Branch                           | POST     | ✅          |
| /Branch/AddUser                   | POST     | ❌ --> ✅   |
| /Branch/{Id}/AddUser              | PUT      | ✅          |
| /Category/{Id}                    | GET      | ✅          |
| /Categories                       | GET      | ✅          |
| /Course/{Id}                      | GET      | ✅          |
| /Course/{CourseId}/UserProgress/{UserId}| GET      | ❌    |
| /CourseUserTestAttempts/{CourseId},{UserId}| GET   | ❌    |
| /Courses                          | GET      | ✅          |
| /Course/{Id}/Content              | GET      | ❌          |
| /Course                           | POST     | ❌          |
| /Course/{Id}/AddUser              | PUT      | ✅          |
| /Course/{Id}/RemoveUser           | PUT      | ✅          |
| /CourseUserStatus/{CourseId},{UserId}| GET   | ✅          |
| /CourseUserStatus/{CourseId},{UserId}| POST  | ✅          |
| /CourseUserStatus                 | POST     | ❌          |
| /Course/AddUser                   | POST     | ❌          |
| /curriculums                      | GET      | ✅          |
| /Curriculum/{Id}/AddUser          | PUT      | ✅          |
| /Curriculum/{Id}/RemoveUser       | PUT      | ✅          |
| /User/{Id}/Catalog/               | GET      | ✅          |
| /Group/{Id}                       | GET      | ✅          |
| /Groups                           | GET      | ✅          |
| /Group/AddUser                    | POST     | ❌          |
| /Group/{Id}/AddUser               | PUT      | ✅          |
| /Group/{Id}/RemoveUser            | PUT      | ✅          |
| /Job/{Id}/RemoveUser              | PUT      | ✅          |
| /Job/{Id}                         | GET      | ✅          |
| /Job/{Id}                         | PUT      | ✅          |
| /Jobs                             | GET      | ✅          |
| /User/{Id}/Jobs                   | GET      | ❌          |
| /Job/AddUser                      | POST     | ❌          |
| /Job                              | POST     | ✅          |
| /Job/{Id}/AddUser                 | PUT      | ✅          |
| /extended-fields/users            | GET      | ✅          |
| /System/Info                      | GET      | ✅          |
| /Content/{id}                     | GET      | ✅          |
| /Account/Status                   | POST     | ✅          |