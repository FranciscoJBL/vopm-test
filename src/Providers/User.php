<?php

namespace AndainTest\Providers;

/**
 * User provider.
 */
class User {    
    /**
     * Get all user data.
     */
    public function getAll() {
        return \AndainTest\Providers\Database::query(
            "SELECT * FROM Users"
        );
    }
}