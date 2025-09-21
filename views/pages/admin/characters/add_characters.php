<?php 

require('models/db_connect.php');
require('models/characters.php');
require('models/class.php');

$classes = fetchClasses();



if($_SERVER['REQUEST_METHOD'] == "POST"){
    $characterName = $_POST['name'];
    $classId = $_POST['class_id'];
    if(!empty($characterName)){
        addCharacter($characterName, $classId);
        header("location: http://localhost/rpg-exam/index.php?page=admin/characters/dashboard");
    }
}


?>

<section id="form-add">
    <h1>Ajouter un nouveau personnage</h1>
    <form method="post" class="add-character-form">
        <label for="name">Nom du personnage</label>
        <input type="text" name="name" id="name" placeholder="Entrez le nom du personnage" required>

        <label for="class_id">Classe</label>
        <select name="class_id" id="class_id" required>
            <?php foreach($classes as $class){ ?>
                <option value="<?= $class['id']; ?>"><?= $class['name']; ?></option>
            <?php }; ?>
        </select>

        <button type="submit" class="btn-add">Créer</button>
    </form>
</section>




</section>
