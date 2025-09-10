<?php
session_start();
 

$_SESSION['username'] = $_SESSION['username'] ?? "Bob";
$user = [
    "name" => "Bob",
    "email" => "bob@aiub.edu",
    "gender" => "Male",
    "dob" => "19/09/1998"
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>xCompany – View Profile</title>
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
    .profile-box{border:1px solid #666;padding:15px}
    .profile-box legend{font-weight:bold}
    .profile-table{width:100%}
    .profile-table td{padding:6px 10px;vertical-align:top}
    .profile-pic{text-align:center}
    .profile-pic img{width:80px;height:80px;border:1px solid #999;margin-bottom:5px}
  </style>
</head>
<body>
<div class="frame">
 
  <header class="bar">
    <div class="brand"><span class="x">X</span><span class="c">Company</span></div>
    <div>Logged in as <a href="#"><?= htmlspecialchars($_SESSION['username']) ?></a> | <a href="logout.php">Logout</a></div>
  </header>
 
 
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
      <fieldset class="profile-box">
        <legend>PROFILE</legend>
        <table class="profile-table">
          <tr>
            <td>Name</td><td>: <?= htmlspecialchars($user['name']) ?></td>
            <td rowspan="4" class="profile-pic">
              <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" alt="profile">
              <br><a href="change_picture.php">Change</a>
            </td>
          </tr>
          <tr><td>Email</td><td>: <?= htmlspecialchars($user['email']) ?></td></tr>
          <tr><td>Gender</td><td>: <?= htmlspecialchars($user['gender']) ?></td></tr>
          <tr><td>Date of Birth</td><td>: <?= htmlspecialchars($user['dob']) ?></td></tr>
        </table>
        <hr>
        <a href="edit_profile.php">Edit Profile</a>
      </fieldset>
    </section>
  </main>
 
  
  <footer class="footer">Copyright © 2017</footer>
</div>
</body>
</html>