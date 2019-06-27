<?php

if(isset($_POST['Name']) && isset($_POST['Description']) && isset($_POST['Created'])) {

    if ($_POST['Name'] && $_POST['Description'] && $_POST['Created']) {

        $dbh = new PDO("pgsql:host=127.0.0.1:8000; dbname=crud", "postgres", '141592', array(\PDO::PGSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        $sth = $dbh -> prepare ( "INSERT INTO article (name, description, created) VALUES (:name, :description, :created )");
        $sth -> bindParam(':name', $_POST['Name']);
        $sth -> bindParam(':description', $_POST['Description']);
        $sth -> bindParam(':created', $_POST['Created']);
        $sth -> execute( );

    }

    header ( "Location: index.php");
    exit ( );

}
?>


<form action="create.php" method="post" name="Create" autocomplete="on">

    <p> Name <input type="text" name="Name"> </p>
    <p> Description <input type="text" name="Description"></p>
    <p> Created <input type="date" name="Created"></p>
    <input type="submit" name="Save">

</form>

