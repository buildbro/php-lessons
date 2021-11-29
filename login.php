<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$x="bbe";
function bbe() {
    echo "hey";
}
echo $x();

if (!empty($_POST['email']) AND !empty($_POST['password'])) {
    include "config.php";

    $email = $_POST['email'];
    $password = $_POST['password'];


    $query = $mysqli->query("SELECT email, password FROM users WHERE email=");
    $row = $query->fetch_assoc();
    if ($row['password'] == $password) {
        session_start();
        $_SESSION['username'] = $row['email'];
        header('location: index.php');
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
<?php include "nav.php"; ?>
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
