<?php

namespace Weisl\EFrontSDK\Helper\API\Handler;

use Weisl\EFrontSDK\Helper\API\Abstraction\AbstractAPI;

/**
 * Class Catalog
 *
 * @author  EPIGNOSIS
 * @package Weisl\EFrontSDK
 * @since   1.0.0
 */
class Catalog extends AbstractAPI
{
    /**
     * Returns the course catalog for a given user.
     *
     * @since 1.0.0
     *
     * @param mixed $userId (Required) | The user identifier.
     *
     * @throws \Exception
     *
     * @return array (Associative)
     */
    public function GetInfo($userId) {
        $this->_CheckId($userId);

        return $this->_requestHandler->Get (
            $this->_GetAPICallURL(sprintf('/User/%s/Catalog', $userId)),
            $this->_apiKey
        );
    }
}
