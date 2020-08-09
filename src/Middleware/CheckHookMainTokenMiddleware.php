<?php
declare(strict_types=1);

namespace TelegramWorkflow\Middleware;

use Exception;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Log\LoggerInterface;

class CheckHookMainTokenMiddleware implements MiddlewareInterface
{
    protected string $activeToken;

    protected LoggerInterface $logger;

    public function __construct(string $activeToken, LoggerInterface $logger)
    {
        $this->activeToken = $activeToken;
        $this->logger      = $logger;
    }

    /**
     * {@inheritDoc}
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $token = $request->getAttribute('token');

        if ($token !== $this->activeToken) {
            $this->logger->error('Invalid main bot incoming hook URL', ['token' => $token]);

            throw new Exception('Invalid main bot incoming hook URL');
        }

        return $handler->handle($request);
    }
}
