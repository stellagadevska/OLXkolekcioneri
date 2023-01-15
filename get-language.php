<?php
// Start the session
    session_start();
    echo  json_encode($_SESSION["lang"], JSON_UNESCAPED_UNICODE);
?>