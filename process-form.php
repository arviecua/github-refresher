<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $mobile_number = $_POST["mobile_number"];
    $dob = $_POST["dob"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];

    // Create a PDO connection to your MySQL database
    $dsn = "mysql:host=localhost;dbname=your_database_name;charset=utf8";
    $username = "your_username";
    $password = "your_password";

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare and execute the SQL query to insert data
        $sql = "INSERT INTO users (full_name, email, mobile_number, dob, age, gender) 
                VALUES (:full_name, :email, :mobile_number, :dob, :age, :gender)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":full_name", $full_name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":mobile_number", $mobile_number);
        $stmt->bindParam(":dob", $dob);
        $stmt->bindParam(":age", $age);
        $stmt->bindParam(":gender", $gender);
        $stmt->execute();

        echo "Success"; // Return a response to indicate successful submission
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $pdo = null; // Close the PDO connection
}
?>
