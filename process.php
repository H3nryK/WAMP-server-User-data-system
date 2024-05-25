<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $name = $_GET["name"];
    $email = $_GET["email"];

    echo "Name: " . $name . "<br>";
    echo "Email: " . $email . "<br>";
}
