<?php
include 'config.php';

function getDestination($pdo){
    $sql = "SELECT * FROM destinations ORDER BY created_at DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
