<?php

$conn = new mysqli("localhost", "root", "", "gestor-noticias");

if ($conn->connect_error) {
    die("Error: " . $conn->connect_error);
}

echo "Conectado correctamente";