<?php

namespace Weisl\EFrontSDK\Helper\API\Handler;

use Weisl\EFrontSDK\Helper\API\Abstraction\AbstractAPI;

/**
 * Class ExtendedProfile
 *
 * @author  EPIGNOSIS
 * @package Weisl\EFrontSDK
 * @since   1.0.0
 */
class ExtendedProfile extends AbstractAPI
{
  /**
   * Returns information about the extended profile fields for users.
   *
   * @return  array (Associative)
   *
   * @throws  \Exception
   */
  public function ForUsers()
  {
    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/extended-fields/users'), $this->_apiKey
    );
  }
}
