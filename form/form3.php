<?php
// Define variables and set empty values
$roll = $fname = $lname = $father = $day = $month = $year = $mobile = $email = $password = $gender = $city = $address = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Roll number
    if (empty($_POST["roll"])) {
        $errors[] = "Roll no. is required";
    } else {
        $roll = htmlspecialchars($_POST["roll"]);
    }

    // Student name
    if (empty($_POST["fname"]) || empty($_POST["lname"])) {
        $errors[] = "Full name is required";
    } else {
        $fname = htmlspecialchars($_POST["fname"]);
        $lname = htmlspecialchars($_POST["lname"]);
    }

    // Father’s name
    if (empty($_POST["father"])) {
        $errors[] = "Father's name is required";
    } else {
        $father = htmlspecialchars($_POST["father"]);
    }

    // Date of birth
    if (empty($_POST["day"]) || empty($_POST["month"]) || empty($_POST["year"])) {
        $errors[] = "Date of birth is required";
    }

    // Mobile number
    if (empty($_POST["mobile"])) {
        $errors[] = "Mobile number is required";
    } elseif (!preg_match("/^[0-9]{10}$/", $_POST["mobile"])) {
        $errors[] = "Enter a valid 10-digit mobile number";
    } else {
        $mobile = $_POST["mobile"];
    }

    // Email
    if (empty($_POST["email"])) {
        $errors[] = "Email is required";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    } else {
        $email = $_POST["email"];
    }

    // Password
    if (empty($_POST["password"])) {
        $errors[] = "Password is required";
    } elseif (strlen($_POST["password"]) < 6) {
        $errors[] = "Password must be at least 6 characters long";
    } else {
        $password = $_POST["password"];
    }

    // Gender
    if (empty($_POST["gender"])) {
        $errors[] = "Please select gender";
    } else {
        $gender = $_POST["gender"];
    }

    // City
    if (empty($_POST["city"])) {
        $errors[] = "City is required";
    } else {
        $city = htmlspecialchars($_POST["city"]);
    }

    // Address
    if (empty($_POST["address"])) {
        $errors[] = "Address is required";
    } else {
        $address = htmlspecialchars($_POST["address"]);
    }

    // If no errors, success
    if (empty($errors)) {
        echo "<h3 style='color:green; text-align:center;'>Registration Successful ✅</h3>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Registration Form</title>
    <style>
        body {
            background-color: #f8d7d7;
            font-family: Arial, sans-serif;
        }
        h2 {
            text-align: center;
            font-size: 28px;
            font-weight: bold;
        }
        form {
            width: 600px;
            margin: auto;
        }
        label {
            display: inline-block;
            width: 150px;
            font-size: 18px;
        }
        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="file"],
        select,
        textarea {
            width: 400px;
            padding: 5px;
            margin: 5px 0;
        }
        textarea {
            height: 70px;
        }
        .inline-input {
            width: 120px;
            display: inline-block;
        }
        .dob-input {
            width: 100px;
            display: inline-block;
        }
        .btn {
            display: block;
            margin: 15px auto;
            padding: 8px 20px;
            font-size: 16px;
        }
        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>

    <h2>Student Registration Form</h2>

    <?php
    if (!empty($errors)) {
        echo "<div class='error'><ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul></div>";
    }
    ?>

    <form method="post" enctype="multipart/form-data">

        <label>Roll no. :</label>
        <input type="text" name="roll" value="<?php echo $roll; ?>"><br><br>

        <label>Student name :</label>
        <input type="text" class="inline-input" name="fname" placeholder="First Name" value="<?php echo $fname; ?>"> -
        <input type="text" class="inline-input" name="lname" placeholder="Last Name" value="<?php echo $lname; ?>"><br><br>

        <label>Father's name :</label>
        <input type="text" name="father" value="<?php echo $father; ?>"><br><br>

        <label>Date of birth :</label>
        <input type="text" class="dob-input" name="day" placeholder="Day" value="<?php echo $day; ?>"> -
        <input type="text" class="dob-input" name="month" placeholder="Month" value="<?php echo $month; ?>"> -
        <input type="text" class="dob-input" name="year" placeholder="Year" value="<?php echo $year; ?>">
        <span>(DD-MM-YYYY)</span><br><br>

        <label>Mobile no. :</label>
        <input type="text" class="inline-input" value="+91" disabled> -
        <input type="text" class="inline-input" name="mobile" value="<?php echo $mobile; ?>"><br><br>

        <label>Email id :</label>
        <input type="email" name="email" value="<?php echo $email; ?>"><br><br>

        <label>Password :</label>
        <input type="password" name="password"><br><br>

        <label>Gender :</label>
        <input type="radio" name="gender" value="Male" <?php if ($gender=="Male") echo "checked"; ?>> Male
        <input type="radio" name="gender" value="Female" <?php if ($gender=="Female") echo "checked"; ?>> Female<br><br>

        <label>Department :</label>
        <input type="checkbox" name="dept[]" value="CSE"> CSE
        <input type="checkbox" name="dept[]" value="IT"> IT
        <input type="checkbox" name="dept[]" value="ECE"> ECE
        <input type="checkbox" name="dept[]" value="Civil"> Civil
        <input type="checkbox" name="dept[]" value="Mech"> Mech<br><br>

        <label>Course :</label>
        <select name="course">
            <option>---------------- Select Current Course's ----------------</option>
            <option>B.Tech</option>
            <option>BCA</option>
            <option>MCA</option>
            <option>M.Tech</option>
        </select><br><br>

        <label>Student photo :</label>
        <input type="file" name="photo"><br><br>

        <label>City :</label>
        <input type="text" name="city" value="<?php echo $city; ?>"><br><br>

        <label>Address :</label>
        <textarea name="address"><?php echo $address; ?></textarea><br><br>

        <input type="submit" class="btn" value="Register">
    </form>

</body>
</html>
