<?php

function adminLogin($username, $password, $conn) {
    $stmt = $conn->prepare("call user_login(:username,:password);");
    $stmt->bindParam(':username', $username,PDO::PARAM_STR, 128);
    $stmt->bindParam(':password', $password,PDO::PARAM_STR, 128);
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

function userSelectLastest($conn){
    $stmt = $conn->prepare("call user_select_lastest();");
    $stmt->execute();
    $result = $stmt->fetchAll();
    
    $stmt->closeCursor();
    
    return $result;
}

function userSelect($keys, $offset, $litmit, $conn){
    $stmt = $conn->prepare("call user_select(:keys, :offset, :limit);");
    ($keys == null) ? $stmt->bindValue(':keys', null, PDO::PARAM_NULL) : $stmt->bindParam(':keys', $keys, PDO::PARAM_STR, 128);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindParam(':limit', $litmit, PDO::PARAM_INT);
    
    $stmt->execute();
    $result = $stmt->fetchAll();
    
    $stmt->closeCursor();
    
    return $result;
}
