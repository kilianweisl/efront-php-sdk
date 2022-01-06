<?php

namespace Weisl\EFrontSDK\Helper\API\Handler;

use Weisl\EFrontSDK\Helper\API\Abstraction\AbstractAPI;

/**
 * Class GroupList
 *
 * @author  EPIGNOSIS
 * @package Weisl\EFrontSDK
 * @since   1.0.0
 */
class GroupList extends AbstractAPI
{
  /**
   * Returns the complete list of groups.
   *
   * @since 1.0.0
   *
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function GetAll()
  {
    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/Groups'), $this->_apiKey
    );
  }
}