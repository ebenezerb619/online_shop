<?php

include "../config/db.php";

if(!isset($_SESSION['user_id'])){
header("Location: ../auth/login.php");
}

$id=$_SESSION['user_id'];

$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();

$user = $result->fetch_assoc();


/* UPDATE PROFILE */

if(isset($_POST['update_profile'])){

$name = trim($_POST['fullname']);
$phone = trim($_POST['phone']);
$dob = trim($_POST['dob']);

$stmt = $conn->prepare("UPDATE users SET fullname = ?, phone = ?, dob = ? WHERE id = ?");
$stmt->bind_param('sssi', $name, $phone, $dob, $id);
$stmt->execute();

set_flash('success', 'Profile updated successfully.');
header("Location: profile.php");
exit;

}


/* CHANGE PASSWORD */

if(isset($_POST['change_password'])){

$newpass = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

$stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
$stmt->bind_param('si', $newpass, $id);
$stmt->execute();

set_flash('success', 'Password changed successfully.');
header("Location: profile.php");
exit;

}


/* DELETE ACCOUNT */

if(isset($_POST['delete_account'])){

$stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
$stmt->bind_param('i', $id);
$stmt->execute();

session_destroy();

header("Location: ../index.php");

}

include "../templates/header.php";

?>


<div class="profile-container">

<h1>My Profile</h1>


<div class="profile-cards">

<!-- PROFILE INFO CARD -->

<div class="profile-card">

<h2>Update Profile</h2>

<form method="POST">

<input type="text" name="fullname" value="<?php echo htmlspecialchars($user['fullname'], ENT_QUOTES, 'UTF-8'); ?>" placeholder="Full Name">

<input type="text" name="phone" value="<?php echo htmlspecialchars($user['phone'], ENT_QUOTES, 'UTF-8'); ?>" placeholder="Phone Number">

<input type="date" name="dob" value="<?php echo htmlspecialchars($user['dob'], ENT_QUOTES, 'UTF-8'); ?>">

<button name="update_profile">Update Profile</button>

</form>

</div>


<!-- PASSWORD CARD -->

<div class="profile-card">

<h2>Change Password</h2>

<form method="POST">

<input type="password" name="new_password" placeholder="New Password">

<button name="change_password">Change Password</button>

</form>

</div>


<!-- DELETE ACCOUNT CARD -->

<div class="profile-card delete-card">

<h2>Delete Account</h2>

<p>This action cannot be undone.</p>

<form method="POST">

<button class="delete-btn" name="delete_account">
Delete My Account
</button>

</form>

</div>

</div>

</div>


<?php include "../templates/footer.php"; ?>