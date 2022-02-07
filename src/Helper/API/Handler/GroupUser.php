<?php

namespace Weisl\EFrontSDK\Helper\API\Handler;

use Weisl\EFrontSDK\Helper\API\Abstraction\AbstractAPI;

/**
 * Class GroupUser
 *
 * @author  Kilian Weisl
 * @package Weisl\EFrontSDK
 * @since   1.0.3
 */
class GroupUser extends AbstractAPI
{
  /**
   * Adds a user to a group.
   *
   * @since 1.0.3
   * @author Kilian Weisl
   * 
   * @param mixed $groupId   (Required) | The group identifier.
   * @param mixed $userId (Required)    | The user identifier.
   *
   * @throws  \Exception
   *
   * @return  array (Associative)
   *
   */
  public function AddRelation($groupId, $userId)
  {
    $this->_CheckId($groupId)->_CheckId($userId);
    
    return $this->_requestHandler->Post (
      $this->_GetAPICallURL('/Group/AddUser'), 
      $this->_apiKey,
      [
        'GroupId' => $groupId,
        'UserId' => $userId
      ]
    );
  }
}
