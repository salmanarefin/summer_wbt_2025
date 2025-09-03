<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php

$nameErr = $emailErr = $genderErr = $websiteErr = $rollErr = $dobErr = $fatherNameErr = "";
$name = $email = $gender = $comment = $website = $roll = $dob_day = $dob_month = $dob_year = $fatherName = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  
  if (empty($_POST["roll"])) {
    $rollErr = "Roll is required";
  } else {
    $roll = test_input($_POST["roll"]);
    if (!is_numeric($roll)) {
      $rollErr = "Only numeric values allowed for Roll";
    }
  }


  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }


  if (empty($_POST["fatherName"])) {
    $fatherNameErr = "Father's Name is required";
  } else {
    $fatherName = test_input($_POST["fatherName"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$fatherName)) {
      $fatherNameErr = "Only letters and white space allowed";
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
    
  
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }


  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }


  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }



  if (empty($dob_day) || empty($dob_month) || empty($dob_year)) {
    $dobErr = "Complete Date of Birth is required";
  }
else {
$dob_day = test_input($_POST["dob_day"]);
$dob_month = test_input($_POST["dob_month"]);
$dob_year = test_input($_POST["dob_year"]);
}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

Roll No: <input type="text" name="roll" value="<?php echo $roll;?>">
  <span class="error">* <?php echo $rollErr;?></span>
  <br><br>

Student Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>

Father's Name: <input type="text" name="fatherName" value="<?php echo $fatherName;?>">
  <span class="error">* <?php echo $fatherNameErr;?></span>
  <br><br>

Date of Birth: 
<input type="text" name="dob_day" size="2" placeholder="DD" value="<?php echo $dob_day;?>"> /
<input type="text" name="dob_month" size="2" placeholder="MM" value="<?php echo $dob_month;?>"> /
<input type="text" name="dob_year" size="4" placeholder="YYYY" value="<?php echo $dob_year;?>">
<span class="error">* <?php echo $dobErr;?></span>
<br><br>

E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>

Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>

Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>

Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>

<input type="submit" name="submit" value="Submit">  
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  echo "<h2>Your Input:</h2>";
  echo "Roll: " . $roll . "<br>";
  echo "Student Name: " . $name . "<br>";
  echo "Father's Name: " . $fatherName . "<br>";
  echo "Email: " . $email . "<br>";
  echo "Website: " . $website . "<br>";
  echo "Comment: " . $comment . "<br>";
  echo "Gender: " . $gender . "<br>";
  echo "Date of Birth: " . $dob_day . "-" . $dob_month . "-" . $dob_year . "<br>";
}
?>

</body>
</html>
