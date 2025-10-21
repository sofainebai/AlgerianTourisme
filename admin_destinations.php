<?php
session_start();


if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

include 'config.php';
include 'read.php';

$destinations = getDestination($pdo);

if (isset($_GET['message'])) {
    echo "<div class='alert'>" . htmlspecialchars($_GET['message']) . "</div>";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - Destinations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f7f7;
            margin: 0;
            padding: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            background: #006233;
            color: white;
            padding: 15px 20px;
            border-radius: 8px;
        }
        h1 {
            margin: 0;
        }
        .alert {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #006233;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .btn {
            padding: 6px 12px;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
            text-align: center;
            font-weight: bold;
        }
        .btn-ajouter {
            background-color: #008CBA;
            color: white;
            margin-bottom: 20px;
        }
        .btn-modifier {
            background-color: #4CAF50;
            color: white;
        }
        .btn-supprimer {
            background-color: #f44336;
            color: white;
        }
        .buttons {
            display: flex;
            gap: 10px;
        }
        .logout {
            background: #f44336;
            color: white;
            padding: 8px 12px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
        }
        .logout:hover {
            background: #d32f2f;
        }
    </style>
</head>
<body>
    <!-- En-tête avec bouton déconnexion -->
    <div class="header">
        <h1>Gestion des Destinations Touristiques</h1>
        <a href="logout.php" class="logout">Déconnexion</a>
    </div>

    <!-- Bouton ajouter -->
    <a href="ajouter_destination.php" class="btn btn-ajouter">+ Ajouter une destination</a>

    <!-- Tableau des destinations -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Région</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($destinations as $destination): ?>
            <tr>
                <td><?= $destination['id'] ?></td>
                <td><?= htmlspecialchars($destination['nom']) ?></td>
                <td><?= htmlspecialchars($destination['region']) ?></td>
                <td><?= htmlspecialchars($destination['type']) ?></td>
                <td>
                    <div class="buttons">
                        <!-- Modifier -->
                        <form action="modifier_destination.php" method="post">
                            <input type="hidden" name="id" value="<?= $destination['id'] ?>">
                            <button type="submit" class="btn btn-modifier">Modifier</button>
                        </form>
                        <!-- Supprimer -->
                        <form action="delete_destination.php" method="post">
                            <input type="hidden" name="id" value="<?= $destination['id'] ?>">
                            <button type="submit" class="btn btn-supprimer" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
