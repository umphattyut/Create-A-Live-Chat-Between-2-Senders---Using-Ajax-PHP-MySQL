<!-- getMessages.php -->
<?php
include_once('db.php');
// Retrieve messages from database (you need to implement this)
if (isset($_GET['getSender1'])) {
    $getSender1 = $_GET['getSender1'];
    $result = mysqli_query($mysqli, "SELECT * FROM `messages` WHERE `sender`='$getSender1' ORDER BY timestamp DESC");
    // Loop through $result and display messages
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div><strong>{$row['sender']}</strong>: {$row['message']} - {$row['timestamp']}</div>";
    }
}
if (isset($_GET['getSender2'])) {
    $getSender2 = $_GET['getSender2'];
    $result = mysqli_query($mysqli, "SELECT * FROM `messages` WHERE `sender`='$getSender2' ORDER BY timestamp DESC");
    // Loop through $result and display messages
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div><strong>{$row['sender']}</strong>: {$row['message']} - {$row['timestamp']}</div>";
    }
}
?>
