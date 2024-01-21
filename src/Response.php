<?php

declare(strict_types=1);

namespace SimpleRouter;

class Response
{
  private int $status = 200;
  private $headers = [];
  private $body = '';

  public function addHeader(string $header): void
  {
    $this->headers[] = $header;
  }

  public function setBody(string $body): void
  {
    $this->body = $body;
  }

  public function getBody(): string
  {
    return $this->body;
  }

  public function send(): void
  {
    foreach ($this->headers as $header) {
      header($header);
    }

    echo $this->body;
  }

  public function setStatus(int $status): void
  {
    $this->status = $status;
  }

  public function getStatus(): int
  {
    return $this->status;
  }
}
