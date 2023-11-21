<?php
session_start();
//Connexion à la base de données
function dbConnect(){
    try{
        $db = new PDO('mysql:host=localhost;dbname=db_inscription;charset=utf8', 'djibril', 'tamou');
        return $db;
    }catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
}

//Récupérer tous les candidats
function getAllInscrits(){
    $db = dbConnect();

    $req = $db->query('SELECT * FROM inscription ORDER BY id DESC');
    $req->execute();
    return $req;
}


//Récupérer un candidat
function getInscrit($id){
    $db = dbConnect();

    $req = $db->prepare('SELECT * FROM inscription WHERE id = ?');
    $req->execute(array($id));
    return $req;
}

//Récupérer un candidat
function getInscritEmail($email){
    $db = dbConnect();

    $req = $db->prepare('SELECT * FROM inscription WHERE email = ?');
    $req->execute(array($email));
    return $req;
}

//Ajouter un candidat
function addInscrit($nom, $prenom, $email, $sexe, $nom_photo, $departement, $langage, $domaine){
    $db = dbConnect();

    $req = $db->prepare('INSERT INTO inscription VALUES(NULL,?,?,?,?,?,?,?,?)');

    if($req->execute(array($nom, $prenom, $email, $sexe, $nom_photo, $departement, $langage, $domaine)))
        return true;
    else
        return false;
}

//Supprimer l'nfos user dans la table password_reset
function delInscrit($id){
    $db = dbConnect();

    $req = $db->prepare('DELETE FROM inscription WHERE id = ?');

    if($req->execute(array($id)))
        return true;
    else
        return false;
}

//Modifier un info user
function updateUser($nom, $prenom, $sexe, $nom_photo, $departement, $langage, $domaine, $id){
    $db = dbConnect();

    $req = $db->prepare('UPDATE inscription SET nom = ?, prenom = ?, sexe = ?, photo = ?, departement = ?, langage = ?, domaine = ? WHERE id = ?');

    if($req->execute(array($nom, $prenom, $sexe, $nom_photo, $departement, $langage, $domaine, $id)))
        return true;
    else
        return false;
}

