# ChangeLog

All notable changes are documented in this file using the [Keep a CHANGELOG](https://keepachangelog.com/) principles.

## [2.0.3] - 2023-05-12

### Changed

* Add additional method to get course content in a given language.
* Add additional method to get extended user in a given language.

## [2.0.2] - 2022-08-10

### Changed

* Remove cast to string for 'Force' in CourseUser->RemoveRelation

## [2.0.1] - 2022-06-23

### Changed

* Fixed bug in test
* Added new endpoint for user (User/:id/extended)

## [2.0.0] - 2022-03-06

### Changed

* Changed interface for calling API through wrapper.
* Updated README

## [1.0.4] - 2022-02-07

### Changed

* Added simpler interface for calling API. Instead of calling ```$api->get()->GetAPI('CourseUser')->AddRelation($userId, $courseId)``` you can now simply call ```$api->addUserToCourse($userId, $courseId)```. The old way is still available (see README) but a simpler method is available for every endpoint (see EFrontAPI.php).

## [1.0.3] - 2022-02-07

### Changed

* Added missing endpoints (see README)

## [1.0.1] - 2022-01-07

### Changed

* License identifier

## [1.0.0] - 2022-01-07

### Changed

* [Old source code](https://github.com/epignosis/efrontPRO-SDK/) now available as public composer package
* Wrapper for calling API (EFrontAPI)
* All @since annotations have been updated to 1.0.0 when this project was created. @package annotations have been updated as well.
* Added endpoints (see README)