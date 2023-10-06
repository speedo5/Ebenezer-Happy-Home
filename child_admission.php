<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Children's Home Admission Form</title>
</head>
<style>
    body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

.form-container {
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
  <div class="form-container">
    <h2>Children's Home Admission Form</h2>
    <form action="submit_form.php" method="post">
      <!-- Personal Information Section -->
      <fieldset>
        <legend>Personal Information</legend>
        <label for="fullName">Full Name:</label>
        <input type="text" id="fullName" name="fullName" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" required>
      </fieldset>

      <!-- Address Section -->
      <fieldset>
        <legend>Address</legend>
        <label for="address">Street Address:</label>
        <input type="text" id="address" name="address" required>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" required>

        <label for="zipcode">Zip Code:</label>
        <input type="text" id="zipcode" name="zipcode" required>
      </fieldset>

      <!-- Additional Information Section -->
      <fieldset>
        <legend>Additional Information</legend>
        <label for="childAge">Age of Child:</label>
        <input type="number" id="childAge" name="childAge" required>

        <label for="comments">Additional Comments:</label>
        <textarea id="comments" name="comments" rows="4"></textarea>
      </fieldset>

      <!-- Submit Button -->
      <button type="submit">Submit Application</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="script.js"></script>

  <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zipcode = $_POST['zipcode'];
    $childAge = $_POST['childAge'];
    $comments = $_POST['comments'];

    // Process the data (you can save it to a database, send emails, etc.)
    // For now, let's just print the data
    echo "Full Name: $fullName <br>";
    echo "Email: $email <br>";
    echo "Phone Number: $phone <br>";
    echo "Street Address: $address <br>";
    echo "City: $city <br>";
    echo "Zip Code: $zipcode <br>";
    echo "Age of Child: $childAge <br>";
    echo "Additional Comments: $comments <br>";
}
?>

</body>
</html>
