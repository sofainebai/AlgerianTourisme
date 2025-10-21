<?php
include 'config.php';

if($_SERVER['REQUEST_METHOD']==='POST'&&isset($_POST['Ajouter_destination'])){
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $region = $_POST['region'];
    $type = $_POST['type'];
    //gestion de l'upload
    $image_url='';
    if(isset($_FILES['image'])&& $_FILES['image']['error'] === UPLOAD_ERR_OK){
        $uploadDIR = 'uploads/';
        $filename = uniqid() . '_' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['temp_name'],$uploadDIR . $fileName);
        $image_url = $uploadDIR . $fileName;

    }
     $sql ="INSERT INTO destinations (nom,description,region,type,image_url)
    VALUES(?,?,?,?,?)";
    $stmt=$pdo->prepare($sql);
    $stmt->execute([$nom,$description,$region,$type,$image_url]);
    header('Location: admin_destinations.php?message=Destination ajoutée avec succés');
    exit;
}