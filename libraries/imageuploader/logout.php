<?php
session_start();
if(!isset($_SESSION['login'])) {
    exit;
}

session_destroy();
echo "<script>location.href='admin.php'</script>";
