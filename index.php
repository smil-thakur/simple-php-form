<?php

if(isset($_POST['name'])){

    $server = "localhost";
    $username = "root";
    $password = "";
    $insert = false;

    $con = mysqli_connect($server,$username, $password);

    if(!$con){
        die("connections to this database failed" . mysqli_connect_error());
    }
    else{
        // echo "connection success";
    }

    $name    = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $other = $_POST['desc'];
    
    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";


    if ($con->query($sql) === true) {
        $insert = true;
    } else {
        echo "error $sql <br> " . mysqli_error($con);
    }
    
    $con->close();
    

    
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelStable</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <img class="bg" src="bg.jpeg" alt="Adani University">
    <div class="container">
        <h1>
            Welcome to Travel Stable
        </h1>
        <h3>
            Adani University US Trip form
        </h3>
        <p>Enter your details and submit the form to confirm your participation in the trip</p>

        <?php
            if($insert == true){
                    echo "<p class='submsg'>Thanks for submitting your form. We are happy to see you joining</p>";
                    $insert = false;
            }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter you Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone Number">
            <textarea name="desc" id="desc" cols="30" rows="10"
                placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>

        </form>
    </div>

</body>
<script src="index.js"></script>


</html>