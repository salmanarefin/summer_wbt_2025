<?php
$errors = [];
$success = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    if ($email == "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid Email is required.";
    if ($password == "") $errors[] = "Password is required.";
    if (empty($errors)) $success = "✅ Login successful (demo only).";
}
?>
<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body style="font-family:Arial; margin:20px;">
<h2>Login</h2>
<?php foreach($errors as $e) echo "<div style='color:red;'>$e</div>"; ?>
<?php if($success) echo "<div style='color:green;'>$success</div>"; ?>
<form method="post" style="width:300px;">
  <label>Email:<br><input type="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? '') ?>" style="width:100%;"></label><br><br>
  <label>Password:<br><input type="password" name="password" style="width:100%;"></label><br><br>
  <input type="submit" value="Login" style="padding:5px 15px;">
</form>
<p><a href="forgot_password.php">Forgot Password?</a></p>
</body>
</html>
