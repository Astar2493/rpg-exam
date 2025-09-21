<?php 

require('models/db_connect.php');
require('models/class.php');

$classes = fetchClasses();

?>

<main>
    <div class="classes-container">
        <?php foreach($classes as $class){ ?>
            <div class="class-card">
                <h3><?= $class['name']; ?></h3>
            </div>
        <?php } ?>
    </div>
</main>


