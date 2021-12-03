<?php

namespace AndainTest\Providers;

/**
 * Database provider.
 */
class Database {
    /** Fake database credentials */
    const HOSTNAME = 'localhost';
    const USERNAME = 'root';
    const PASSWORD = 'root';
    const DATABASE = 'test';

    /**
     * Connect to the data source.
     */
    private static function getConnection() {
        /** Connect to the database */
        $dbconnect = \mysqli_connect(
           static::HOSTNAME,
           static::USERNAME,
           static::PASSWORD,
           static::DATABASE
       );

       /** Check connection */
       if ( ! $dbconnect) {
           die("Connection failed: " . \mysqli_connect_error());
       }

       
       if ($dbconnect->connect_error) {
           die("Database connection failed: " . $dbconnect->connect_error);
       }

       return $dbconnect; 
   }

   /**
    * Execute a query.
    */
   static function query(string $query) : array {
        $dbconnect = static::getConnection();

        $data = \mysqli_query($dbconnect, $query)
            or die (\mysqli_error($db));

        mysqli_close($dbconnect);
        return $data;
   }
}