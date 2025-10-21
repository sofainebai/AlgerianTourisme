<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['modifier_destination'])) {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $region = $_POST['region'];
    $type = $_POST['type'];
  if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        $fileName = uniqid() . '_' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $fileName);
        $image_url = $uploadDir . $fileName;
     $sql = "SELECT image_url FROM destinations WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $oldImage = $stmt->fetchColumn();
        if ($oldImage && file_exists($oldImage)) {
            unlink($oldImage);

        }

        $sql = "UPDATE destinations SET nom = ?, description = ?, region = ?, type = ?, image_url = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nom, $description, $region, $type, $image_url, $id]);
    } else {
        $sql = "UPDATE destinations SET nom = ?, description = ?, region = ?, type = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nom, $description, $region, $type, $id]);
    }

    header('Location: admin_destinations.php?message=Destination modifiée avec succès');
    exit;
}
?>