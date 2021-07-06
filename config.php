<?php
    function getConnection()
    {
        static $db;

        if (empty($db)) {
            $db = mysqli_connect('localhost', 'root', 'root', 'prod');
        }
        return $db;
    }

    if (!getConnection()) {
        die ('Ощибка соединения с базой данных');
    }