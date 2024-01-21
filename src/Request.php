<?php

declare(strict_types=1);

namespace SimpleRouter;

class Request
{
  public function __construct(
    private string $method = '',
    private string $path = '',
    private array $params = [],
    private array $body = []
  ) {
    $this->method = $method ?: $_SERVER['REQUEST_METHOD'];
    $this->path = $path ?: parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $this->params = $params ?: $_GET;
    $this->body = $body ?: $_POST;
  }

  public function method(): string
  {
    return $this->method;
  }

  public function path(): string
  {
    return $this->path;
  }

  public function params(): array
  {
    return $this->params;
  }

  public function body(): array
  {
    return $this->body;
  }
}
