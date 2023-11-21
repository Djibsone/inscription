<?php include './controllers/getInscrit.php' ?>
<!-- header start -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <title>Affichage</title>
</head>
<body>
  
</body>
</html>
<!-- header end -->

<fieldset>
    <div class="form-group">
        <div class="panel-body">
        <legend><h2>Liste des inscrits</h2></legend>
            <div class="table-responsive">
                <?php include './views/msg_error_success.php' ?>
                <table class="table table-bordered table-full-width">
                    <thead class="">
                        <tr>
                            <th>NOM</th>
                            <th>PRENOM</th>
                            <th>EMAIL</th>
                            <th>SEXE</th>
                            <th>PHOTO</th>
                            <th>DEPARTEMENT</th>
                            <th>LANGAGES INFORMATIQUE</th>
                            <th>DOMAINE D'ACTIVITE</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach($inscrits as $inscrit): ?>

                            <tr>
                                <td><?= $inscrit['nom'] ?></td>
                                <td><?= $inscrit['prenom'] ?></td>
                                <td><?= $inscrit['email'] ?></td>
                                <td><?= $inscrit['sexe'] ?></td>
                                <td><?= $inscrit['photo'] ?></td>
                                <td><?= $inscrit['departement'] ?></td>
                                <td><?= $inscrit['langage'] ?></td>
                                <td><?= $inscrit['domaine'] ?></td>
                                <td>
                                  <a class="btn btn-success"
                                    href="edit_inscrit.php?id=<?= $inscrit['id'] ?>"> 
                                    <span class="fa fa-edit"></span>
                                  </a>

                                  <a onclick="return confirm('Etes vous sûr de vouloir supprimer ce stagiaire')"
                                    href="./controllers/delete_inscrit.php?id=<?= $inscrit['id'] ?>" 
                                    class="btn btn-danger"> 
                                      <span class="fa fa-trash"></span>
                                  </a>
                                </td>
                            </tr>
                            
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <a href="./views/saisie.php"><button class="btn btn-primary">Nouvel inscrit</button></a>    
        </div>
    </div> 
</fieldset>

<!-- footer start -->
<?php include './views/footer.php' ?>
<!-- footer end -->
