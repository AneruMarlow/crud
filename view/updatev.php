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