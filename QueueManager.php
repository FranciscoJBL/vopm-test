<?php
/**
 * require autoload in order to use classmap.
 */
require 'vendor/autoload.php';
/**
 * require functions file.
 */
require 'src/Batch/Queue/Functions.php';

/**
 * A simple script to process a queue.
 */
$queueProvider = new \AndainTest\Providers\Queue();
$task = $queueProvider->getQueueTask();
if ($task !== null) {
    $function = "\\AndainTest\\Batch\\Queue\\" . $task['function'];
    if (function_exists($function)) {
        $queueProvider->setProcessing($task);
        $function();
    }
    $queueProvider->setCompleted($task);
}

