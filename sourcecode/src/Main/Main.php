<?php

declare(strict_types=1);

namespace RESTBook\Main;

class Main
{
    public function __construct()
    {
        header('Content-Type: application/json');
    }

    public function test(): void
    {
        echo $this->convertToJson(['return' => 'It Works!'])
    }

    private function convertToJson(array $value): string
    {
        return json_encode($value);
    }
}
