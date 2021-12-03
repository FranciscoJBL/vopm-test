<?php

namespace VOPMTest\Providers;

/**
 * User provider.
 */
class User {    
    /**
     * Get all user data.
     */
    public function getAll() {
        return \VOPMTest\Providers\Database::query(
            "SELECT * FROM Users"
        );
    }
}