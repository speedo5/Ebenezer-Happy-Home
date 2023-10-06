<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Simple Chat Box</title>
</head>
<style>
    body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

.chat-container {
  max-width: 600px;
  margin: 50px auto;
}

.chat-box {
  border: 1px solid #ccc;
  padding: 10px;
  height: 300px;
  overflow-y: scroll;
}

form {
  display: flex;
}

input {
  flex: 1;
  padding: 10px;
}

button {
  padding: 10px;
  background-color: #4CAF50;
  color: white;
  border: none;
  cursor: pointer;
}

</style>

<body>
  <div class="chat-container">
    <div class="chat-box" id="chatBox">
      <!-- Chat messages will be displayed here -->
    </div>
    <form action="process.php" method="post" id="chatForm">
      <input type="text" name="message" id="messageInput" placeholder="Type your message">
      <button type="submit">Send</button>
    </form>
  </div>

  <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = $_POST['message'];

    // Save the message to a file or database (for simplicity, we'll just append to a text file here)
    $file = 'chat_history.txt';
    file_put_contents($file, date('Y-m-d H:i:s') . ': ' . $message . PHP_EOL, FILE_APPEND);
}
?>


  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="script.js">


  $(document).ready(function () {
    // Load chat history on page load
    $.ajax({
        url: 'chat_history.txt',
        dataType: 'text',
        success: function (data) {
            $('#chatBox').html(data);
            scrollToBottom();
        }
    });

    // Submit message
    $('#chatForm').submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function (data) {
                $('#messageInput').val(''); // Clear the input field
                $('#chatBox').append(data);
                scrollToBottom();
            }
        });
    });

    // Scroll to the bottom of the chat box
    function scrollToBottom() {
        var chatBox = $('#chatBox');
        chatBox.scrollTop(chatBox[0].scrollHeight);
    }
});

</script>
</body>
</html>
