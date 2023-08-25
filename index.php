<?php
$insert = false;
if(isset($_POST['name'])){
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass ='';
    $db = "jnu_trip";


    $con = mysqli_connect($dbhost, $dbuser,'', $db);

    if(!$con){
        die("connection to this database failed due to ".mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO `trip2` (`name`, `email`, `phone`, `age`, `gender`, `other`, `date`) VALUES ('$name', '$email', '$phone', '$age', '$gender', '$desc', current_timestamp());";
    // echo $sql;

    if($con->query($sql) == true){
        // echo "Successfully inserted";
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br>  $con->error";
    }

    $con->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@10..48,300;10..48,400&display=swap" rel="stylesheet">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="JNU">
    <div class="container">
        <h1>Welcome to JNU Trip form</h1>
        <p>Enter your details and submit this form to confirm you participation in the trip</p>
        <?php
            if($insert==true){
                echo "<p class='thankmsg'>Thanks for submitting your form, we are happy to see you joining us for this Trip</p>";
            }
        ?>
        <form action="index.php" method="post">
        <input type="text" name="name" id="name" placeholder="Enter your name">
        <input type="text" name="email" id="email" placeholder="Enter your email">
        <input type="text" name="phone" id="phone" placeholder="Enter your phone">
        <input type="text" name="age" id="age" placeholder="Enter your age">
        <input type="text" name="gender" id="gender" placeholder="Enter your gender">
       <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter other information here"></textarea>
        <button class="btn">Submit</button>   
        <!-- <button class="btn">Reset</button>    -->
    </form>
    </div>
    <script src="index.js"></script>
</body>
</html>



