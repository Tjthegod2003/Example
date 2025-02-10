<?php
$servername = "localhost";
$username = "id21360720_eugenedup";
$password = "12345678Ee!";
$dbname = "id21360720_maindata"; // Replace with your actual database name

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // Set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Check if the subscribe form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"])) {
    $userEmail = $_POST["email"];

    // SQL statement to insert email into the "Subscribe" table
    $sql = "INSERT INTO SignUp (UserEmail) VALUES (:userEmail)";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':userEmail', $userEmail);

    // Execute the statement
    $stmt->execute();

    // Close the database connection
    $conn = null;
    
    echo "Sucsess you can now go back";

  }
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>
