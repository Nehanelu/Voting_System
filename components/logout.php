<?php
session_start();
session_destroy();
header('Location: ../'); // Corrected the header function syntax
exit(); // Ensure the script stops executing after the redirect
?>
