<?php
include 'config.php';


if (!isset($_GET['id']) && !isset($_POST['id'])) {
    die("ID de la destination non fourni.");
}
$id = isset($_GET['id']) ? $_GET['id'] : $_POST['id'];

$sql = "SELECT * FROM destinations WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$destination = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$destination) {
    die("Destination introuvable.");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une destination</title>
<style>
    * {
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(to right, #FFDEE9, #B5FFFC);
        margin: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    form.modifier-destination {
        background-color: white;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        width: 100%;
        max-width: 500px;
        max-height: 80vh;
        overflow-y: auto;
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
        font-size: 24px;
        color: #333;
    }

    label {
        display: block;
        margin-bottom: 6px;
        font-weight: 500;
        color: #333;
    }

    input[type="text"],
    textarea,
    input[type="file"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 15px;
    }

    textarea {
        resize: vertical;
        min-height: 80px;
    }

    img {
        display: block;
        margin-bottom: 15px;
        border-radius: 8px;
        max-width: 100%;
        height: auto;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    button {
        width: 100%;
        background-color: #007BFF;
        color: white;
        padding: 12px;
        font-size: 16px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>
    <form class="modifier-destination" action="update_destination.php" method="POST" enctype="multipart/form-data">
        <h1>Modifier une destination</h1>
        
        <input type="hidden" name="id" value="<?= $destination['id'] ?>">
        
        <label for="nom">Nom de la destination :</label>
        <input type="text" name="nom" value="<?= htmlspecialchars($destination['nom']) ?>" required>
        
        <label for="description">Description :</label>
        <textarea name="description" required><?= htmlspecialchars($destination['description']) ?></textarea>
        
        <label for="region">Région :</label>
        <input type="text" name="region" value="<?= htmlspecialchars($destination['region']) ?>" required>
        
        <label for="type">Type :</label>
        <input type="text" name="type" value="<?= htmlspecialchars($destination['type']) ?>" required>
        
        <p>Image actuelle :</p>
        <?php if ($destination['image_url']): ?>
            <img src="<?= htmlspecialchars($destination['image_url']) ?>" alt="Image de la destination" width="150">
        <?php endif; ?>
        
        <label for="image">Nouvelle image (laisser vide pour conserver l'actuelle) :</label>
        <input type="file" name="image">
        
        <button type="submit" name="modifier_destination">Modifier</button>
    </form>
</body>
</html>
