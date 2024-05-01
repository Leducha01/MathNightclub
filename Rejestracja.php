<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Nightclub</title>
    <link rel="stylesheet" type="text/css" href="css/all1.css">
    <link rel="stylesheet" type="text/css" href="css/rejestracja.css">

    <link href="https://fonts.cdnfonts.com/css/codec-pro" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <style>
        @import url('https://fonts.cdnfonts.com/css/codec-pro');
    </style>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <div id="main">
        <div id="logowanieContainer">
            <div id="logowanie">
                <div id="headerDiv"><h1 id="logowanieHeader">Rejestracja</h1></div>
                <div id="formDiv">
                <form id="loginForm" method="Post">
                    <span class="labelInput">Nazwa użytkownika</span><br>
                    <input class="input" type="text" name="nazwa" id="nazwa" placeholder="Podaj nazwę użytkownika">
                    <span class="labelInput">E-mail</span><br>
                    <input class="input" type="text" name="email" id="email" placeholder="Podaj e-mail">
                    <span class="labelInput">Hasło</span><br>
                    <input class="input" type="password" name="haslo" id="haslo" placeholder="Podaj hasło">
                    <span class="labelInput">Powtórz hasło</span><br>
                    <input class="input" type="password" name="haslo2" placeholder="Powtórz hasło">
                    <?php
$conn = mysqli_connect("localhost", "root", "", "math");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nazwa = $_POST['nazwa'];
    $email = $_POST['email'];
    $haslo = $_POST['haslo'];
    $haslo2 = $_POST['haslo2'];

    if (empty($nazwa) || empty($email) || empty($haslo) || empty($haslo2)) {
        echo "<br><p class='komunikat'>Musisz wypełnić wszystkie pola</p>";
    } else {
        // Sprawdzenie, czy hasło ma co najmniej 8 znaków
        if (strlen($haslo) < 8) {
            echo "<br><p class='komunikat'>Hasło musi mieć co najmniej 8 znaków</p>";
        } elseif (!preg_match('/[A-Z]/', $haslo)) {
            echo "<br><p class='komunikat'>Hasło musi zawierać co najmniej jedną dużą literę</p>";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<br><p class='komunikat'>Podany adres email jest nieprawidłowy</p>";
        } elseif (!isset($_POST['termscheckbox']) || $_POST['termscheckbox'] !== 'on') {
            echo "<br><p class='komunikat'>Musisz zaakceptować regulamin, aby kontynuować</p>";
        } elseif ($haslo != $haslo2) {
            echo "<br><p class='komunikat'>Hasła nie są takie same</p>";
        } else {
            // Sprawdzenie, czy użytkownik o podanej nazwie już istnieje w bazie danych
            $query = "SELECT * FROM users WHERE nazwa = '$nazwa'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                echo "<br><p class='komunikat'>Użytkownik o podanej nazwie już istnieje</p>";
            } else {
                // Kod dotyczący dodawania użytkownika do bazy danych
                $sql = "INSERT INTO `users` (idUzytkownika, nazwa, email, haslo) VALUES (NULL, '$nazwa', '$email', '$haslo')";
                mysqli_query($conn, $sql);
                header("Location: Useradd.html");
            }
        }
    }
}
?>
                    <br>
                    <table><tr><td><input type="checkbox" name="termscheckbox" id="termchcheckbox"></td><td><p>Zapoznałem się z regulaminem</p></td></tr>
</table>
                    <div id="RegisterBtnDiv"><input type="submit" name="zaloguj" class="RegisterBtn" value="Dołącz do nas"></div>
                    <div id="powrot"><p><a href="logowanie.php" id="rejestracja">Powrót do logowania</a></p></div>
                    
                  
                   

                </form>
           </div>
            </div>
        </div>
    </div>
</body>

</html>