<?php
function solutionCount($conn){
    $stmt = $conn->prepare("SELECT solution_count();");
    $stmt->execute();
    $row = $stmt->fetch();
    
    $stmt->closeCursor();
    
    return $row[0];
}