<?php

declare(strict_types=1);

namespace SimpleRouter\Exception;

class MethodNotFoundException extends \Exception
{
  public function __construct(string $message = "Method not found", int $code = 500, \Throwable $previous = null)
  {
    parent::__construct($message, $code, $previous);
  }
}
