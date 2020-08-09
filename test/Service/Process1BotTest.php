<?php

namespace TelegramWorkflow\Test\Service;


use TelegramWorkflow\Entity\Action;
use TelegramWorkflow\Entity\Dto\Chat;
use TelegramWorkflow\Entity\Dto\Update;
use TelegramWorkflow\Entity\State;

class Process1BotTest extends AbstractProcessBotTest
{
    protected string $botName = 'bot1';

    public function testHandle()
    {
        $update = new Update();
        $action = new Action($update);

        $this->bot->handle($action);
        
        $this->assertTrue(true);
    }

    public function testRequestProcessorHandle()
    {
        $update = new Update();
        $action = new Action($update);

        $messages = $this->requestProcessor->handle($action);

        $this->assertCount(1, $messages);
    }

    public function testRequestWithExistingState()
    {
        $chat = $this->createMock(Chat::class);
        $chat->method('getId')->willReturn(1);

        $action = $this->createMock(Action::class);
        $action->method('getChat')->willReturn($chat);

        $state = new State('testProcess1', 'step3');

        $this->stateRepository->method('getState')->willReturn($state);

        $messages = $this->requestProcessor->handle($action);

        $this->assertCount(0, $messages);
    }
}
