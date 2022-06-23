<?php

namespace Weisl\EFrontSDK\Helper\API\Handler;

use Weisl\EFrontSDK\Helper\API\Abstraction\AbstractAPI;

/**
 * Class User
 *
 * @author  EPIGNOSIS
 * @package Weisl\EFrontSDK
 * @since   1.0.0
 */
class User extends AbstractAPI
{
  /**
   * Changes the status of the user.
   *
   * @param   mixed  $id     (Required) | The user identifier.
   * @param   string $status (Required) | The new status.
   *
   * @throws  \Exception
   *
   * @return  array (Associative)
   *
   */
  private function _ChangeUserStatus($id, $status)
  {
    $this->_CheckId($id);

    return $this->_requestHandler->Put (
      $this->_GetAPICallURL('/User/' . $id . '/' . $status),
      $this->_apiKey
    );
  }

  /**
   * Activates the requested user.
   *
   * @param   mixed $id (Required) | The user identifier.
   *
   * @throws  \Exception
   *
   * @return  array (Associative)
   *
   */
  public function Activate($id)
  {
    return $this->_ChangeUserStatus($id, 'Activate');
  }

  /**
   * Auto-login the requested user.
   *
   * @param   string $loginName (Required) | The user's login name.
   *
   * @throws  \Exception
   *
   * @return  array (Associative)
   *
   */
  public function AutoLogin($loginName)
  {
    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/Autologin/' . urlencode($loginName)),
      $this->_apiKey
    );
  }

  /**
   * Creates a user.
   *
   * @param   array $userInfo (Required) | The account information.
   *
   * @throws  \Exception
   *
   * @return  array (Associative)
   *
   */
  public function Create(array $userInfo)
  {
    return $this->_requestHandler->Post (
      $this->_GetAPICallURL('/User'), $this->_apiKey, $userInfo
    );
  }

  /**
   * Deactivates the requested user.
   *
   * @param   mixed $id (Required) | The user identifier.
   *
   * @throws  \Exception
   *
   * @return  array (Associative)
   *
   */
  public function Deactivate($id)
  {
    return $this->_ChangeUserStatus($id, 'Deactivate');
  }

  /**
   * Edits the requested user.
   *
   * @param   mixed $id       (Required) | The user identifier.
   * @param   array $userInfo (Required) | The information to edit.
   *
   * @throws  \Exception
   *
   * @return  array (Associative)
   *
   */
  public function Edit($id, array $userInfo)
  {
    $this->_CheckId($id);

    return $this->_requestHandler->Put (
      $this->_GetAPICallURL('/User/' . $id), $this->_apiKey, $userInfo
    );
  }

  /**
   * Returns information about the requested user.
   *
   * @param   mixed $id (Required) | The user identifier.
   *
   * @throws  \Exception
   *
   * @return  array (Associative)
   *
   */
  public function GetInfo($id)
  {
    $this->_CheckId($id);

    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/User/' . $id), $this->_apiKey
    );
  }

  /**
   * Returns extended information about the requested user.
   * (Endpoint may not exist)
   * 
   * @since 2.0.1
   *
   * @param   mixed $id (Required) | The user identifier.
   *
   * @throws  \Exception
   *
   * @return  array (Associative)
   *
   */
  public function GetExtendedInfo($id)
  {
    $this->_CheckId($id);

    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/User/' . $id . '/extended'), $this->_apiKey
    );
  }

  /**
   * Log-out the requested user.
   *
   * @param   string $loginName (Required) | The user's login name.
   *
   * @throws  \Exception
   *
   * @return  array (Associative)
   *
   */
  public function Logout($loginName)
  {
    $loginName = urlencode($loginName);

    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/Logout/' . $loginName), $this->_apiKey
    );
  }
}
