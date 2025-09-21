<?php

require('models/db_connect.php');
require('models/characters.php');

$characters = fetchCharacters('name','ASC');
$sorting = "";
$order = "ASC";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
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

<h1>Liste des personnages</h1>

<div>
    <form id="sortingForm" action="index.php?page=characters" method="post">
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
        <li>Point de vie : <?= $character["pv"] ?></li>
        <li>Point d'attaque : <?= $character["atk"]?></li>
        <li>Point d'expérience : <?= $character["xp"]?></li>
        <li>Classe du personnage : <?= $character["class_name"]?></li>
    </div>
<?php } ?>
</div>
<script type="module" src="assets/JS/script.js"></script>