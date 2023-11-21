<?php
require_once('../models/connexion.php');

if (isset($_POST['envoie'])) {

    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['departement']) && !empty($_POST['langage'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $sexe = htmlspecialchars($_POST['sexe']);
        $departement = htmlspecialchars($_POST['departement']);
        $langage = htmlspecialchars($_POST['langage']);
        $domaine = htmlspecialchars($_POST['domaine']);

        if(isset($_FILES['photo'])) {
            $nom_photo= $_FILES['photo']['name'];
            $image_tmp=$_FILES['photo']['tmp_name'];
            move_uploaded_file($image_tmp,'../images/'.$nom_photo);
        }
        else {
            $nom_photo = NULL;
        }

        $check = getInscrit($email);
        $row = $check->rowCount();

        if ($row) {
            $_SESSION['error'] = 'Error, veuillez ressayer';
        } else {
            $stmt = addInscrit($nom, $prenom, $email, $sexe, $nom_photo, $departement, $langage, $domaine);
            ($stmt) ? $_SESSION['success'] = 'Enregistrment effectué avec succès' : $_SESSION['error'] = 'Erreur d\'enregistrement';
        }
        
    } else {
        $_SESSION['error'] = 'Veuillez remplir les champs';
    }
    
    header('Location: ../views/saisie.php');

}