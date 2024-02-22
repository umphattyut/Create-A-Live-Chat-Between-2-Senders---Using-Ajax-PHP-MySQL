<!-- sendMessage.php -->
<?php
include_once('db.php');
// Handle sending message
if(isset($_POST['Sendmessage'])) {
    $message = strip_tags(trim(addslashes($_POST['Sendmessage'])));
    $sender = strip_tags(trim(addslashes($_POST['Sender'])));
    // Save message to database (you need to implement this)
    mysqli_query($mysqli, "INSERT INTO `messages` (`sender`, `message`, `timestamp`) VALUES ('$sender', '$message', NOW())");
    echo "Message sent!";
}
?>
