<?php

declare(strict_types=1);

namespace App\View;

class View
{
    public function viewer(string $page, array $elements = []): void
    {
        $elements = $this->escape($elements);
        require_once("App/templates/$page.php");
    }

    private function escape(array $params): array
    {
        $clearParams = [];

        foreach ($params as $key => $param) {
            switch (true) {
                case is_array($param):
                    $clearParams[$key] = $this->escape($param);
                    break;
                case is_int($param):
                    $clearParams[$key] = $param;
                    break;
                case $param:
                    $clearParams[$key] = htmlentities($param);
                    break;
                default:
                    $clearParams[$key] = $param;
                    break;
            }
        }

        return $clearParams;
    }
}
