<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM1</title>
</head>

<body>
    <?php
$nameErr=$EmailErr=$usernameErr=$passwordErr=$confirmpassErr=$genderErr="";
$name=$Email=$username=$password=$confirmpass=$gender="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
         if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
            }
        }

         if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            }
        }

          if (empty($_POST["name"])) {
            $usernameErr = "Name is required";
        } else {
            $username = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$username)) {
            $usernameErr = "Only letters and white space allowed";
            }
        }



        

        function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }

    }
    ?>

    <form method="POST">
        <h2> Company </h2>

   

        <div class="container">
            <label for="Name"><strong> Name</strong><?php echo $nameErr;?></label>
            <input type=" text" id="Name" value ="<?php echo $name;?>" >

        </div>
        
        <div class="container">
            <label for="Email"><strong>Email</strong><?php echo $EmailErr;?></label>
            <input type=" Email" id="Name" value ="<?php echo $Email;?>" >

        </div>

        <div class="container">
            <label for="username"><strong> username</strong><?php echo $usernameErr;?></label>
            <input type=" text" id="Name" value ="<?php echo $username;?>" >

        </div>

        <div class="container">
            <label for="password"><strong>password</strong><?php echo $passwordErr;?></label>
            <input type="password" id="Name" value ="<?php echo $password;?>" >

        </div>

         <div class="container">
            <label for="confirmpass"><strong>Confirm password</strong><?php echo $confirmpassErr;?></label>
            <input type="password" id="Name" value ="<?php echo $confirmpass;?>" >

        </div>
 <div class="container">
            <label><strong>gender</strong></label><br>
        <input type="radio" name="gender" value="none" id="none">
            <label for="none">male</label>

            <input type="radio" name="gender" value="none" id="none">
            <label for="none">female</label>

            <input type="radio" name="other" value="none" id="$none">
            <label for="none">other</label>
</div>
<label><strong>Date of birth</strong></label><br>
 <input type=" text" id="Name" style=size:50px; >
<input type=" text" id="Name" value ="" >
<input type=" text" id="Name" value ="" >
<input type ="submit" id ="Name" value ="">

    </body>
    </html>