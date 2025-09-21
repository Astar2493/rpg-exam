<?php 

require('models/db_connect.php');
require('models/class.php');

$class = fetchClass($_GET['classId']);

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $className = $_POST['name'];
    if(!empty($className)){
        editClass($className, $_GET['classId']);
        header("location: http://localhost/rpg-exam/index.php?page=admin/class/dashboard");
    }
}

?>

<section id="form-edit">
    <h1>Éditer la classe <?= $class['name'] ?></h1>

    <form action="" method="post" class="edit-class-form">
        <label for="name">Nom de la classe</label>
        <input type="text" name="name" id="name" value="<?= $class['name'] ?>" required>
        <input type="submit" value="Mettre à jour" class="btn-update">
    </form>
</section>
