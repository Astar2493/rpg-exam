<?php 

require('models/db_connect.php');
require('models/class.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $className = $_POST['name'];
    if(!empty($className)){
        addClass($className);
        header("location: http://localhost/rpg-exam/index.php?page=admin/class/dashboard");
    }
}


?>

<section id="form-add">
    <h1>Ajouter votre nouvelle classe</h1>
    <form action="" method="post" class="add-class-form">
        <label for="name">Nom de la classe</label>
        <input type="text" name="name" id="name" placeholder="Entrez le nom de la classe" required>
        <input type="submit" value="Enregistrer" class="btn-add">
    </form>
</section>
