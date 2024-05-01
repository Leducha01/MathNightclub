<?php
// Połączenie z bazą danych
$servername = "localhost"; // Nazwa hosta
$username = "root"; // Nazwa użytkownika bazy danych
$password = ""; // Hasło bazy danych
$database = "Math"; // Nazwa bazy danych

// Tworzenie połączenia
$conn = new mysqli($servername, $username, $password, $database);

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obsługa formularza rejestracji
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pobieranie danych z formularza
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Zabezpieczenie przed SQL injection
    $username = mysqli_real_escape_string($conn, $username);
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);
    
    // Haszowanie hasła przed zapisaniem do bazy danych (dla bezpieczeństwa)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Zapytanie SQL
    $sql = "INSERT INTO login (nazwa, email, haslo) VALUES ('$username', '$email', '$hashed_password')";
    
    // Wykonanie zapytania
    if ($conn->query($sql) === TRUE) {
        echo "Użytkownik został zarejestrowany pomyślnie.";
    } else {
        echo "Błąd podczas rejestracji użytkownika: " . $conn->error;
    }
}

// Zamknięcie połączenia
$conn->close();
?>
