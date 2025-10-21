<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une destination</title>

<style>
    * {
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(to right, #74ebd5, #ACB6E5);
        margin: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .form-container {
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

    button {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 12px;
        font-size: 16px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #388e3c;
    }
</style>
</head>
<body>
    <div class="form-container">
        <h1>Ajouter une destination</h1>
        <form  class="ajouter_destination "action="create_destination.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="nom" placeholder="Nom" required>
            <textarea name="description" placeholder="Description" required></textarea>
            <input type="text" name="region" placeholder="Région" required>
            <input type="text" name="type" placeholder="Type" required>
            <input type="file" name="image">
            <button type="submit" name="Ajouter_destination">Ajouter</button>
        </form>
    </div>
</body>
</html>
