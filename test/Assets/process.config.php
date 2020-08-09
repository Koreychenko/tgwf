<?php

use TelegramWorkflow\Test\Assets\Steps\Bot1TestProcess1Step1;
use TelegramWorkflow\Test\Assets\Steps\Bot1TestProcess1Step2;
use TelegramWorkflow\Test\Assets\Steps\Bot1TestProcess1Step3;

use TelegramWorkflow\Test\Assets\Steps\Bot1TestProcess2Step1;
use TelegramWorkflow\Test\Assets\Steps\Bot1TestProcess2Step2;
use TelegramWorkflow\Test\Assets\Steps\Bot1TestProcess2Step3;

use TelegramWorkflow\Test\Assets\Steps\Bot2TestProcess1Step1;
use TelegramWorkflow\Test\Assets\Steps\Bot2TestProcess1Step2;
use TelegramWorkflow\Test\Assets\Steps\Bot2TestProcess1Step3;

use TelegramWorkflow\Test\Assets\Steps\Bot2TestProcess2Step1;
use TelegramWorkflow\Test\Assets\Steps\Bot2TestProcess2Step2;
use TelegramWorkflow\Test\Assets\Steps\Bot2TestProcess2Step3;

return [
    'bot1' => [
        'testProcess1' => [
            'step1' => Bot1TestProcess1Step1::class,
            'step2' => Bot1TestProcess1Step2::class,
            'step3' => Bot1TestProcess1Step3::class,
        ],
        'testProcess2' => [
            'step1' => Bot1TestProcess2Step1::class,
            'step2' => Bot1TestProcess2Step2::class,
            'step3' => Bot1TestProcess2Step3::class,
        ],
    ],
    'bot2' => [
        'testProcess1' => [
            'step1' => Bot2TestProcess1Step1::class,
            'step2' => Bot2TestProcess1Step2::class,
            'step3' => Bot2TestProcess1Step3::class,
        ],
        'testProcess2' => [
            'step1' => Bot2TestProcess2Step1::class,
            'step2' => Bot2TestProcess2Step2::class,
            'step3' => Bot2TestProcess2Step3::class,
        ],
    ],
];