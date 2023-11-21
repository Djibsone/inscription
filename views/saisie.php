<?php session_start() ?>

<?php include './header.php' ?>

<fieldset>
  <legend><h2>Formulaire d'inscription</h2></legend>
  <div class="form-group">
      <?php
      if (isset($_SESSION['success'])): ?>
          <div class="msg">
            <?php 
                echo $_SESSION['success']; 
                unset($_SESSION['success']);
            ?>
          </div>
      <?php endif ?>
      <?php if (isset($_SESSION['error'])): ?>
          <div class="err">
            <?php
                echo $_SESSION['error']; 
                unset($_SESSION['error']);
            ?>
          </div>
      <?php endif ?>
  </div>
  <form action="../controllers/saisie.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="nom">Nom :</label>
      <input type="text" name="nom">
    </div>
    
    <div class="form-group">
      <label for="prenom">Prénom :</label>
      <input type="text" name="prenom">
    </div>
    
    <div class="form-group">
      <label for="email">Email :</label>
      <input type="email" name="email">
    </div>
    
    <div class="form-group">
      <label for="sexe">Sexe :</label>
      <input type="radio" value="M" name="sexe"> Masculin
      <input type="radio" value="F" name="sexe"> Féminnin
    </div>

    <div class="form-group">
      <label for="photo">Photo :</label>
      <input type="file" name="photo">
    </div>
    
    <div class="form-group">
      <label for="">Département</label>
      <select name="departement">
        <option>Veuillez choisir votre département :</option>
        <option value="SIL">Système Informatique et Logiciel</option>
        <option value="BFA">Banque Finance et Assurance</option>
        <option value="CBG">Comptabilité Banque et Gestion</option>
      </select>
    </div>

    <div class="form-group">
      <label for="">Langages informatiques :</label>
      <select name="langage">
        <option>Veuillez choisir le langage</option>
        <option>C++</option>
        <option>PHP</option>
        <option>JavaScript</option>
        <option>HTML</option>
        <option>CSS</option>
        <option>PYTHON</option>
      </select>
    </div>
    
    <div class="form-group">
      <label for="domaine">Domaine d'activités :</label>
      <input type="checkbox" value="Informatique" name="domaine"> Informatique
      <input type="checkbox" value="Gestion" name="domaine"> Gestion
      <input type="checkbox" value="Pédagogie" name="domaine"> Pédagogie
    </div>

    <div class="form-group">
      <button type="submit" name="envoie">Envoyer</button>
      <button type="reset">Annuler</button>
    </div>
  </form>

</fieldset>

<?php include './footer.php' ?>