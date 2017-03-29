<?php

function adminLogin($username, $password, $conn) {
    $stmt = $conn->prepare("call user_login(:username,:password);");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR, 128);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR, 128);
    $stmt->execute();
    if ($stmt->rowCount() == 1) {
        $_SESSION['login'] = $stmt->fetch();
        return true;
    }

    $stmt->closeCursor();
    return false;
}

function userCount($conn, $keys = null) {
    $stmt = $conn->prepare("SELECT user_count(:keys);");
    ($keys == null) ? $stmt->bindValue(':keys', null, PDO::PARAM_NULL) : $stmt->bindParam(':keys', $keys, PDO::PARAM_STR, 128);
    $stmt->execute();
    $row = $stmt->fetch();

    $stmt->closeCursor();

    return $row[0];
}

function userSelectLastest($conn) {
    $stmt = $conn->prepare("call user_select_lastest();");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);

    $stmt->closeCursor();

    return $result;
}

function userSelect($keys, $offset, $litmit, $conn) {
    $stmt = $conn->prepare("call user_select(:keys, :offset, :limit);");
    ($keys == null) ? $stmt->bindValue(':keys', null, PDO::PARAM_NULL) : $stmt->bindParam(':keys', $keys, PDO::PARAM_STR, 128);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindParam(':limit', $litmit, PDO::PARAM_INT);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);



    $stmt->closeCursor();

    return $result;
}

function userDelete($conn, $id) {
    $stmt = $conn->prepare("call user_delete(:id);");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
}

function userUpdate($conn, $id, $config) {
    $options = array(
        "url_dai_dien" => null,
        "ho_ten" => null,
        "ngay_sinh" => null,
        "gioi_tinh" => null,
        "dia_chi" => null,
        "email" => null,
        "sdt" => null,
        "tk" => null,
        "mk" => null,
        "mk_goc" => null,
        "quyen_han" => null,
        "trang_thai" => null,
        "cau_noi" => null);
    $options = array_merge($options, $config);
    $stmt = $conn->prepare("call user_update(:id,:url_dai_dien,:ngay_sinh, :ho_ten ,:gioi_tinh ,:dia_chi ,:email ,:sdt ,:tk ,:mk, :mk_goc ,:quyen_han ,:trang_thai,:cau_noi);");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    ($options['url_dai_dien'] == null) ? $stmt->bindValue(':url_dai_dien', null, PDO::PARAM_NULL) : $stmt->bindParam(':url_dai_dien', $options['url_dai_dien'], PDO::PARAM_STR, 200);
    ($options['ngay_sinh'] == null) ? $stmt->bindValue(':ngay_sinh', null, PDO::PARAM_NULL) : $stmt->bindParam(':ngay_sinh', $options['ngay_sinh'], PDO::PARAM_STR, 10);
    ($options['ho_ten'] == null) ? $stmt->bindValue(':ho_ten', null, PDO::PARAM_NULL) : $stmt->bindParam(':ho_ten', $options['ho_ten'], PDO::PARAM_STR, 200);
    ($options['gioi_tinh'] == null) ? $stmt->bindValue(':gioi_tinh', null, PDO::PARAM_NULL) : $stmt->bindParam(':gioi_tinh', $options['gioi_tinh'], PDO::PARAM_INT, 4);
    ($options['dia_chi'] == null) ? $stmt->bindValue(':dia_chi', null, PDO::PARAM_NULL) : $stmt->bindParam(':dia_chi', $options['dia_chi'], PDO::PARAM_STR, 200);
    ($options['email'] == null) ? $stmt->bindValue(':email', null, PDO::PARAM_NULL) : $stmt->bindParam(':email', $options['email'], PDO::PARAM_STR, 256);
    ($options['sdt'] == null) ? $stmt->bindValue(':sdt', null, PDO::PARAM_NULL) : $stmt->bindParam(':sdt', $options['sdt'], PDO::PARAM_STR, 20);
    ($options['tk'] == null) ? $stmt->bindValue(':tk', null, PDO::PARAM_NULL) : $stmt->bindParam(':tk', $options['tk'], PDO::PARAM_STR, 128);
    ($options['mk'] == null) ? $stmt->bindValue(':mk', null, PDO::PARAM_NULL) : $stmt->bindParam(':mk', $options['mk'], PDO::PARAM_STR, 128);
    ($options['mk_goc'] == null) ? $stmt->bindValue(':mk_goc', null, PDO::PARAM_NULL) : $stmt->bindParam(':mk_goc', $options['mk_goc'], PDO::PARAM_STR, 128);
    ($options['quyen_han'] == null) ? $stmt->bindValue(':quyen_han', null, PDO::PARAM_NULL) : $stmt->bindParam(':quyen_han', $options['quyen_han'], PDO::PARAM_INT, 4);
    ($options['trang_thai'] == null) ? $stmt->bindValue(':trang_thai', null, PDO::PARAM_NULL) : $stmt->bindParam(':trang_thai', $options['trang_thai'], PDO::PARAM_INT, 4);
    ($options['cau_noi'] == null) ? $stmt->bindValue(':cau_noi', null, PDO::PARAM_NULL) : $stmt->bindParam(':cau_noi', $options['cau_noi'], PDO::PARAM_STR, 1024);

    return $stmt->execute();
}

function userInsert($conn, $config) {
    $options = array(
        "url_dai_dien" => null,
        "ho_ten" => null,
        "ngay_sinh" => null,
        "gioi_tinh" => null,
        "dia_chi" => null,
        "email" => null,
        "sdt" => null,
        "tk" => null,
        "mk" => null,
        "mk_goc" => null,
        "quyen_han" => null,
        "trang_thai" => null,
        "cau_noi" => null);

    $options = array_merge($options, $config);
    $stmt = $conn->prepare("call user_insert(:url_dai_dien,:ngay_sinh, :ho_ten ,:gioi_tinh ,:dia_chi ,:email ,:sdt ,:tk ,:mk, :mk_goc ,:quyen_han ,:trang_thai,:cau_noi);");

    ($options['url_dai_dien'] == null) ? $stmt->bindValue(':url_dai_dien', null, PDO::PARAM_NULL) : $stmt->bindParam(':url_dai_dien', $options['url_dai_dien'], PDO::PARAM_STR, 200);
    ($options['ho_ten'] == null) ? $stmt->bindValue(':ho_ten', null, PDO::PARAM_NULL) : $stmt->bindParam(':ho_ten', $options['ho_ten'], PDO::PARAM_STR, 200);
    $stmt->bindParam(':ngay_sinh', $options['ngay_sinh'], PDO::PARAM_STR, 10);
    $stmt->bindParam(':gioi_tinh', $options['gioi_tinh'], PDO::PARAM_INT, 4);
    $stmt->bindParam(':dia_chi', $options['dia_chi'], PDO::PARAM_STR, 200);
    $stmt->bindParam(':email', $options['email'], PDO::PARAM_STR, 256);
    $stmt->bindParam(':sdt', $options['sdt'], PDO::PARAM_STR, 20);
    $stmt->bindParam(':tk', $options['tk'], PDO::PARAM_STR, 128);
    $stmt->bindParam(':mk', $options['mk'], PDO::PARAM_STR, 128);
    $stmt->bindParam(':mk_goc', $options['mk_goc'], PDO::PARAM_STR, 128);
    $stmt->bindParam(':quyen_han', $options['quyen_han'], PDO::PARAM_INT, 4);
    $stmt->bindParam(':trang_thai', $options['trang_thai'], PDO::PARAM_INT, 4);
    $stmt->bindParam(':cau_noi', $options['cau_noi'], PDO::PARAM_STR, 1024);

    return $stmt->execute();
}
