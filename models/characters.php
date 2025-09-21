<?php 


    function fetchCharacter($id){
        $db = dbConnect();
        $sql = "SELECT * FROM characters WHERE id = :id";
        $query = $db->prepare($sql);
        $query->execute([
            "id" => $id
        ]);
        return $query->fetch();
    }

    function fetchCharacters($sorting, $order){
        $db = dbConnect();
        $sql = "SELECT characters.*, class.name AS class_name 
        FROM characters 
        INNER JOIN class 
        ON class.id = characters.id_class
        ORDER BY ".$sorting." ".$order;
        $query = $db->query($sql);
        $classes = $query->fetchAll();
        return $classes;
    }

    function addCharacter($name, $classId){
        $db = dbConnect();
        $pv = rand(50, 100);
        $atk = rand(1,10);
        $xp = 0;
        $sql = "INSERT INTO characters (name, pv, atk, xp, id_class) 
        VALUES (:name, :pv, :atk, :xp, :classId)";
        $query = $db->prepare($sql);
        $query->execute([
            "name" => $name,
            "pv" => $pv,
            "atk" => $atk,
            "xp" => $xp,
            "classId" => $classId
        ]);
    }

    function editCharacter($name, $id){

        $db = dbConnect();
        $sql = "UPDATE characters SET name = :name WHERE id = :id";
        $query = $db->prepare($sql);
        $query->execute([
            "name" => $name,
            "id" => $id
        ]);
    }


    function deleteCharacter($id){
        $db = dbConnect();
        $sql = "DELETE FROM characters WHERE id = :id";
        $query = $db->prepare($sql);
        $query->execute([
            "id" => $id
        ]);
    }

    function fetchClassCharacters($id){
        $db = dbConnect();
        $sql = "SELECT name FROM characters WHERE id_class = :id";
        $query = $db->prepare($sql);
        $query->execute([
            "id" => $id
        ]);
        $characters = $query->fetchAll();
        return $characters ;
    }
?>



