<?php

namespace Weisl\EFrontSDK\Helper\API\Handler;

use Weisl\EFrontSDK\Helper\API\Abstraction\AbstractAPI;

/**
 * Class System
 *
 * @author  EPIGNOSIS
 * @package Weisl\EFrontSDK
 * @since   1.0.0
 */
class System extends AbstractAPI
{
  /**
   * Returns the system information.
   *
   * @since 1.0.0
   *
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function GetInfo()
  {
    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/System/Info'), $this->_apiKey
    );
  }
}
