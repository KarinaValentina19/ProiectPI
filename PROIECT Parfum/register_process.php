<?php
// Conectare la baza de date Oracle
$server = "MARVEL"; // Numele serverului Oracle
$username = "APEX_PUBLIC_USER"; // Utilizatorul pentru conexiune
$password = "parola"; // Parola utilizatorului pentru conexiune
$service = "nume_serviciu"; // Numele serviciului Oracle
$connection = oci_connect($username, $password, $server.'/'.$service);

if (!$connection) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

// Preia datele trimise prin formularul HTML
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$location = $_POST['location'];
$password = $_POST['password'];

// Execută o interogare pentru a insera datele în baza de date Oracle
$query = "INSERT INTO nume_tabel (nume_prenume, adresa_email, telefon, adresa_livrare, parola) VALUES (:fullname, :email, :phone, :location, :password)";
$statement = oci_parse($connection, $query);

oci_bind_by_name($statement, ':fullname', $fullname);
oci_bind_by_name($statement, ':email', $email);
oci_bind_by_name($statement, ':phone', $phone);
oci_bind_by_name($statement, ':location', $location);
oci_bind_by_name($statement, ':password', $password);

$result = oci_execute($statement);

if ($result) {
    echo "Datele au fost adăugate cu succes în baza de date Oracle!";
} else {
    echo "Eroare la adăugarea datelor în baza de date Oracle!";
}

oci_close($connection); // Închiderea conexiunii Oracle
?>
