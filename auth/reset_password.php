<?php include "../config/db.php"; ?>

<?php

if(isset($_POST['reset'])){

$email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
$newpassword = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

if($email){
  $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
  $stmt->bind_param('s', $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if($result->num_rows > 0){
    $stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
    $stmt->bind_param('ss', $newpassword, $email);
    $stmt->execute();

    set_flash('success', 'Password updated successfully. You can now log in.');
    header("Location: reset_password.php");
    exit;
  } else {
    set_flash('error', 'Email not found.');
    header("Location: reset_password.php");
    exit;
  }
}

}

?>

<?php include "../templates/header.php"; ?>

<div class="center-box">
  <div class="card" style="max-width:420px; width:100%;">
    <div class="card-body">
      <h2>Reset Password</h2>

      <form method="POST">

        <input type="email" name="email" placeholder="Enter your email" required>

        <input type="password" name="new_password" placeholder="Enter new password" required>

        <button name="reset">Reset Password</button>

      </form>

      <p style="margin-top:12px; font-size:0.9rem;">Remembered your password? <a href="login.php">Login</a></p>
    </div>
  </div>
</div>

<?php include "../templates/footer.php"; ?>