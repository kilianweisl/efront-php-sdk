<?php

namespace Weisl\EFrontSDK\Helper\API\Handler;

use Weisl\EFrontSDK\Helper\API\Abstraction\AbstractAPI;

/**
 * Class CurriculumUser
 *
 * @author  EPIGNOSIS
 * @package Weisl\EFrontSDK
 * @since   1.0.0
 */
class CurriculumUser extends AbstractAPI
{
  /**
   * Creates a relation between the requested user and curriculum.
   *
   * @since 1.0.0
   *
   * @param mixed $userId       (Required) | The user identifier.
   * @param mixed $curriculumId (Required) | The curriculum identifier.
   * @param bool  $force        (Required) | Whether to force the operation.
   *
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function AddRelation($userId, $curriculumId, $force = false)
  {
    $this->_CheckId($userId)->_CheckId($curriculumId);

    return $this->_requestHandler->Put (
      $this->_GetAPICallURL('/Curriculum/' . $curriculumId . '/AddUser'),
      $this->_apiKey,
      ['UserId' => $userId, 'Force' => (string) $force]
    );
  }

  /**
   * Removes the relation between the requested user and the curriculum.
   *
   * @since 1.0.0
   *
   * @param mixed $userId       (Required) | The user identifier.
   * @param mixed $curriculumId (Required) | The curriculum identifier.
   *
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function RemoveRelation($userId, $curriculumId)
  {
    $this->_CheckId($userId)->_CheckId($curriculumId);

    return $this->_requestHandler->Put (
      $this->_GetAPICallURL('/Curriculum/' . $curriculumId . '/RemoveUser'),
      $this->_apiKey,
      ['UserId' => $userId]
    );
  }
}
