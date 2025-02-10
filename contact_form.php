<?php
$servername = "localhost";
$username = "id21360720_eugenedup";
$password = "12345678Ee!";
$dbname = "id21360720_maindata"; // Replace with your actual database name

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // Set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Check if the form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST["name"];
    $userEmail = $_POST["email"];
    $userSuggestions = $_POST["suggestions"];

    // SQL statement to insert data into the "Contact" table
    $sql = "INSERT INTO Contact (UserName, UserEmail, UserSuggestions)
            VALUES (:userName, :userEmail, :userSuggestions)";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':userName', $userName);
    $stmt->bindParam(':userEmail', $userEmail);
    $stmt->bindParam(':userSuggestions', $userSuggestions);

    // Execute the statement
    $stmt->execute();

    // Optionally, you can provide a success message
    echo "Data inserted successfully.";

    // Close the database connection
    $conn = null;
    
    echo "Sucsess you can now go back";
  }
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>
