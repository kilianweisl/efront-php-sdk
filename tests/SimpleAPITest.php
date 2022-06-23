<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Weisl\EFrontSDK\EFrontAPI;

class SimpleAPITest extends TestCase
{
  private $apiVersion = '';
  private $apiLocation = '';
  private $apiKey = '';

  /** @test **/
  function it_can_be_instantiated()
  {
    $api = new EFrontAPI($this->apiVersion, $this->apiLocation, $this->apiKey);
    
    $this->assertInstanceOf(EFrontAPI::class, $api);
  }

  /** @test **/
  function it_can_be_called()
  {
    $api = new EFrontAPI($this->apiVersion, $this->apiLocation, $this->apiKey);

    $this->assertTrue(
      json_decode($api->GetAPI('System')->GetInfo())->success
    );
  }
}