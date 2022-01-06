<?php

namespace Weisl\EFrontSDK\Helper\API\Handler;

use Weisl\EFrontSDK\Helper\API\Abstraction\AbstractAPI;

/**
 * Class UserTypeList
 *
 * @author  EPIGNOSIS
 * @package Weisl\EFrontSDK
 * @since   1.0.0
 */
class UserTypeList extends AbstractAPI
{
    /**
     * Returns the complete user list.
     *
     * @throws  \Exception
     *
     * @return  array (Associative)
     *
     */
    public function GetAll()
    {
        return $this->_requestHandler->Get($this->_GetAPICallURL('/user-types'), $this->_apiKey);
    }
}
