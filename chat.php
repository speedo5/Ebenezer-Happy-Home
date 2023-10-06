
<!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
</head>
<body>
    <h2>Upload an Image</h2>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" accept="image/*" required>
        <input type="submit" value="Upload">
    </form>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file was uploaded without errors
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
        $uploadedFile = $_FILES["image"];

        // Define the directory where the uploaded image will be saved
        $uploadDir = "uploads/";

        // Generate a unique name for the uploaded image to prevent overwriting
        $uniqueName = uniqid() . "_" . $uploadedFile["name"];

        // Create the full path to save the uploaded image
        $uploadPath = $uploadDir . $uniqueName;

        // Move the uploaded file to the desired location
        if (move_uploaded_file($uploadedFile["tmp_name"], $uploadPath)) {
            echo "Image uploaded successfully. You can view it <a href='$uploadPath' target='_blank'>here</a>.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Please select an image to upload.";
    }
}
?>
