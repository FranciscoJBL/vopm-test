<?php

namespace VOPMTest\Providers;

/**
 * Queue provider.
 */
class Queue {
    /**
     * Get queue task.
     */
    public function getQueueTask() : array {
        $task = \VOPMTest\Providers\Database::query(
            "SELECT * FROM system_queue where status = 'pending' order by run_date asc limit 1"
        );

        $currentDate = new DateTime(); 
        $currentTimestamp = $currentDate->getTimestamp();

        if ($currentTimestamp > $task[0]['timestamp']) {
            return $task[0];
        }
    }

    /**
     * Set task processing.
     */
    public function setProcessing($task) {
        \VOPMTest\Providers\Database::query(
            "UPDATE system_queue SET status = 'in-process' WHERE id = '" . $task['id'] . "'"
        );
    }

    /**
     * Set task completed.
     */
    public function setCompleted($task) {
        \VOPMTest\Providers\Database::query(
            "UPDATE system_queue SET status = 'completed' WHERE id = '" . $task[0]['id'] . "'"
        );
    }
}