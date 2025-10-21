<?php
session_start();
include "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM utilisateurs WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['mot_de_passe'])) {
        $_SESSION['user'] = $user;

        if ($user['role'] === 'admin') {
            header("Location: admin_destinations.php");
            exit;
        } else {
            header("Location: index.php"); 
            exit;
        }
    } else {
        $error = "❌ Identifiants incorrects.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <style>
        body {
             font-family: Arial,sans-serif; 
             display:flex; 
             justify-content:center; 
             align-items:center; 
             height:100vh; 
             background:#f4f4f4; 
            }
        .login-box { 
            background:white;
             padding:20px; 
             border-radius:8px; 
             box-shadow:0 4px 8px rgba(0,0,0,0.2); width:300px; }
        h2 { 
            text-align:center; 
            color:#006233; 
        }
        input {
             width:100%; 
            padding:10px; 
            margin:10px 0; 
            border:1px solid #ccc; 
            border-radius:4px; 
        }
        button { width:100%;
             padding:10px; 
             background:#006233;
              color:white;
               border:none;
                border-radius:4px; cursor:pointer; }
        button:hover {
             background:#004d26; 
            }
        .error { color:red;
             text-align:center; 
            }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Connexion</h2>
        <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="POST">
            <input type="email" name="email" placeholder="Votre email" required>
            <input type="password" name="password" placeholder="Votre mot de passe" required>
            <button type="submit">Se connecter</button>
        </form>
    </div>
</body>
</html>
