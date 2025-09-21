<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/rpg-exam/assets/css/main.css">
    <!-- <link
		rel="stylesheet"
		href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"> -->
    <title>RPG</title>
</head>
<body>
    <?php include('views/partials/navbar.html'); ?>
    <main>
        <?php if (isset($_GET['page'])){
            include('views/pages/' .$_GET['page'] .'.php'); 
        } else {
            include('views/pages/home.php');
        }
        ?>
    </main>
</body>
</html>