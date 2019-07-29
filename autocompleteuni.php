<?php
    require_once "config_db.php";
    //database configuration
    
    //get search term
    $searchTerm = $_GET['term'];
    
    //get matched data from skills table
    $query = mysqli_query($con, "SELECT * FROM `universites_and_colleges` WHERE `universites_and_colleges`.`universityName` LIKE '%".$searchTerm."%'");
    $data = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $data[] = $row['universityName'];
    }
    
    //return json data
    echo json_encode($data);
?>