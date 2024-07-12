<?php
$id = "";
$name = "";
$username = "";
$email = "";
$new_password = "";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page <?php echo $name?></title>
    <link rel="stylesheet" href="../css/profile.css">
</head>
<body>
    <div class="profile-page">
        <div class="profile-image">
            <img id="profileImg" src="default-avatar.png" alt="Profile Image">
            <input type="file" id="imageUpload" accept="image/*" onchange="previewImage(event)">
        </div>
        <div class="profile-details">
            <label for="name">Name: <?php echo $name?></label>
            <input type="text" id="name" placeholder="Enter your name">

            <label for="email">Email: <?php echo $email?></label>
            <input type="email" id="email" placeholder="Enter your email">

            <label for="username">Username:<?php echo $username ?></label>
            <input type="text" id="username" placeholder="Enter your username">

            <label for="password">New Password: <?php echo $new_password; ?></label>
            <input type="password" id="password" placeholder="Enter new password">
            
            <button onclick="updateProfile()">Update Profile</button> <?php # here we need to make a function in php that runs which does update the profile data ?>
        </div>
    </div>
    <script src="../js/profile.js"></script>
</body>
</html>
