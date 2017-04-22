<?php

function contactCount($keys, $trang_thai, $da_xem, $quan_trong, $spam, $rac, $conn){
    $stmt = $conn->prepare("SELECT contact_count(:keys, :trang_thai, :da_xem, :quan_trong, :spam, :rac);");
    
    ($keys == null) ? $stmt->bindValue(':keys', null, PDO::PARAM_NULL) : $stmt->bindParam(':keys', $keys, PDO::PARAM_STR, 256);
    ($trang_thai == null) ? $stmt->bindValue(':trang_thai', null, PDO::PARAM_NULL) : $stmt->bindParam(':trang_thai', $trang_thai, PDO::PARAM_INT, 4);
    ($da_xem == null) ? $stmt->bindValue(':da_xem', null, PDO::PARAM_NULL) : $stmt->bindParam(':da_xem', $da_xem, PDO::PARAM_INT, 4);
    ($quan_trong == null) ? $stmt->bindValue(':quan_trong', null, PDO::PARAM_NULL) : $stmt->bindParam(':quan_trong', $quan_trong, PDO::PARAM_INT, 4);
    ($spam == null) ? $stmt->bindValue(':spam', null, PDO::PARAM_NULL) : $stmt->bindParam(':spam', $spam, PDO::PARAM_INT, 4);
    ($rac == null) ? $stmt->bindValue(':rac', null, PDO::PARAM_NULL) : $stmt->bindParam(':rac', $rac, PDO::PARAM_INT, 4);
    $stmt->execute();
    $row = $stmt->fetch();
    
    $stmt->closeCursor();
    
    return $row[0];
}

function contactSelect($keys, $trang_thai, $da_xem, $quan_trong, $spam, $rac, $offset, $litmit, $conn) {
    $stmt = $conn->prepare("call contact_select(:keys, :trang_thai, :da_xem, :quan_trong, :spam, :rac, :offset, :limit);");
    ($keys == null) ? $stmt->bindValue(':keys', null, PDO::PARAM_NULL) : $stmt->bindParam(':keys', $keys, PDO::PARAM_STR, 256);
    ($trang_thai == null) ? $stmt->bindValue(':trang_thai', null, PDO::PARAM_NULL) : $stmt->bindParam(':trang_thai', $trang_thai, PDO::PARAM_INT, 4);
    ($da_xem == null) ? $stmt->bindValue(':da_xem', null, PDO::PARAM_NULL) : $stmt->bindParam(':da_xem', $da_xem, PDO::PARAM_INT, 4);
    ($quan_trong == null) ? $stmt->bindValue(':quan_trong', null, PDO::PARAM_NULL) : $stmt->bindParam(':quan_trong', $quan_trong, PDO::PARAM_INT, 4);
    ($spam == null) ? $stmt->bindValue(':spam', null, PDO::PARAM_NULL) : $stmt->bindParam(':spam', $spam, PDO::PARAM_INT);
    ($rac == null) ? $stmt->bindValue(':rac', null, PDO::PARAM_NULL) : $stmt->bindParam(':rac', $rac, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindParam(':limit', $litmit, PDO::PARAM_INT);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);

    $stmt->closeCursor();

    return $result;
}

function contactSelectbyId($id, $conn) {
    $stmt = $conn->prepare("call contact_select_one(:id);");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT,11);

    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_OBJ);

    $stmt->closeCursor();

    return $row;
}

function contactUpdate($conn, $id, $config){
    $options = array(
        "id_phan_hoi" => null,
        "ho_ten" => null,
        "tieu_de" => null,
        "email" => null,
        "du_lieu_lien_he" => null,
        "trang_thai" => null,
        "da_xem" => null,
        "quan_trong" => null,
        "spam" => null,
        "rac" => null);
    
    $options = array_merge($options, $config);
    $stmt = $conn->prepare("call contact_update(:id, :id_phan_hoi, :ho_ten, :tieu_de, :email, :du_lieu_lien_he, :trang_thai, :da_xem, :quan_trong, :spam, :rac);");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    ($options['id_phan_hoi'] == null) ? $stmt->bindValue(':id_phan_hoi', null, PDO::PARAM_NULL) : $stmt->bindParam(':id_phan_hoi', $options['id_phan_hoi'], PDO::PARAM_INT);
    ($options['ho_ten'] == null) ? $stmt->bindValue(':ho_ten', null, PDO::PARAM_NULL) : $stmt->bindParam(':ho_ten', $options['ho_ten'], PDO::PARAM_STR, 200);
    ($options['tieu_de'] == null) ? $stmt->bindValue(':tieu_de', null, PDO::PARAM_NULL) : $stmt->bindParam(':tieu_de', $options['tieu_de'], PDO::PARAM_STR, 256);
    ($options['email'] == null) ? $stmt->bindValue(':email', null, PDO::PARAM_NULL) : $stmt->bindParam(':email', $options['email'], PDO::PARAM_STR, 256);
    ($options['du_lieu_lien_he'] == null) ? $stmt->bindValue(':du_lieu_lien_he', null, PDO::PARAM_NULL) : $stmt->bindParam(':du_lieu_lien_he', $options['du_lieu_lien_he'], PDO::PARAM_STR, 128);
    ($options['trang_thai'] == null) ? $stmt->bindValue(':trang_thai', null, PDO::PARAM_NULL) : $stmt->bindParam(':trang_thai', $options['trang_thai'], PDO::PARAM_INT, 4);
    ($options['da_xem'] == null) ? $stmt->bindValue(':da_xem', null, PDO::PARAM_NULL) : $stmt->bindParam(':da_xem', $options['da_xem'], PDO::PARAM_INT, 4);
    ($options['quan_trong'] == null) ? $stmt->bindValue(':quan_trong', null, PDO::PARAM_NULL) : $stmt->bindParam(':quan_trong', $options['quan_trong'], PDO::PARAM_INT, 4);
    ($options['spam'] == null) ? $stmt->bindValue(':spam', null, PDO::PARAM_NULL) : $stmt->bindParam(':spam', $options['spam'], PDO::PARAM_INT);
    ($options['rac'] == null) ? $stmt->bindValue(':rac', null, PDO::PARAM_NULL) : $stmt->bindParam(':rac', $options['rac'], PDO::PARAM_INT);
    
    return $stmt->execute();
}