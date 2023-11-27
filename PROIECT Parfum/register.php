<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Pagină de Înregistrare</title>
</head>

<body>
    <div class="info" align="center">
        <form action="register.php" method="post">
            <table cellpadding="8">
                <tr>
                    <td>
                        <h2 align="center">Înregistrare</h2>
                        <label for="fullname">Nume și prenume:</label><br>
                        <input type="text" id="fullname" name="fullname" required><br><br>
            
                        <label for="email">Adresă de email:</label><br>
                        <input type="email" id="email" name="email" required><br><br>
            
                        <label for="phone">Număr de telefon:</label><br>
                        <input type="text" id="phone" name="phone" required><br><br>
            
                        <label for="location">Adresă livrare:</label><br>
                        <textarea name="location" rows="4" cols="20" required></textarea><br><br>
            
                        <label for="password">Parolă:</label><br>
                        <input type="password" id="password" name="password" required><br><br>
            
                        <input type="submit" value="Trimite" class="register-button"><br><br>
                    </td>
                </tr>
            </table>
        </form>
        <img src="imagini/giordani.jpg" width="195"></a>
    </div>


</body>

</html>

<?php
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Verifică formatul adresei de email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Adresa de email nu este validă!";
    }

    // Database connection parameters
    $servername = "localhost";
    $username = "root"; // Replace with your MySQL username
    $password = ""; // Replace with your MySQL password
    $dbname = "parfumuri"; // Replace with your database name
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the INSERT statement
    $stmt = $conn->prepare("INSERT INTO clienti (nume, email, nr_telefon, parola) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $fullname, $email, $phone, $password);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
        // You can redirect the user or perform additional actions after successful registration
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>


