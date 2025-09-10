<?php
$errors = [];
$success = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    if ($email == "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid Email is required.";
    if (empty($errors)) $success = "✅ Password reset link sent.";
}
?>
<!DOCTYPE html>
<html>
<head><title>Forgot Password</title></head>
<body style="font-family:Arial; margin:20px;">
    
    <header class="site">
        <nav class="nav">


            <a href="">home</a>
            <a href="">login</a>
            <a href="">registration</a>
        </nav>
    </header>

<h2>Forgot Password</h2>
<?php foreach($errors as $e) echo "<div style='color:red;'>$e</div>"; ?>
<?php if($success) echo "<div style='color:green;'>$success</div>"; ?>
<form method="post" style="width:300px;">
  <label>Email:<br><input type="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? '') ?>" style="width:100%;"></label><br><br>
  <input type="submit" value="Send Reset Link" style="padding:5px 15px;">
</form>
</body>
</html>
