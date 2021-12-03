<?php

namespace AndainTest;

/**
 * Third Andain test
 * 
 * Determine the average time it takes to approve a Application request.
 * Determine the average time it takes to pay an approved Application.
 * Determine the commission based on the contribution made by the dealer 
 * (50 for gather a new client, and 100 for close a deal).
 */
class TestThree {
    /**
     * Application provider
     */
    private ?ApplicationProvider $applicationProvider = null;

    /**
     * Test entrypoint
     */
    public function main() : array {
        $Applications = $this->getApplications();
        $ApplicationProvider = $this->getApplicationProvider();

        $approvedApplications = 0;
        $paidApplications = 0;
        $totalApprovalTime = 0;
        $totalPayTime = 0;
        $dealers = [];

        foreach ($Applications as $Application) {
            $creatorDealer = $ApplicationProvider->fetchCreatorDealer($Application);
            $dealers[$creatorDealer] += 50;

            $approvalTime = $ApplicationProvider->fetchApprovalTime($Application);
            if ($approvalTime !== null) {
                $totalApprovalTime += $approvalTime;
                $approvedApplications++;
            }

            $payTime = $ApplicationProvider->fetchPayTime($Application);
            if ($payTime !== null) {
                $totalPayTime += $payTime;
                $paidApplications++;
                $closerDealer = $ApplicationProvider->fetchCloserDealer($Application);
                $dealers[$closerDealer] += 100;
            }
        }

        $averageApprovalTime = $totalTime / $approvedApplications;
        $averagePayTime = $totalPayTime / $paidApplications;

        return [
            'averageApprovalTime' => $averageApprovalTime,
            'averagePayTime' => $averagePayTime,
            'commission' => $dealers
        ];
    }

    /**
     * Get application provider
     */
    public function fetchApplicationProvider() : ApplicationProvider {
        if ($this->applicationProvider === null) {
            $this->applicationProvider = new ApplicationProvider();
        }
        return $this->applicationProvider;
    }

    /**
     * Get all applications.
     */
    public function getApplications() : array {
        return $this->getApplicationProvider()->getAll();
    }
}