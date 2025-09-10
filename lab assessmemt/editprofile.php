<?php
session_start();
 
// fake user data (normally this comes from database)
$_SESSION['username'] = $_SESSION['username'] ?? "Bob";
$user = [
    "name" => "Bob",
    "email" => "bob@aiub.edu",
    "gender" => "Male",
    "dob" => "23/12/1999"
];
 
// handle form submit (demo only)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user['name']   = $_POST['name'] ?? $user['name'];
    $user['email']  = $_POST['email'] ?? $user['email'];
    $user['gender'] = $_POST['gender'] ?? $user['gender'];
    $user['dob']    = $_POST['dob'] ?? $user['dob'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>xCompany – Edit Profile</title>
  <style>
    body{font-family:"Times New Roman",serif;margin:0;padding:0}
    .frame{max-width:960px;margin:20px auto;border:2px solid #444}
    .bar{display:flex;justify-content:space-between;align-items:center;
         padding:10px 15px;border-bottom:2px solid #444}
    .brand .x{color:green;font-size:28px;font-weight:bold}
    .brand .c{font-size:24px;font-weight:bold}
    .footer{text-align:center;border-top:2px solid #444;padding:10px}
    .content{display:flex;min-height:300px}
    .sidebar{width:240px;border-right:2px solid #444;padding:15px}
    .sidebar h3{margin:0 0 6px;font-weight:bold}
    .sidebar ul{margin:6px 0 0 20px;padding:0}
    .sidebar li{margin-bottom:6px}
    .sidebar a{color:purple;text-decoration:none}
    .sidebar a:hover{text-decoration:underline}
    .mainarea{flex:1;padding:20px}
    fieldset{border:1px solid #666;padding:15px}
    legend{font-weight:bold}
    .form-table{width:100%}
    .form-table td{padding:6px 10px;vertical-align:middle}
    input[type=text],input[type=email],input[type=password]{
      width:100%;padding:4px;border:1px solid #777
    }
    input[type=submit]{padding:5px 10px;margin-top:8px}
  </style>
</head>
<body>
<div class="frame">
  <!-- top bar -->
  <header class="bar">
    <div class="brand"><span class="x">X</span><span class="c">Company</span></div>
    <div>Logged in as <a href="#"><?= htmlspecialchars($_SESSION['username']) ?></a> | <a href="logout.php">Logout</a></div>
  </header>
 
  <!-- content -->
  <main class="content">
    <aside class="sidebar">
      <h3>Account</h3><hr>
      <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="view_profile.php">View Profile</a></li>
        <li><a href="edit_profile.php">Edit Profile</a></li>
        <li><a href="change_picture.php">Change Profile Picture</a></li>
        <li><a href="change_password.php">Change Password</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </aside>
 
    <section class="mainarea">
      <form method="post">
        <fieldset>
          <legend>EDIT PROFILE</legend>
          <table class="form-table">
            <tr>
              <td>Name</td><td>:</td>
              <td><input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>"></td>
            </tr>
            <tr>
              <td>Email</td><td>:</td>
              <td><input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>"></td>
            </tr>
            <tr>
              <td>Gender</td><td>:</td>
              <td>
                <label><input type="radio" name="gender" value="Male" <?= $user['gender']=="Male"?"checked":"" ?>> Male</label>
                <label><input type="radio" name="gender" value="Female" <?= $user['gender']=="Female"?"checked":"" ?>> Female</label>
                <label><input type="radio" name="gender" value="Other" <?= $user['gender']=="Other"?"checked":"" ?>> Other</label>
              </td>
            </tr>
            <tr>
              <td>Date of Birth</td><td>:</td>
              <td><input type="text" name="dob" value="<?= htmlspecialchars($user['dob']) ?>"> (dd/mm/yyyy)</td>
            </tr>
          </table>
          <input type="submit" value="Submit">
        </fieldset>
      </form>
    </section>
  </main>
 
  <!-- footer -->
  <footer class="footer">Copyright © 2017</footer>
</div>
</body>
</html>
 