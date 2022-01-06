<?php

namespace Weisl\EFrontSDK\Helper\API\Handler;

use Weisl\EFrontSDK\Helper\API\Abstraction\AbstractAPI;

/**
 * Class Content
 *
 * @author  EPIGNOSIS
 * @package Weisl\EFrontSDK
 * @since   1.0.0
 */
class Content extends AbstractAPI
{
    /**
     * Returns information about the requested content.
     *
     * @since 1.0.0
     *
     * @param mixed $id (Required) | The content identifier.
     *
     * @throws \Exception
     *
     * @return array (Associative)
     */
    public function GetInfo($id) {
        $this->_CheckId($id);

        return $this->_requestHandler->Get (
            $this->_GetAPICallURL(sprintf('/Content/%s', $id)),
            $this->_apiKey
        );
    }

}
