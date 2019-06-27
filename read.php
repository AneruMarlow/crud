<?php

$dbh = new PDO("pgsql:host=127.0.0.1:8000; dbname=crud", "postgres", '141592',  array(\PDO::PGSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
$stm = $dbh -> query("SELECT * FROM article");
$stm->execute( );
$data = $stm -> fetchAll( );
?>



<head>

    <title> Table </title>

</head>


<body>



<form>

    <table>

        <caption> Article </caption>

        <tr>

            <td>Name</td> <td>Description</td> <td>Created</td> <td></td>

        </tr>

        <?php

        foreach($stm as $item) { ?>

        <tr>

            <td> <?php echo  $item['name']; ?>  </td>
            <td> <?php echo $item['description']; ?></td>
            <td> <?php echo $item['created']; ?> </td>

            <td>
                <a href="Update.php?id=<?php echo $item['id'];?>"> Change</a>
                <a href="Delete.php?id=<?php echo $item['id'];?>"> Delete</a>

            </td>

        </tr>

        <?php } ?>

    </table>

    <br>

    <button name="create" formaction="Create.php" formmethod="post"> Add </button>

</form>

</body>