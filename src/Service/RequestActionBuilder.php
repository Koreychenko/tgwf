<?php

namespace TelegramWorkflow\Service;

use InvalidArgumentException;
use Psr\Http\Message\RequestInterface;
use Symfony\Component\Form\FormFactoryInterface;
use TelegramWorkflow\Entity\Action;
use TelegramWorkflow\Entity\Dto\Update;
use TelegramWorkflow\FormType\UpdateType;

class RequestActionBuilder
{
    protected FormFactoryInterface $formFactory;

    public function __construct(FormFactoryInterface $formFactory)
    {
        $this->formFactory = $formFactory;
    }

    public function createAction(RequestInterface $request): ?Action
    {
        $requestBody = json_decode($request->getBody()->getContents(), true);
        $update      = new Update();
        $form        = $this->formFactory->create(UpdateType::class, $update);

        $form->submit($requestBody);

        if (!$form->isValid()) {
            throw new InvalidArgumentException('Invalid request parameters');
        }

        return new Action($update);
    }
}
