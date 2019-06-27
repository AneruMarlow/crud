<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['Name']) && isset($_POST['Description']) && isset($_POST['Created_at'])) {

    if ($_POST['Name'] && $_POST['Description'] && $_POST['Created_at']) {

        $dbh = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=crud;user=postgres;password=141592");
        $sth = $dbh->prepare ( "INSERT INTO article (name, description, created_at) VALUES (:name, :description, :created_at )");
        $sth->bindParam(':name', $_POST['Name']);
        $sth->bindParam(':description', $_POST['Description']);
        $sth->bindParam(':created_at', $_POST['Created_at']);
        $sth->execute( );

    }

    header ( "Location: read.php");
    exit ( );

}

?>

<head>

    <title> Create </title>

</head>

<form action="create.php" method="post" name="Create" autocomplete="on">

    <p> Name <input type="text" name="Name"> </p>
    <p> Description <input type="text" name="Description"></p>
    <p> Created_at <input type="date" name="Created_at"></p>
    <input type="submit" name="Save">

</form>

