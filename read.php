<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$dbh = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=crud;user=postgres;password=141592");
$stm = $dbh->query("SELECT * FROM article");

?>



<head>

    <title> Table </title>

</head>


<body>



<form>

    <table>

        <caption> Article </caption>

        <tr>

            <td>Name</td> <td>Description</td> <td>Created_at</td> <td></td>

        </tr>

        <?php

        foreach($stm as $item) { ?>

        <tr>

            <td> <?php echo  $item['name']; ?>  </td>
            <td> <?php echo $item['description']; ?></td>
            <td> <?php echo $item['created_at']; ?> </td>

            <td>
                <a href="update.php?id=<?php echo $item['id'];?>"> Change</a>
                <a href="delete.php?id=<?php echo $item['id'];?>"> Delete</a>

            </td>

        </tr>

        <?php } ?>

    </table>

    <br>

    <button name="create" formaction="create.php" formmethod="post"> Add </button>

</form>

</body>