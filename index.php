<?php
session_start();
if (isset($_SESSION['username'])) {
    echo "<p>Welcome back {$_SESSION['username']}</p>";
} else {
    echo "<a href='login.php'>Login</a>";
}

?>