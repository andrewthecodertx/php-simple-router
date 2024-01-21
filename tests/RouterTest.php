<?php

use PHPUnit\Framework\TestCase;
use SimpleRouter\Router;
use SimpleRouter\Request;

use SimpleRouter\Tests\TestController;

class RouterTest extends TestCase
{
  public function testGetRoute(): void
  {
    $router = new Router();
    $router->get('/hello/{name}', [TestController::class, 'sayHello']);

    $request = new Request('GET', '/hello/John');
    $response = $router->dispatch($request);

    $this->assertEquals(200, $response->getStatus());
    $this->assertEquals('Hello, John!', $response->getBody());
  }

  public function testPostRoute(): void
  {
    $router = new Router();
    $router->post('/submit', [TestController::class, 'submitForm']);

    $request = new Request('POST', '/submit');
    $response = $router->dispatch($request);

    $this->assertEquals(200, $response->getStatus());
    $this->assertEquals('Form submitted successfully!', $response->getBody());
  }

  public function testNotFoundRoute(): void
  {
    $this->expectException(\SimpleRouter\Exception\NotFoundException::class);

    $router = new Router();
    $request = new Request('GET', '/nonexistent');
    $router->dispatch($request);
  }
}
