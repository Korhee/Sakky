<?php

session_start();

$sql = new mysqli("localhost","eero","Hermankoori-1891","sakky_erkko");

if ($sql -> connect_errno) {
    die ("Ongelma tietokannan kanssa" . $sql -> connect_errno);
}

?>