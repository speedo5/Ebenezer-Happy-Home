<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>News Upload</title>
</head>

<style>
    body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

.upload-container {
  max-width: 600px;
  margin: 50px auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 8px;
}

form {
  display: flex;
  flex-direction: column;
}

label {
  margin-top: 10px;
}

input, textarea {
  margin-bottom: 15px;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button {
  padding: 10px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

</style>
<body>
  <div class="upload-container">
    <h2>Upload News</h2>
    <form id="newsForm" enctype="multipart/form-data">
      <label for="newsTitle">Title:</label>
      <input type="text" id="newsTitle" name="newsTitle" required>

      <label for="newsDescription">Description:</label>
      <textarea id="newsDescription" name="newsDescription" required></textarea>

      <label for="newsImage">Image:</label>
      <input type="file" id="newsImage" name="newsImage" accept="image/*" required>

      <button type="button" onclick="uploadNews()">Upload News</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="script.js">
    function uploadNews() {
    const form = $('#newsForm')[0];
    const formData = new FormData(form);

    $.ajax({
        type: 'POST',
        url: 'upload_news.php',
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            alert(response); // Show a success message or handle accordingly
            // Optionally, you can redirect the user or perform additional actions
        },
        error: function (error) {
            console.error(error);
            alert('Error uploading news. Please try again.'); // Show an error message
        }
    });
}
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newsTitle = $_POST['newsTitle'];
    $newsDescription = $_POST['newsDescription'];
    $newsImage = $_FILES['newsImage'];

    // Handle the uploaded image
    $uploadDir = 'uploads/';
    $uploadFile = $uploadDir . basename($newsImage['name']);

    if (move_uploaded_file($newsImage['tmp_name'], $uploadFile)) {
        // Save other information to a database or handle as needed
        echo 'News uploaded successfully!';
    } else {
        echo 'Error uploading news. Please try again.';
    }
}
?>

  </script>
</body>
</html>
