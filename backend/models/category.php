<?php

function categorySelect($conn) {
    $stmt = $conn->prepare("call category_select();");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    $stmt->closeCursor();

    return $result;
}