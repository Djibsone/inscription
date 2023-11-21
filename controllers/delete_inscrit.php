<?php
    require_once('../models/connexion.php');

    if (isset($_GET['id'])) {
        
        if (!empty($_GET['id'])) {

            $id = $_GET['id'];
            $stmt = delInscrit($id);

            ($stmt) ? $_SESSION['success'] = 'Suppression effectuée avec succès' 
            : $_SESSION['error'] = 'Erreur de suppression';
        
        } else {
            $_SESSION['error'] = 'Selectionnez l\'element';
        }

        header('location:../');
    }

    