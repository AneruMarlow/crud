<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_GET['id'])) {

    $dbh = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=crud;user=postgres;password=141592");
    $df = $dbh -> prepare("DELETE FROM Article WHERE id=:id;");
    $df -> bindParam(':id', $_GET['id'] );
    $df ->execute();
    header ( "Location: read.php");

}