<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/all1.css">
    <link rel="stylesheet" type="text/css" href="css/mainPanel.css">
    <title>Document</title>
</head>
<body>
    <div id="sideBar">
    <?php 

session_start();
// Sprawdź, czy zmienna sesji z nazwą użytkownika istnieje
if(isset($_SESSION['username'])) {
    // Jeśli istnieje, wyświetl nazwę użytkownika
    echo "<p id='powitanie'>Witaj, ".$_SESSION['username']."!</p>";
} else {
    // Jeśli nie istnieje, przekieruj użytkownika z powrotem do strony logowania
    header("Location: Logowanie.php");
    exit;
}
    ?>
 <form action="wyloguj.php" method="post">
        <input type="submit" name="wyloguj" value="Wyloguj" id="wyloguj">
    </form>
    </div>
</body>
</html>