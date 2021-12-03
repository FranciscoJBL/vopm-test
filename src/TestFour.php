<?php

namespace AndainTest;

/**
 * Fourth Andain test
 * 
 * Generate a php server that can run determined functions on background.
 */
class TestFour {
    /**
     * Test entrypoint.
     */
    public function main() {
        do {
            $script = dirname(__DIR__) . DIRECTORY_SEPARATOR ."QueueManager.php";
            switch (strtolower(PHP_OS_FAMILY)) {
                default:
                  echo "Unsupported OS";
                  break;
                case "windows":
                  pclose(popen("start /B php $script", "r"));
                  break;
                case "linux":
                  exec("php $script > /dev/null &");
                  break;
              }
            sleep(10);
        } while ($task !== null);
    }
}