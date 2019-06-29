<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_GET['id'])) {

    $dbh = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=crud;user=postgres;password=141592");
    $stmt = $dbh->prepare("SELECT * FROM article WHERE id=:IDENTITY ");
    $stmt->bindParam(":IDENTITY", $_GET['id']);

    $stmt->execute();
    $result = $stmt->fetchAll();

    $item = $result[0]; ?>
    <html>

<head>

    <title> Update </title>

</head>

<body>

<form action="update.php" method="post" name="Update" autocomplete="on" >

    <h1> Enter data</h1>
    <p> Name <input type="text" name="Name" value="<?php echo ($item['name']) ?>" /> </p>
    <p> Description <input type="text" name="Description" value="<?php echo ($item['description']) ?>" /> </p>
    <p> Created_at <input type="date" name="Created_at" value="<?php echo ($item['created_at']) ?>" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" /> </p>
    <p>
        <input type="submit" value="Save"  >

        <input type="reset" value="Reset" >

        <button name="chancel" formaction="read.php" > Cancel </button>

        <input type="text" name="id"  value="<?php echo $item['id'] ?>" hidden>

    </p>

</form>

</body>

</html>

<?php }

if (isset($_POST['id'])) {

    if ($_POST['Name'] && $_POST['Description'] && $_POST['Created_at']) {

        $dbh = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=crud;user=postgres;password=141592");
        $stmt = $dbh->prepare("UPDATE article SET name = :name, description = :description, created_at = :created_at WHERE id = :id");


        $stmt->bindParam(':name', $_POST['Name']);
        $stmt->bindParam(':description', $_POST['Description']);
        $stmt->bindParam(':created_at', $_POST['Created_at']);
        $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);

        $stmt->execute();


    }

    header("Location: MainController.php");
}