<?php
// Start the session
session_start();

//Connect to DB
include 'db-connect.php';
    
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $Search = $_GET['search'];

        if ($_SESSION["lang"]=="BG") {
            $sql = "SELECT id, nameBG AS name FROM products WHERE nameBG LIKE '%" . $Search . "%' ";     
            $sql2 = "SELECT id, nameBG AS name FROM articles WHERE (nameBG LIKE '%" . $Search . "%' OR contentBG LIKE '%" . $Search . "%') ";
        } else {
            $sql = "SELECT id, nameEN AS name FROM products WHERE nameEN LIKE '%" . $Search . "%' ";     
            $sql2 = "SELECT id, nameEN AS name FROM articles WHERE (nameEN LIKE '%" . $Search . "%' OR contentEN LIKE '%" . $Search . "%') ";   
        }
        
        $resultProducts = mysqli_query($conn,$sql);
        $resultsArticles = mysqli_query($conn,$sql2);

        if(mysqli_num_rows($resultProducts)){
            while($row = mysqli_fetch_assoc($resultProducts)){
                echo '<li><a href="product.php?id=' .$row['id']. '" class="list-group list-group-item-action">'.$row['name'].'</a></li>';     
            }
        }
        // if(mysqli_num_rows($resultsArticles)){
        //     while($row = mysqli_fetch_assoc($resultsArticles)){
        //         echo '<li><a href="blog-article.php?id=' .$row['id']. '" class="list-group list-group-item-action">'.$row['name'].'</a></li>';
        //     }
        // }
    }
?>