<?php
if (!empty($_POST['email'])) {
    include "config.php";

    $fullName = $_POST['fName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    $query = $mysqli->query("INSERT INTO users(email, password, photo, gender) VALUES('$email', '$password', '', '')");
    if ($query) {
        echo "<p>Registration Successful!</p>";
    } else {
        echo "<p>Another user is already using the email: <em>$email</em></p>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Registration</title>
</head>
<body>
	<form action="" method="post">
        <div class="form-group">
            <label>Full name</label>
            <input type="text" name="fName">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password">
        </div>
        <div class="form-group">
            <label>Repeat password</label>
            <input type="password" name="password2">
        </div>
        <input type="submit" value="Register">
    </form>
<p>Return to <a href="login.php">Login</a></p>
</body>
</html>