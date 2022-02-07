<?php

namespace Weisl\EFrontSDK\Helper\API\Handler;

use Weisl\EFrontSDK\Helper\API\Abstraction\AbstractAPI;

/**
 * Class UserJob
 *
 * @author  EPIGNOSIS
 * @package Weisl\EFrontSDK
 * @since   1.0.0
 */
class UserJob extends AbstractAPI
{
  /**
   * Creates a relation between the requested user and job.
   *
   * @param   mixed $userId  (Required) | The user identifier.
   * @param   mixed $jobId (Required) | The job identifier.
   *
   * @throws  \Exception
   *
   * @return  array (Associative)
   *
   */
  public function AddRelation($userId, $jobId)
  {
    $this->_CheckId($userId)->_CheckId($jobId);

    return $this->_requestHandler->Put (
      $this->_GetAPICallURL('/Job/' . $jobId . '/AddUser'),
      $this->_apiKey,
      ['UserId' => $userId]
    );
  }

  /**
   * Adds a user to a job.
   *
   * @since 1.0.3
   *
   * @param   mixed $jobId (Required) | The job identifier.
   * @param   mixed $userId  (Required) | The user identifier.
   *
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function AddRelationWithPost($jobId, $userId)
  {
    $this->_CheckId($jobId)->_CheckId($userId);

    return $this->_requestHandler->Post (
      $this->_GetAPICallURL('/Job/AddUser'),
      $this->_apiKey,
      [
        'JobId' => $jobId,
        'UserId' => $userId
      ]
    );
  }

  /**
   * Removes the relation between the requested user and job.
   *
   * @param   mixed $userId  (Required) | The user identifier.
   * @param   mixed $jobId (Required) | The job identifier.
   *
   * @throws  \Exception
   *
   * @return  array (Associative)
   *
   */
  public function RemoveRelation($userId, $jobId)
  {
    $this->_CheckId($userId)->_CheckId($jobId);

    return $this->_requestHandler->Put (
      $this->_GetAPICallURL('/Job/' . $jobId . '/RemoveUser'),
      $this->_apiKey,
      ['UserId' => $userId]
    );
  }

  /**
   * Returns information about user jobs.
   *
   * @since 1.0.3
   *
   * @param mixed $id   (Required) | The user identifier.
   *
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function GetInfoAboutJobs($id)
  {
    $this->_CheckId($id);

    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/User/' . $id . '/Jobs'),
      $this->_apiKey
    );
  }
}
