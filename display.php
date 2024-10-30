<?php

include ('./connect.php');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $mobile = $_POST['mobile'];
    $image = $_FILES['file'];
    echo $username;
    echo "<br>";
    echo $mobile;
    echo "<br>";
    // echo $image;
    print_r($image);
    echo "<br>";

    $imagefilename = $image['name'];
    print_r($imagefilename);
    echo "<br>";
    $imagefileerror = $image['error'];
    print_r($imagefileerror);
    echo "<br>";
    $imagefiletemp = $image['tmp_name'];
    print_r($imagefiletemp);
    echo "<br>";

    $filename_separate = explode('.', $imagefilename);
    print_r($filename_separate);
    echo "<br>";
    // Used this
    $file_extension=strtolower($filename_separate[1]);
    print_r($file_extension);
    // Or
    // $file_extension = strtolower(end($filename_separate));
    // print_r($file_extension);

    $extension = array('jpeg', 'jpg', 'png');
    if (in_array($file_extension, $extension)) {
        $upload_image = 'images/' . $imagefilename;
        move_uploaded_file($imagefiletemp, $upload_image);
        $sql = "INSERT INTO `registration` (username, mobile, image) VALUES ('$username', '$mobile', '$upload_image')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            // echo "Data inserted successfully";
        } else {
            die(mysqli_error($con));
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>
</head>

<body>
    <h1>Displaying data</h1>
    <div>
        <table>
            <tr>
                <th>id</th>
                <th>username</th>
                <th>mobile</th>
                <th>image</th>
            </tr>
            <?php
                $sql = "SELECT * FROM `registration`";
                $result = mysqli_query($con, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row['id'];
                    $username = $row['username'];
                    $mobile = $row['mobile'];
                    $image = $row['image'];

                    echo '
                        <tr>
                            <td>'.$id.'</td>
                            <td>'.$username.'</td>
                            <td>'.$mobile.'fdsf</td>
                            <td><img src='.$image.' /></td>
                        </tr>';
                    }
            ?>
        </table>
    </div>
</body>
</html>