<?php
    require_once "config_db.php";
    //database configuration
    
    //get search term
    $searchTerm = $_GET['term'];
    
    //get matched data from skills table
    $query = mysqli_query($con, "SELECT * FROM `professor` WHERE name LIKE '%".$searchTerm."%'");
    $data = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $data[] = $row['name']."<".$row['email'].">";
    }
    
    //return json data
    echo json_encode($data);
?>