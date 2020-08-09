<?php
declare(strict_types=1);

namespace TelegramWorkflow\Repository;

use TelegramWorkflow\Process\Process;

class ProcessCollection extends AbstractIterableCollection
{
    protected string $itemType = Process::class;
}
