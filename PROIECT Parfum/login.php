<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Pagină de Login</title>
</head>

<body>
    <div class="info1" align="center">
        <form action="login.php" method="post">
            <table cellpadding="8">
                <tr>
                    <td>
                        <h2 align="center">Login</h2>
                        <label for="email">Adresă de email:</label><br>
                        <input type="email" id="email" name="email" required><br><br>

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

<?php
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $parola = $_POST['password'];

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

    // Prepare and bind the SELECT statement to check user credentials
    $stmt = $conn->prepare("SELECT id_client, nume, email, parola FROM clienti WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // User found, verify password
        $user = $result->fetch_assoc();
        if ($parola === $user['parola']) {
            // Password is correct, login successful
            echo "Login successful! Welcome, " . $user['nume'];
            // Perform actions after successful login
        } else {
            $errors[] = "Parolă incorectă!";
        }
    } else {
        $errors[] = "Utilizatorul nu există!";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>

</html>




