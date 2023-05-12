<?php

namespace Weisl\EFrontSDK\Helper\API\Handler;

use Weisl\EFrontSDK\Helper\API\Abstraction\AbstractAPI;

/**
 * Class Course
 *
 * @author  EPIGNOSIS
 * @package Weisl\EFrontSDK
 * @since   1.0.0
 */
class Course extends AbstractAPI
{
  /**
   * Returns information about the requested course.
   *
   * @since 1.0.0
   *
   * @param mixed $id (Required) | The course identifier.
   *
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function GetInfo($id)
  {
    $this->_CheckId($id);

    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/Course/' . $id), $this->_apiKey
    );
  }

  /**
   * Returns a list of the training sessions that belongs to the requested course.
   *
   * @since 1.0.0
   *
   * @param mixed $id (Required) | The course identifier.
   *
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function GetTrainingSessions($id)
  {
    $this->_CheckId($id);

    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/course/' . $id . '/training-sessions'), $this->_apiKey
    );
  }

  /**
   * Returns the content IDs for a given course.
   *
   * @since 1.0.3
   * @author Kilian Weisl
   *
   * @param mixed $id   (Required)  | The course identifier.
   *
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function GetContentIdsForCourse($id)
  {
    $this->_CheckId($id);

    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/Course/' . $id . '/Content'),
      $this->_apiKey
    );
  }

  /**
   * Returns the content IDs for a given course in a given language.
   *
   * @since 2.0.3
   * @author Kilian Weisl
   *
   * @param mixed $id       (Required)  | The course identifier.
   * @param mixed $langId   (Required)  | The eFront language identifier.
   *
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function GetContentIdsForCourseLocalized($id, $langId)
  {
    $this->_CheckId($id)->_CheckId($langId);

    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/Course/' . $id . '/Content?language=' . $langId),
      $this->_apiKey
    );
  }

  /**
   * Creates a course.
   *
   * @since 1.0.3
   * @author Kilian Weisl
   * 
   * @param array $courseInfo (Required) | The course information.
   *
   * @throws \Exception
   *
   * @return array (Associative)
   *
   */
  public function Create(array $courseInfo)
  {
    return $this->_requestHandler->Post (
      $this->_GetAPICallURL('/Course'), 
      $this->_apiKey,
      $courseInfo
    );
  }
}
