<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\AbstractController;

class EmailController extends AbstractController
{
    public function Welcome(): string
    {
        $dataEmail = [
            'name' => "Karaźźź",
            'activationLink' => "https://www.youtube.com/watch?v=rUralSCI7lU",
        ];

        $this->sendWelcomeEmail('jkb.karnas@gmail.com', $dataEmail);

        return "Coś się wysłało";
    }
}
