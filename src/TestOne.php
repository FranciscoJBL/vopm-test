<?php

namespace VOPMTest;

/**
 * First Andain test
 * 
 * Determine the amount of users logged from an exact location 
 * from a given data provided.
 */
class TestOne {
    /**
     * Amount of users logged from an exact location.
     */
    private int $loggedUsersInLocation = 0;

    /**
     * User data.
     */
    private ?array $users = null;
    
    /**
     * Test entrypoint
     */
    public function main() : int {
        foreach($this->getUsers() as $user) {
            if($this->isUserInLocation($user)) {
                $this->loggedUsersInLocation++;
            }
        }

        return $this->loggedUsersInLocation;
    }

    /**
     * Get the user data.
     */
    private function getUsers() : array {
        if ($this->users === null) {
            $userProvider = new \VOPMTest\Providers\User();
            $this->users = $userProvider->getAll();
        }
        return $this->users;
    }

    /**
     * Check if user is in location. Assumed that there is a 10 meters tolerance by default.
     */
    private function isUserInLocation(User $user) {
        return $user['distance'] < 10;
    }
}