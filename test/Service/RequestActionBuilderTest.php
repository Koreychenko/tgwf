<?php

namespace TelegramWorkflow\Test\Service;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;
use Symfony\Component\Form\Forms;
use TelegramWorkflow\Service\RequestActionBuilder;

class RequestActionBuilderTest extends TestCase
{
    protected RequestActionBuilder $requestActionBuilder;

    protected function setUp(): void
    {
        $formFactory = Forms::createFormFactoryBuilder()->getFormFactory();
        $this->requestActionBuilder = new RequestActionBuilder($formFactory);
    }

    public function testCreateAction()
    {
        $request = $this->createMock(RequestInterface::class);
        $requestBody = $this->createMock(StreamInterface::class);
        $requestBody->method('getContents')->willReturn($this->getJson());
        $request->method('getBody')->willReturn($requestBody);

        $action = $this->requestActionBuilder->createAction($request);

        $commands = $action->getCommands();

        $this->assertCount(1, $commands);

        $this->assertEquals('start', $commands[0]);
    }

    private function getJson(): string
    {
        return <<<EOF
{
    "update_id":10000,
    "message":{
        "date":1441645532,
        "chat":{
            "last_name":"Test Lastname",
            "id":1111111,
            "first_name":"Test",
            "username":"Test"
        },
        "message_id":1365,
        "from":{
            "last_name":"Test Lastname",
            "id":1111111,
            "first_name":"Test",
            "username":"Test"
        },
        "entities": [
            {
                "type": "bot_command",
                "offset": 0,
                "length": 5
            }            
        ],
        "text":"/start"
    }
}
EOF;
    }
}
