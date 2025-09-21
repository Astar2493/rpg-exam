<?php 

require('models/db_connect.php');
require('models/characters.php');
require('models/class.php');

$character = fetchCharacter($_GET['characterId']);
$classes = fetchClasses();


if($_SERVER['REQUEST_METHOD'] == "POST"){
    $characterName = $_POST['name'];
    if(!empty($characterName)){
        editCharacter($characterName, $_GET['characterId']);
        header("location: http://localhost/rpg-exam/index.php?page=admin/characters/dashboard");
    }
}

?>

<section id="form-edit">
    <h1>Éditer le personnage <?= $character['name'] ?></h1>

    <form action="" method="post" class="edit-character-form">
        <label for="name">Nom du personnage</label>
        <input type="text" name="name" id="name" value="<?= $character['name'] ?>" required>
        <label for="class_id">Classe</label>
        <select name="class_id" id="class_id" required>
            <?php foreach($classes as $class){ ?>
                <option value="<?= $class['id']; ?>" <?php if($class['id'] == $character['id_class']){echo "Selected";} ?>><?= $class['name']; ?></option>
            <?php }; ?>
        </select>
        <input type="submit" value="Mettre à jour" class="btn-update">
    </form>
</section>
