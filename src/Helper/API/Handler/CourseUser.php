<?php

namespace Weisl\EFrontSDK\Helper\API\Handler;

use Weisl\EFrontSDK\Helper\API\Abstraction\AbstractAPI;

/**
 * Class CourseUser
 *
 * @author  EPIGNOSIS
 * @package Weisl\EFrontSDK
 * @since   1.0.0
 */
class CourseUser extends AbstractAPI
{
  /**
   * Creates a relation between the requested user and course.
   *
   * @since 1.0.0
   *
   * @param mixed $userId   (Required) | The user identifier.
   * @param mixed $courseId (Required) | The course identifier.
   * @param bool  $force    (Required) | Whether to force the operation, or not.
   *
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function AddRelation($userId, $courseId, $force = false)
  {
    $this->_CheckId($userId)->_CheckId($courseId);

    return $this->_requestHandler->Put (
      $this->_GetAPICallURL('/Course/' . $courseId . '/AddUser'),
      $this->_apiKey,
      ['UserId' => $userId, 'Force' => (string) $force]
    );
  }

  /**
   * Adds a user to a course.
   *
   * @since 1.0.3
   * @author Kilian Weisl
   * 
   * @param mixed $courseId (Required) | The course identifier.
   * @param mixed $userId   (Required) | The user identifier.
   *
   * @throws  \Exception
   *
   * @return  array (Associative)
   *
   */
  public function AddRelationWithPost($courseId, $userId)
  {
    $this->_CheckId($courseId)->_CheckId($userId);

    return $this->_requestHandler->Post (
      $this->_GetAPICallURL('/Course/AddUser'), 
      $this->_apiKey,
      [
        'CourseId' => $courseId,
        'UserId' => $userId
      ]
    );
  }

  /**
   * Returns the status of the requested user into the requested course.
   *
   * @since 1.0.0
   *
   * @param mixed $userId   (Required) | The user identifier.
   * @param mixed $courseId (Required) | The course identifier.
   *
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function CheckStatus($userId, $courseId)
  {
    $this->_CheckId($userId)->_CheckId($courseId);

    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/CourseUserStatus/' . $courseId . ',' . $userId),
      $this->_apiKey
    );
  }

  /**
   * Removes the relation between the requested user and the course.
   *
   * @since 1.0.0
   *
   * @param mixed $userId   (Required) | The user identifier.
   * @param mixed $courseId (Required) | The course identifier.
   * @param bool  $force    (Required) | Whether to force the operation, or not.
   *
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function RemoveRelation($userId, $courseId, $force = false)
  {
    $this->_CheckId($userId)->_CheckId($courseId);

    return $this->_requestHandler->Put (
      $this->_GetAPICallURL('/Course/' . $courseId . '/RemoveUser'),
      $this->_apiKey,
      ['UserId' => $userId, 'Force' => $force]
    );
  }

  /**
   * Update the status of the specified user in the specified course.
   *
   * @since 1.0.0
   *
   * @param mixed $userId   (Required) | The user identifier.
   * @param mixed $courseId (Required) | The course identifier.
   * @param array $info     (Optional) | The information to update.
   *
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function UpdateStatus($userId, $courseId, array $info = [])
  {
    $this->_CheckId($userId)->_CheckId($courseId);

    return $this->_requestHandler->Post (
      $this->_GetAPICallURL('/CourseUserStatus/' . $courseId . ',' . $userId),
      $this->_apiKey,
      $info
    );
  }

  /**
   * Update the status of the specified user in the specified course.
   *
   * @since 1.0.3
   * @author Kilian Weisl
   * 
   * @param   array $info (Required) | The information to update.
   * Must include 'courseId' and 'userId' as keys.
   *
   * @throws  \Exception
   *
   * @return  array (Associative)
   *
   */
  public function UpdateStatusWithArray(array $info)
  {
    return $this->_requestHandler->Post (
      $this->_GetAPICallURL('/CourseUserStatus'), 
      $this->_apiKey,
      $info
    );
  }

  /**
   * Returns information about the progress of the specified user in the 
   * specified course.
   *
   * @since 1.0.3
   * @author Kilian Weisl
   *
   * @param mixed $courseId   (Required)  | The course identifier.
   * @param mixed $userId     (Required)  | The user identifier.
   *
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function GetUserProgressForCourse($courseId, $userId)
  {
    $this->_CheckId($courseId)->_CheckId($userId);

    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/Course/' . $courseId . '/UserProgress/' . $userId), $this->_apiKey
    );
  }

  /**
   * Returns a list of all the test attempts that the specified user has made in 
   * the specified course.
   *
   * @since 1.0.3
   * @author Kilian Weisl
   *
   * @param mixed $courseId   (Required)  | The course identifier.
   * @param mixed $userId     (Required)  | The user identifier.
   *
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function GetTestAttemptsForCourse($courseId, $userId)
  {
    $this->_CheckId($courseId)->_CheckId($userId);

    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/CourseUserTestAttempts/' . $courseId . ',' . $userId),
      $this->_apiKey
    );
  }
}
