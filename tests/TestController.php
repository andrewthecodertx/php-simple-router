<?php

namespace SimpleRouter\Tests;

use SimpleRouter\Response;
use SimpleRouter\Request;

class TestController
{
  public function sayHello(Request $request, array $params): Response
  {
    $response = new Response();
    $response->setStatus(200);
    $response->setBody('Hello, ' . $params['name'] . '!');
    return $response;
  }

  public function submitForm(Request $request, array $params): Response
  {
    $response = new Response();
    $response->setStatus(200);
    $response->setBody('Form submitted successfully!');
    return $response;
  }
}
