<?php
    session_start();
    unset($_SESSION["adminid"]);
    unset($_SESSION["adminname"]);

    echo("
        <script>
            location.href = 'index.php';
        </script>
    ")
?>