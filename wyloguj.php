<?php
// Rozpocznij sesję
session_start();

// Zakończ sesję
session_unset();
session_destroy();

// Przekieruj użytkownika na stronę logowania
header("Location: Logowanie.php");
exit;
?>
