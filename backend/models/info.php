<?php

function infoSelect($conn, $loai_tt){
    $stmt = $conn->prepare("call info_select(:loai_tt);");
    ($loai_tt == null) ? $stmt->bindValue(':loai_tt', null, PDO::PARAM_NULL) : $stmt->bindParam(':loai_tt', $loai_tt, PDO::PARAM_INT, 4);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    
    $stmt->closeCursor();

    return $result[0];
}

function  infoUpdate($conn, $id, $data){
    $options = array(
        "noi_dung" => null,
        "id_user" => null);
    $options = array_merge($options, $data);
    $stmt = $conn->prepare("call info_update(:id,:noi_dung,:id_user);");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':noi_dung', $options['noi_dung'], PDO::PARAM_STR);
    $stmt->bindParam(':id_user', $options['id_user'], PDO::PARAM_INT);
    
    return $stmt->execute();
}