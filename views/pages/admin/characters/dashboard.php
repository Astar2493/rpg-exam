<?php

require('models/db_connect.php');
require('models/characters.php');

$characters = fetchCharacters('name','ASC');
$sorting = "";
$order = "ASC";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['id'])){
        $id = $_POST['id'];
        if (!empty($id)) {
            deleteCharacter($id);
        }
    }
    if(isset($_POST['sorting'])){
        $sorting = $_POST['sorting'];
        $order = $_POST['order'];
        if($order == 'ASC'){
            $fleche = '↑';
        } elseif($order == 'DESC'){
            $fleche = '↓';
        }
        $characters = fetchCharacters($sorting, $order);
    }
}


?>

<h1>Dashboard des personnages</h1>

<div>
    <form id="sortingForm" action="index.php?page=admin/characters/dashboard" method="post">
        <p>Trier par : </p>
        <button type="button" name="bt_name" id="bt_name"><?php if ($sorting == 'name'){echo $fleche;} ?> Nom</button>
        <button type="button" name="bt_pv" id="bt_pv"><?php if ($sorting == 'pv'){echo $fleche;} ?> Vie</button>
        <button type="button" name="bt_atk" id="bt_atk"><?php if ($sorting == 'atk'){echo $fleche;} ?> Attaque</button>
        <input type="hidden" name="sorting" id="sorting" value="<?= $sorting?>">
        <input type="hidden" name="order" id="order" value="<?= $order?>">
    </form>
</div>
<div class="characters-container">
    <?php foreach ($characters as $character) { ?>
        <div class="character-card">
            <h2><?= $character["name"] ?></h2>
            <ul class="character-stats">
                <li>Point de vie : <?= $character["pv"] ?></li>
                <li>Point d'attaque : <?= $character["atk"] ?></li>
                <li>Point d'expérience : <?= $character["xp"] ?></li>
                <li>Classe : <?= $character["class_name"] ?></li>
            </ul>
            <div class="card-actions">
                <a href="index.php?page=admin/characters/edit_characters&characterId=<?= $character['id']?>" class="btn-edit">Éditer</a>
                <form action="" method="post" class="delete-form">
                    <input type="hidden" name="id" value="<?= $character['id'] ?>">
                    <input type="submit" value="Supprimer" class="btn-delete">
                </form>
            </div>
        </div>
    <?php } ?>
</div>

<a href="index.php?page=admin/characters/add_characters" class="btn-add">Créer mon nouveau personnage</a>

<script type="module" src="assets/JS/script.js"></script>