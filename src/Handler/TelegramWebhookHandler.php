<?php

namespace TelegramWorkflow\Handler;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Log\LoggerInterface;
use TelegramWorkflow\Service\Bot;
use TelegramWorkflow\Service\RequestActionBuilder;
use Throwable;

class TelegramWebhookHandler implements RequestHandlerInterface
{
    protected RequestActionBuilder $requestActionBuilder;
    protected Bot $bot;
    protected LoggerInterface $logger;

    public function __construct(RequestActionBuilder $requestActionBuilder, Bot $bot, LoggerInterface $logger)
    {
        $this->requestActionBuilder = $requestActionBuilder;
        $this->bot                  = $bot;
        $this->logger               = $logger;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $action = $this->requestActionBuilder->createAction($request);
            $this->bot->handle($action);

            return new Response(200);
        } catch (Throwable $exception) {
            $this->logger->error($exception->getMessage(), ['exception' => $exception]);

            return new Response(500);
        }
    }
}