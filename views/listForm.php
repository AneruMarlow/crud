<html>

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

        foreach($data as $item) { ?>

            <tr>

                <td> <?php echo  $item['name']; ?>  </td>
                <td> <?php echo $item['description']; ?></td>
                <td> <?php echo $item['created_at']; ?> </td>

                <td>
                    <a href="../update.php?id=<?php echo $item['id'];?>"> Edit </a>
                    <a href="../delete.php?id=<?php echo $item['id'];?>"> Delete </a>

                </td>

            </tr>

        <?php } ?>

    </table>

    <br>

    <button formaction="create.php" formmethod="GET"> Add </button>

</form>

</body>

</html>