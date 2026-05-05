
<?php
session_start();
session_unset();
session_destroy();

// prevent caching
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Pragma: no-cache");

header("Location: ../login/login.php");
exit();
?>