<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comments = ($_POST["comment"]);
    echo $comments;
}
