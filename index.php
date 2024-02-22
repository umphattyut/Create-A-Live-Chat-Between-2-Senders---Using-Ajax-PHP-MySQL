<!-- index.html -->
<!DOCTYPE html>
<html>
<head>
    <title>Live Chat</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
From Sender 2:
<div id="chat-box2">
    <!-- Display chat messages here -->
</div>
<hr>
<h4>Sender 1:</h4>
<form id="message-form">
    <input type="text" id="message" name="message" placeholder="Type your message..." required>
    <input type="hidden" id="sender" name="sender" value="Sender 1">
    <!-- <button type="hidden">Send</button> -->
</form>
<hr>
From Sender 1:
<div id="chat-box">
    <!-- Display chat messages here -->
</div>
<h4>Sender 2:</h4>
<form id="message-form2">
    <input type="text" id="message2" name="message2" placeholder="Type your message..." required>
    <input type="hidden" id="sender2" name="sender2" value="Sender 2">
    <!-- <button type="hidden">Send</button> -->
</form>

<script>
$(document).ready(function(){
    // Function to load messages
    function loadMessages1() {
        var sender1 = "Sender 1";
        $.ajax({
            url: 'getMessages.php',
            type: 'GET',
            data: { getSender1: sender1 },
            success: function(response) {
                $('#chat-box').html(response);
            }
        });
    }

    function loadMessages2() {
        var sender2 = "Sender 2";
        $.ajax({
            url: 'getMessages.php',
            type: 'GET',
            data: { getSender2: sender2 },
            success: function(response) {
                $('#chat-box2').html(response);
            }
        });
    }

    // Load messages on page load
    // loadMessages1();
    // loadMessages2();

    // Submit message
    $('#message-form').on('change', function(e) {
        e.preventDefault();
        var message = $('#message').val();
        var sender = $('#sender').val();
        $.ajax({
            url: 'sendMessage.php',
            type: 'POST',
            data: { Sendmessage: message, Sender: sender},
            success: function(response) {
                loadMessages1(); // Reload messages after sending
                $('#message').val(''); // Clear input field
            }
        });
    });

    // Submit message
    $('#message-form2').on('change', function(e) {
        e.preventDefault();
        var message2 = $('#message2').val();
        var sender2 = $('#sender2').val();
        $.ajax({
            url: 'sendMessage.php',
            type: 'POST',
            data: { Sendmessage: message2, Sender: sender2},
            success: function(response) {
                loadMessages2(); // Reload messages after sending
                $('#message2').val(''); // Clear input field
            }
        });
    });
loadMessages1();
loadMessages2();
    // Refresh messages every 5 seconds
    // setInterval({loadMessages1, loadMessages2}, 5000);
    // setInterval(loadMessages2, 5000);
});
</script>

</body>
</html>