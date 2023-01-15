<?php
// Start the session
    session_start();
    if($_SESSION["lang"] == "BG"){
        $_SESSION["lang"] = "EN";
    }else{$_SESSION["lang"] = "BG";}
    
    echo json_encode($_SESSION, JSON_UNESCAPED_UNICODE);
?>


