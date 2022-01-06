<?php

namespace Weisl\EFrontSDK;

use Weisl\EFrontSDK\Helper\eFrontProSDK;
use Weisl\EFrontSDK\Helper\Factory\Handler\API as Api;
use Weisl\EFrontSDK\Helper\Request\Handler\cURL as cURL;

/**
 * Class EFrontAPI serves as wrapper for the API.
 *
 * @author  Kilian Weisl
 * @package Weisl\EFrontSDK
 * @since   1.0.0
 */
class EFrontAPI
{
  /**
   * The API object.
   *
   * @since 1.0.0
   *
   * @var eFrontProSDK
   */
  private $api;

  /**
   * Constructs the API Wrapper.
   *
   * @since 1.0.0
   *
   * @param string $apiVersion  (Required) | The API version to be used.
   * @param string $apiLocation (Required) | The API location.
   * @param string $apiKey      (Required) | The API key to be used.
   * 
   */
  public function __construct($apiVersion, $apiLocation, $apiKey)
  {
    $this->api = new eFrontProSDK(new Api(new cUrl));
    $this->api->Config($apiVersion, $apiLocation, $apiKey);
  }

  /**
   * Returns the actual API to perform calls.
   *
   * @since 1.0.0
   *
   * @return eFrontProSDK 
   */
  public function get()
  {
    return $this->api;
  }
}