<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'visiteur') {
    header("Location: login.php");
    exit;
}
include "config.php";
$region = $_GET['nom'] ?? 'Nord';
$sql = "SELECT * FROM destinations WHERE region = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$region]);
$wilayas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Région <?= htmlspecialchars($region) ?></title>
    <style>
        body { font-family: Arial, sans-serif; 
            background: #f9f9f9; 
        }
        .container { 
            max-width: 900px;
             margin: auto; 
             padding: 20px;
             }
        h1 { text-align: center;
             color: #006233; margin-bottom: 30px; 
            }
        .card { background: white; 
            border-radius: 8px;
             padding: 15px; margin-bottom: 20px;
              box-shadow: 0 4px 6px rgba(0,0,0,0.1); 
            }
        .card img { width: 100%; 
            height: 200px;
             object-fit: cover; 
             border-radius: 8px; 
            }
        .card h3 { margin: 10px 0;
             color: #006233; 
            }
    </style>
</head>
<body>
    <div class="container">
        <h1>Wilayas de la région <?= htmlspecialchars($region) ?></h1>

        <?php if (count($wilayas) > 0): ?>
        <?php foreach ($wilayas as $w): ?>
            <div class="card">
         <?php if (!empty($w['image_url'])): ?>
            <img src="<?= htmlspecialchars($w['image_url']) ?>" alt="<?= htmlspecialchars($w['nom']) ?>">
              <?php endif; ?>
             <h3><?= htmlspecialchars($w['nom']) ?></h3>
            <p><?= htmlspecialchars($w['description']) ?></p>
             </div>
        <?php endforeach; ?>
        <?php else: ?>
        <p>Aucune wilaya trouvée pour cette région.</p>
        <?php endif; ?>
    </div>
</body>
</html>
