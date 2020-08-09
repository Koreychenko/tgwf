<?php
declare(strict_types=1);

namespace TelegramWorkflow\Middleware;

use Exception;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Log\LoggerInterface;
use TelegramWorkflow\Repository\BotRepositoryInterface;

class GetClientBotByTokenMiddleware implements MiddlewareInterface
{
    protected BotRepositoryInterface $botRepository;

    protected LoggerInterface $logger;

    public function __construct(BotRepositoryInterface $botRepository , LoggerInterface $logger)
    {
        $this->botRepository = $botRepository;
        $this->logger      = $logger;
    }

    /**
     * {@inheritDoc}
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $token = $request->getAttribute('token');

        $clientBot = $this->botRepository->getClientBotByToken($token);

        if (!$clientBot) {
            $this->logger->error('Invalid client bot incoming hook URL', ['token' => $token]);

            throw new Exception('Invalid client bot incoming hook URL');
        }

        return $handler->handle($request->withAttribute('clientBot', $clientBot));
    }
}
