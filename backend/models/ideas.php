<?php
function ideaCount($conn){
    $stmt = $conn->prepare("SELECT idea_count();");
    $stmt->execute();
    $row = $stmt->fetch();
    
    $stmt->closeCursor();
    
    return $row[0];
}