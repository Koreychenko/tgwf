<?php
declare(strict_types=1);

namespace TelegramWorkflow\Middleware;

use Exception;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use TelegramWorkflow\Entity\Dto\Update;
use TelegramWorkflow\FormType\UpdateType;
use TelegramWorkflow\Service\TelegramRequestService;

class FetchUpdateMiddleware implements MiddlewareInterface
{
    protected FormFactoryInterface $formFactory;

    protected LoggerInterface $logger;

    protected TelegramRequestService $telegramRequestService;

    public function __construct(FormFactoryInterface $formFactory, LoggerInterface $logger, TelegramRequestService $telegramRequestService)
    {
        $this->formFactory            = $formFactory;
        $this->logger                 = $logger;
        $this->telegramRequestService = $telegramRequestService;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $dataItem = json_decode($request->getBody()->getContents(), true);

        $updateEntity = new Update();

        $form = $this->formFactory->create(UpdateType::class, $updateEntity);
        $form->submit($dataItem);

        if (!$form->isValid()) {
            throw new Exception('Invalid incoming data');
        }

        return $handler->handle($request->withAttribute('update', $updateEntity));
    }
}