<?php

function contactCount($conn){
    $stmt = $conn->prepare("SELECT contact_count();");
    $stmt->execute();
    $row = $stmt->fetch();
    
    $stmt->closeCursor();
    
    return $row[0];
}