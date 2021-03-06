<?php

namespace Weisl\EFrontSDK\Helper\Factory\Handler;

use Weisl\EFrontSDK\Helper\API\Abstraction\AbstractAPI;
use Weisl\EFrontSDK\Helper\Factory\Exception\API as FactoryAPIException;
use Weisl\EFrontSDK\Helper\Request\Abstraction\RequestHandlerInterface;

/**
 * Class API
 *
 * @author  EPIGNOSIS
 * @package Weisl\EFrontSDK
 * @since   1.0.0
 */
class API
{
  /**
   * The API list which contains the registered entities.
   *
   * @since 1.0.0
   *
   * @var array (Associative)
   */
  private $_apiList = [];

  /**
   * The request handler.
   *
   * @since 1.0.0
   *
   * @var RequestHandlerInterface
   */
  private $_requestHandler = null;


  /**
   * Registers the callable.
   *
   * @since 1.0.0
   *
   * @param $instance
   *
   * @throws FactoryAPIException
   */
  private function _Register($instance)
  {
    $api = 'Weisl\EFrontSDK\Helper\API\Handler\\'. $instance;
      
    try {
      $this->_apiList[$instance] = new $api($this->_requestHandler);
    } catch (\Exception $e) {
      throw new FactoryAPIException('Not possible to register ' . $instance . ' API');
    }
  }

  /**
   * Constructs the API factory.
   *
   * @since 1.0.0
   *
   * @param RequestHandlerInterface $requestHandler
   */
  public function __construct(RequestHandlerInterface $requestHandler)
  {
    $this->_requestHandler = $requestHandler;
  }

  /**
   * Destructs the factory with safety.
   *
   * @since 1.0.0
   */
  public function __destruct()
  {
    $this->_requestHandler->Close();
  }

  /**
   * Initializes the API factory.
   *
   * @since 1.0.0
   *
   * @param string $sdkVersion (Required) | The SDK version to be used.
   *
   * @return $this
   */
  public function Init($sdkVersion)
  {
    $this->_requestHandler->Init($sdkVersion);

    return $this;
  }

  /**
   * Returns the requested instance.
   *
   * @since 1.0.0
   *
   * @param string $instance (Required) | The instance to be fetched.
   *
   * @throws FactoryAPIException
   *
   * @return AbstractAPI
   */
  public function Get($instance)
  {
    if (!isset($this->_apiList[$instance])) {
      $this->_Register($instance);
    }

    return $this->_apiList[$instance];
  }
}
