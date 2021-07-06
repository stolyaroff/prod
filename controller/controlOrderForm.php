<?php
if (isset($_POST['surname']) && isset($_POST['name']) &&
    isset($_POST['phone']) && isset($_POST['mail'])) {
    $name = htmlentities($_POST['name']);
    $surname = htmlentities($_POST['surname']);
    $hostel = htmlentities($_POST['phone']);
    $mail = htmlentities($_POST['mail']);
};
