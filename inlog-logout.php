    <?php
    session_start();

    session_unset();
    session_destroy();

    header("Location: inlog-index.php");