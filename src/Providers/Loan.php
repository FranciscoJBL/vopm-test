<?php

namespace AndainTest\Providers;

/**
 * Application provider.
 */
class Application {
    /**
     * Get all user data.
     */
    public function getAll(): array {
        return $this->queryUsers(
            \AndainTest\Providers\Database::getConnection()
        );
    }

    /**
     * Query user data.
     */
    private function queryApplications(\mysqli $db) : array {
        return \AndainTest\Providers\Database::query(
            "SELECT * from application"
        );
    }

    /**
     * Fetch Approval time from a given application.
     */
    public function fetchApprovalTime(array $application) : int {
        if ($application['approved_date'] === null) {
            return null;
        }

        $applicationCreationTime = $this->getApplicationCreationTime($application);
        return $application['approved_date'] - $applicationCreationTime[0]['add_date'];
    }

    /**
     * Fetch pay time from a given application.
     */
    public function fetchPayTime(array $application) : int {
        if ($application['paid_date'] === null) {
            return null;
        }

        $applicationCreationTime = $this->getApplicationCreationTime($application);
        return $application['paid_date'] - $applicationCreationTime[0]['add_date'];
    }

    /**
     * Fetch creator from a given application
     */
    public function fetchCreatorDealer(array $application) : int {
        $data = \AndainTest\Providers\Database::query(
            "SELECT setting from application_history where application_id = "
            . $application['id']
            . "order by add_date asc limit 1"
        );

        return $this->fetchDealerId($data[0]);
    }

    /**
     * Fetch Closer dealer from a given application
     */
    public function fetchCloserDealer(array $application) : int {
        $data = \AndainTest\Providers\Database::query(
            "SELECT setting from application_history where application_id = "
            . $application['id']
            . "order by add_date desc limit 1"
        );

        return $this->fetchDealerId($data[0]);
    }

    /**
     * Get application creation time.
     */
    public function getApplicationCreationTime($application) : int {
        return \AndainTest\Providers\Database::query(
            "SELECT add_date from application_history where application_id = "
            . $application['id']
            . "order by add_date asc limit 1"
        );
    }
    
    /**
     * Fetch dealer id from a given application history.
     */
    public function fetchDealerId(array $applicationData) : int {
        $parsedData = json_decode($applicationData['setting']);
        return $parsedData->agent_id;
    }
}