

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Nightclub</title>
    <link rel="stylesheet" type="text/css" href="css/all1.css">
    <link rel="stylesheet" type="text/css" href="css/logowanie.css">

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
                <div id="headerDiv"><h1 id="logowanieHeader">Logowanie</h1></div>
                <div id="formDiv">
                <form id="loginForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <span class="labelInput">Nazwa użytkownika</span><br>
                    <input class="input" type="text" name="username" placeholder="Podaj nazwę użytkownika">
                    <span class="labelInput">Hasło</span><br>
                    <input class="input" type="password" name="password" placeholder="Podaj hasło">
                    <?php
$conn = mysqli_connect("localhost", "root", "", "math");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Sprawdzenie, czy pola nie są puste
    if (empty($username) || empty($password)) {
        echo "<p class='komunikat'>Musisz wprowadzić nazwę użytkownika i hasło</p>";
    } else {
        // Zabezpieczenie przed atakami SQL Injection
        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);

        // Sprawdzenie, czy użytkownik o podanej nazwie i haśle istnieje w bazie danych
        $query = "SELECT * FROM users WHERE nazwa = '$username' AND haslo = '$password'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            // Utwórz sesję i zapisz w niej nazwę użytkownika
            session_start();
            $_SESSION['username'] = $username;
            // Przekieruj użytkownika na stronę powitalną
            header("Location: mainPanel.php");
            exit;
        } else {
            // Jeśli użytkownik nie istnieje, wyświetl komunikat o błędnych danych logowania
            echo "<p class='komunikat'>Nieprawidłowa nazwa użytkownika lub hasło</p>";
        }
    }
}
?>
                    <br><a href="resetHasla.html" id="pswdReset">Zapomniałeś hasła?</a>
                    <div id="loginBtnDiv"><input type="submit" name="zaloguj" class="loginBtn" value="Zaloguj"></div>
                    <p>Nie masz jeszcze konta?&emsp;<a href="rejestracja.php" id="rejestracja">Zarejestruj się!</a></p>
                    <br><br><br><br><br><a href="stronaGlowna.html" id="backtoLogin">Powrót na stronę główną</a>
                </form>
           </div>
            </div>
        </div>
    </div>
</body>

</html>
