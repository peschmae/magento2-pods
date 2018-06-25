<?php
    session_start();

    if (isset($_SESSION['time'])) {
        echo($_SESSION['time']);
    } else {
        $_SESSION['time'] = time();
        echo('Set $_SESSION[\'time\']');
    }

?>
