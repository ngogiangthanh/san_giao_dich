<?php

function contactCount($keys, $trang_thai, $da_xem, $quan_trong, $conn){
    $stmt = $conn->prepare("SELECT contact_count(:keys, :trang_thai, :da_xem, :quan_trong);");
    
    ($keys == null) ? $stmt->bindValue(':keys', null, PDO::PARAM_NULL) : $stmt->bindParam(':keys', $keys, PDO::PARAM_STR, 256);
    ($trang_thai == null) ? $stmt->bindValue(':trang_thai', null, PDO::PARAM_NULL) : $stmt->bindParam(':trang_thai', $trang_thai, PDO::PARAM_INT, 4);
    ($da_xem == null) ? $stmt->bindValue(':da_xem', null, PDO::PARAM_NULL) : $stmt->bindParam(':da_xem', $da_xem, PDO::PARAM_BOOL);
    ($quan_trong == null) ? $stmt->bindValue(':quan_trong', null, PDO::PARAM_NULL) : $stmt->bindParam(':quan_trong', $quan_trong, PDO::PARAM_BOOL);
    
    $stmt->execute();
    $row = $stmt->fetch();
    
    $stmt->closeCursor();
    
    return $row[0];
}

function contactSelect($keys, $trang_thai, $da_xem, $quan_trong, $offset, $litmit, $conn) {
    $stmt = $conn->prepare("call contact_select(:keys, :trang_thai, :da_xem, :quan_trong, :offset, :limit);");
    ($keys == null) ? $stmt->bindValue(':keys', null, PDO::PARAM_NULL) : $stmt->bindParam(':keys', $keys, PDO::PARAM_STR, 256);
    ($trang_thai == null) ? $stmt->bindValue(':trang_thai', null, PDO::PARAM_NULL) : $stmt->bindParam(':trang_thai', $trang_thai, PDO::PARAM_INT, 4);
    ($da_xem == null) ? $stmt->bindValue(':da_xem', null, PDO::PARAM_NULL) : $stmt->bindParam(':da_xem', $da_xem, PDO::PARAM_BOOL);
    ($quan_trong == null) ? $stmt->bindValue(':quan_trong', null, PDO::PARAM_NULL) : $stmt->bindParam(':quan_trong', $quan_trong, PDO::PARAM_BOOL);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindParam(':limit', $litmit, PDO::PARAM_INT);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);

    $stmt->closeCursor();

    return $result;
}