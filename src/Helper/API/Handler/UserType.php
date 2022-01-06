<?php

namespace Weisl\EFrontSDK\Helper\API\Handler;

use Weisl\EFrontSDK\Helper\API\Abstraction\AbstractAPI;

/**
 * Class UserType
 *
 * @author  EPIGNOSIS
 * @package Weisl\EFrontSDK
 * @since   1.0.0
 */
class UserType extends AbstractAPI
{
    /**
     * Returns information about the requested user type.
     *
     * @param   mixed $id (Required) | The user type identifier.
     *
     * @throws  \Exception
     *
     * @return  array (Associative)
     *
     */
    public function GetInfo($id)
    {
        $this->_CheckId($id);

        return $this->_requestHandler->Get($this->_GetAPICallURL('/user-type/' . $id), $this->_apiKey);
    }
}
