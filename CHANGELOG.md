# ChangeLog

All notable changes are documented in this file using the [Keep a CHANGELOG](https://keepachangelog.com/) principles.

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