<?php
include 'config.php';
   $id = $_POST['id'];
     
    $sql="SELECT image_url FROM destinations WHERE id= ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $image_url = $stmt->fetchColumn();
    if($image_url && file_exists($image_url)){
        unlink($image_url);
    }
    $sql = "DELETE FROM destinations WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    header('Location: admin_destinations.php?message=Destination supprimée avec succés');
    exit;

?>