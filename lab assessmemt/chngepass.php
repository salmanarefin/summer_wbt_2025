<?php
$errors = [];
$success = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current = $_POST["current"];
    $new = $_POST["new"];
    $confirm = $_POST["confirm"];
    if ($current == "") $errors[] = "Current Password is required.";
    if ($new == "") $errors[] = "New Password is required.";
    elseif (strlen($new) < 6) $errors[] = "New Password must be at least 6 characters.";
    if ($confirm == "" || $confirm !== $new) $errors[] = "Passwords do not match.";
    if (empty($errors)) $success = "✅ Password changed (demo only).";
}
?>
<!DOCTYPE html>
<html>
<head><title>Change Password</title></head>
<body style="font-family:Arial; margin:20px;">
<h2>Change Password</h2>
<?php foreach($errors as $e) echo "<div style='color:red;'>$e</div>"; ?>
<?php if($success) echo "<div style='color:green;'>$success</div>"; ?>
<form method="post" style="width:300px;">
  <label>Current Password:<br><input type="password" name="current" style="width:100%;"></label><br><br>
  <label>New Password:<br><input type="password" name="new" style="width:100%;"></label><br><br>
  <label>Confirm New Password:<br><input type="password" name="confirm" style="width:100%;"></label><br><br>
  <input type="submit" value="Change Password" style="padding:5px 15px;">
</form>
</body>
</html>
