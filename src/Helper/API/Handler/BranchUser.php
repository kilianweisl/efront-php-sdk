<?php

namespace Weisl\EFrontSDK\Helper\API\Handler;

use Weisl\EFrontSDK\Helper\API\Abstraction\AbstractAPI;

/**
 * Class BranchUser
 *
 * @author  EPIGNOSIS
 * @package Weisl\EFrontSDK
 * @since   1.0.0
 */
class BranchUser extends AbstractAPI
{
  /**
   * Creates a relation between the requested user and branch.
   *
   * @since 1.0.0
   *
   * @param mixed $userId   (Required) | The user identifier.
   * @param mixed $branchId (Required) | The branch identifier.
   *
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function AddRelation($userId, $branchId)
  {
    $this->_CheckId($userId)->_CheckId($branchId);

    return $this->_requestHandler->Put (
      $this->_GetAPICallURL('/Branch/' . $branchId . '/AddUser'),
      $this->_apiKey,
      ['UserId' => $userId]
    );
  }
}
