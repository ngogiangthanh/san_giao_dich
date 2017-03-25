<?php

function adminLogin($username, $password, $conn) {
    $stmt = $conn->prepare("call user_login(:username,:password);");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    if ($stmt->rowCount() == 1) {
        $_SESSION['login'] = $stmt->fetch();
        return true;
    }

    $stmt->closeCursor();
    return false;
}

function userCount($conn){
    $stmt = $conn->prepare("SELECT user_count();");
    $stmt->execute();
    $row = $stmt->fetch();
    
    $stmt->closeCursor();
    
    return $row[0];
}
