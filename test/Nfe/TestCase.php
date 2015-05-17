<?php

class Nfe_TestCase extends UnitTestCase
{
  function __construct() {
    $apiKey = getenv('NFE_API_KEY');
    Nfe::setApiKey($apiKey);
  }

  protected static function getOrCreateTestCompany($_attributes=Array())
  {
    $attributes = Array(
      "federalTaxNumber" => 191,
      "name" => "BANCO DO BRASIL SA",
      "tradeName" => "BANCO DO BRASIL",
      "email" => "exemplo@bb.com.br"
    );

    $object = Nfe_Company::fetch((string)$attributes["federalTaxNumber"]);

    if (is_null($object)) {
      $object = Nfe_Company::create( array_merge($attributes,$_attributes) );
    }

    return $object;
  }
}

?>