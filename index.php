<?php
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}
$date = date("D-M-Y, H:i", time());

include "config.php";
if (!empty($_POST['message'])) {
    $message = $_POST['message'];
    $time = time();
    $query = $mysqli->query("INSERT INTO messages (sender, message, sent_at) VALUES ('$username', '$message', '$time')");
    echo $mysqli->error;
}

?>
<html>
<head>
    <title>Simple Chat - Home</title>
    <link href="css/style.css?v=12" rel="stylesheet" type="text/css">
</head>
<body>
<?php include "nav.php"; ?>
<div class="container">
    <?php
    if (isset($_SESSION['username'])) {
        echo "<p>Welcome back {$username}</p>";
        echo "<h5>$date</h5>";
        ?>
        <div class="chat-box">
            <div class="messages">
                <table class="chat-table">
                    <thead>
                    <td>Sender</td>
                    <td>Message</td>
                    <td>Sent At</td>
                    </thead>
                    <tbody>
                    <?php
                    $chatsQuery = $mysqli->query("SELECT * FROM messages");
                    while ($rows = $chatsQuery->fetch_assoc()) {
                        $chatMessage = $rows['message'];
                        $chatSender = $rows['sender'];
                        ?>
                        <tr>
                            <td><?php echo $rows['sender']; ?></td>
                            <td><?php echo $rows['message']; ?></td>
                            <td><?php echo $rows['sent_at']; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>

            </div>
            <a href="index.php">Refresh</a>
            <form action="" method="post">
                <textarea name="message" rows="5" cols="15"></textarea>
                <input type="submit" value="Send">
            </form>
        </div>
        <?php
    } else {
        echo "<a href='login.php'>Login</a>";
    }
    ?>

</div>
</body>
</html>
