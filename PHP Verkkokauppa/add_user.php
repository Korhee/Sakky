<?php


require('lib/db.php');


// Otetaan tiedot talteen saadusta lomakkedatasta
$firstname = $sql->real_escape_string($_POST['firstname']);
$lastname = $sql->real_escape_string($_POST['lastname']);
$address = $sql->real_escape_string($_POST['address']);
$city = $sql->real_escape_string($_POST['city']);
$zip = $sql->real_escape_string($_POST['zip']);
$phone = $sql->real_escape_string($_POST['phone']);
$email = $sql->real_escape_string($_POST['email']);
$message = $sql->real_escape_string($_POST['message']);
$errors = [];

$sendMessage = trim($message);


$sql->query("INSERT INTO customer (firstname, lastname, address, city, zip, phone, email, message) 
    VALUES ('" . $firstname . "', '" . $lastname . "', '" . $address . "','" . $city . "', '" . $zip . "', '" . $phone . "', '" . $email . "','" . $message . "')");

//Haetaan viimeksi lisätyn käyttäjän ID
$newUser = $sql->insert_id;
$_SESSION['käyttäjä'] = $newUser;

$newUser = $_SESSION['käyttäjä'];
$result = $sql->query("SELECT * FROM customer WHERE id = '" . $newUser . "'");
$tilaaja = $result->fetch_assoc();

//Tarkistaa onko viesti kenttä tyhjä. Jos ei ole niin lähettää viestin sähköpostilla myyjälle.
if (empty($sendMessage)) {
    header("location: checkout.php");
} else {
    $to = "korhonen.ee@gmail.com";
    $subject .= "Viesti ostajalta " . $tilaaja['firstname'] . " " . $tilaaja['lastname'];
    $message = $tilaaja['message'];
    mail($to, $subject, $message);

    header("location: checkout.php");
}
