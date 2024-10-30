<?php

require_once('./operations.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
</head>
<body>
    <h1>Registration form</h1>
    <div class="container">
        <form action="display.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <!-- <label for="username">Username</label>
                <input type="text" placeholder="Input Username" name="username">
                <label for="mobile">Mobile</label>
                <input type="text" placeholder="Input Mobile" name="mobile">
                <button type="submit" name="submit">Submit</button> -->

                <?php inputFields("Username", "username", "", "text") ?>
                <?php inputFields("Mobile", "mobile", "", "text") ?>
                <?php inputFields("", "file", "", "file") ?>
                <button type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>