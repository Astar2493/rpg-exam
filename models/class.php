<?php 


    function fetchClass($id){
        $db = dbConnect();
        $sql = "SELECT * FROM class WHERE id = :id";
        $query = $db->prepare($sql);
        $query->execute([
            "id" => $id
        ]);
        return $query->fetch();
    }

    function fetchClasses(){
        $db = dbConnect();
        $sql = "SELECT * FROM class ORDER BY name ASC";
        $query = $db->query($sql);
        $classes = $query->fetchAll();
        return $classes;
    }

    function addClass($name){
        $db = dbConnect();
        $sql = "INSERT INTO class (name) VALUES (:name)";
        $query = $db->prepare($sql);
        $query->execute([
            "name" => $name
        ]);
    }

    function editClass($name, $id){

        $db = dbConnect();
        $sql = "UPDATE class SET name = :name WHERE id = :id";
        $query = $db->prepare($sql);
        $query->execute([
            "name" => $name,
            "id" => $id
        ]);
    }


    function deleteClass($id){
        $db = dbConnect();
        $sql = "DELETE FROM class WHERE id = :id";
        $query = $db->prepare($sql);
        $query->execute([
            "id" => $id
        ]);
    }
?>