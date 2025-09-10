<?php
$errors = [];
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = trim($_POST["fullname"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $confirm = $_POST["confirm"];

    if ($fullname == "") {
        $errors[] = "Full Name is required.";
    }

    if ($email == "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid Email is required.";
    }

    if ($password == "") {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters.";
    }

    if ($confirm == "" || $confirm !== $password) {
        $errors[] = "Passwords do not match.";
    }

    if (empty($errors)) {
        $success = "✅ Registration successful (demo only, no database).";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Register</title>
</head>
<body style="font-family:Arial; margin:20px;">
  <h2>Registration</h2>

  <?php 
  if (!empty($errors)) {
      foreach ($errors as $e) {
          echo "<div style='color:red;'>$e</div>";
      }
  }
  if ($success) {
      echo "<div style='color:green;'>$success</div>";
  }
  ?>

  <form style="width:300px;" method="post">
    <label>Full Name:<br>
      <input type="text" name="fullname" value="<?php echo isset($_POST['fullname']) ? htmlspecialchars($_POST['fullname']) : ''; ?>" style="width:100%;">
    </label><br><br>
    <label>Email:<br>
      <input type="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" style="width:100%;">
    </label><br><br>
    <label>Password:<br>
      <input type="password" name="password" style="width:100%;">
    </label><br><br>
    <label>Confirm Password:<br>
      <input type="password" name="confirm" style="width:100%;">
    </label><br><br>
    <input type="submit" value="Register" style="padding:5px 15px;">
  </form>
</body>
</html>
