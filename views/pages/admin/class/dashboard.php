<?php

require('models/db_connect.php');
require('models/characters.php');
require('models/class.php');

$alert = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $forceDelete = $_POST['force_delete'];
    if (!empty($id)) {
        $characters = fetchClassCharacters($id);
        if (empty($characters) || $forceDelete == true){
            deleteClass($id);
        } else {
            $alert = true;
        }
	}
}

$classes = fetchClasses();

?>

<h1>Dashboard des classes</h1>
<?php if ($alert){ ?>
<div class="alert-container">
    <p>Attention : la classe <?= fetchClass($id)['name']?> est utilisée par <?= sizeof($characters) ?> personnage<?php if(sizeof($characters) > 1){ echo "s"; } ?> :</p>
    <ul>
        <?php foreach($characters as $character){ ?>
            <li><?= $character['name'] ?></li>
        <?php } ?>
    </ul>
    <p>Êtes-vous sûr de vouloir supprimer la classe ? Les personnages indiqués seront également supprimés.</p>
    <form action="" method="post" class="delete-form">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="hidden" name="force_delete" value="1">
        <input type="submit" value="Oui" class="btn-delete">
    </form>
    <a href="index.php?page=admin/class/dashboard" class="btn-edit">Non</a>
</div>
<?php } else{ ?>

<div class="classes-container">
    <?php foreach ($classes as $class) { ?>
        <div class="class-card">
            <h3><?= $class["name"] ?></h3>
            <div class="card-actions">
                <a href="index.php?page=admin/class/edit_class&classId=<?= $class['id']?>" class="btn-edit">Éditer</a>
                <form action="" method="post" class="delete-form">
                    <input type="hidden" name="id" value="<?= $class['id'] ?>">
                    <input type="hidden" name="force_delete" value=0>
                    <input type="submit" value="Supprimer" class="btn-delete">
                </form>
            </div>
        </div>
    <?php } ?>
</div>

<a href="index.php?page=admin/class/add_class" class="btn-add">Ajouter une nouvelle classe</a>
<?php } ?>
