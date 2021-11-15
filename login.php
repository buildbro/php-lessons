<?php
if (!empty($_POST['email']) AND !empty($_POST['password'])) {
    include "config.php";

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = $mysqli->query("SELECT email, password FROM users WHERE email='$email'");
    $row = $query->fetch_assoc();
    if ($row['password'] == $password) {
        session_start();
        $_SESSION['username'] = $row['email'];
        echo "<p>Welcome! <a href='index.php'>Home</a></p>";
    } else {
        echo "Invalid login details";
    }
}
?>

<html>
<head>
    <title>Login</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
    <div class="form-container">
        <form action="" method="post">
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email">
            </div>
            <div class="form-group">
                <label>password</label>
                <input type="text" name="password">
            </div>
            <input type="submit" value="Login">
        </form>
        <p>New user? <a href="reg.php">Register</a></p>
    </div>
</div>
</body>
</html>
