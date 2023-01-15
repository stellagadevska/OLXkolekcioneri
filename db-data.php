<?php
    header('Content-Type: text/html; charset=UTF-8');  
// Start the session
	session_start();
		
//Connect to DB
	include 'db-connect.php';
	

	function getCategories() {
		global $conn;
		if ($_SESSION["lang"]=="BG") {
			$sql = 'SELECT id, nameBG FROM categories';
		} else {
			$sql = 'SELECT id, nameEN FROM categories';
		}
		//Make query & get result
		$result = mysqli_query($conn,$sql);

		//Fetch the resulting categories as an array
		$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
		
		if ($_SESSION["lang"] == "BG") {
        	$categoriesJSON = str_replace("nameBG", "name", json_encode($categories));
    	}else {
        	$categoriesJSON = str_replace("nameEN", "name", json_encode($categories));
    	}

		return $categoriesJSON;
	}

	
	function getCateogryData($categoryID) {
		global $conn;
		if ($_SESSION["lang"]=="BG") {
			    $category = $conn->query("SELECT nameBG, imagePath FROM categories WHERE id=" . $categoryID)->fetch_assoc();
    			$category["products"] = $conn->query("SELECT id, nameBG, shortDescriptionBG, imagePath, price FROM products WHERE categoryId=" . $categoryID )->fetch_all(MYSQLI_ASSOC);
		} else {
				$category = $conn->query("SELECT nameEN, imagePath FROM categories WHERE id=" . $categoryID)->fetch_assoc();
    			$category["products"] = $conn->query("SELECT id, nameEN, shortDescriptionEN, imagePath, price FROM products WHERE categoryId=" . $categoryID )->fetch_all(MYSQLI_ASSOC);
		}
		

		
		if ($_SESSION["lang"] == "BG") {
        	$categoryJSON = str_replace("nameBG", "name", json_encode($category));
        	$categoryJSON = str_replace("shortDescriptionBG", "shortDescription", $categoryJSON);
    	}else {
        	$categoryJSON = str_replace("nameEN", "name", json_encode($category));
        	$categoryJSON = str_replace("shortDescriptionEN", "shortDescription", $categoryJSON);
    	}


		return $categoryJSON;	
	}


	function getProductData($productID) {
		global $conn;
		if ($_SESSION["lang"]=="BG") {
			        $product = $conn->query("SELECT id,nameBG, imagePath, shortDescriptionBG, longDescriptionBG, price, categoryID FROM products WHERE id=" . $productID)->fetch_assoc();
					$product["similarProducts"] = $conn->query("SELECT id, nameBG, shortDescriptionBG, longDescriptionBG, imagePath, price FROM products WHERE categoryID=" . $product["categoryID"] . " AND NOT id=" . $productID. " ORDER BY RAND()")->fetch_all(MYSQLI_ASSOC);
		} else {
			        $product = $conn->query("SELECT id,nameEN, imagePath, shortDescriptionEN, longDescriptionEN, price, categoryID FROM products WHERE id=" . $productID)->fetch_assoc();
					$product["similarProducts"] = $conn->query("SELECT id, nameEN, shortDescriptionEN, longDescriptionEN, imagePath, price FROM products WHERE categoryID=" . $product["categoryID"] . " AND NOT id=" . $productID. " ORDER BY RAND()")->fetch_all(MYSQLI_ASSOC);		}
		

		
		if ($_SESSION["lang"] == "BG") {
        	$productJSON = str_replace("nameBG", "name", json_encode($product));
        	$productJSON = str_replace("shortDescriptionBG", "shortDescription", $productJSON);
        	$productJSON = str_replace("longDescriptionBG", "longDescription", $productJSON);
    	}else {
        	$productJSON = str_replace("nameEN", "name", json_encode($product));
        	$productJSON = str_replace("shortDescriptionEN", "shortDescription", $productJSON);
        	$productJSON = str_replace("longDescriptionEN", "longDescription", $productJSON);
    	}


		return $productJSON;
	}

	function getArticles() {
			global $conn;
			if ($_SESSION["lang"]=="BG") {
				$articles = $conn->query("SELECT id, nameBG AS name, imagePath FROM articles")->fetch_all(MYSQLI_ASSOC);
    			return  json_encode($articles,  JSON_UNESCAPED_UNICODE);
			}else{
				$articles = $conn->query("SELECT id, nameEN AS name, imagePath FROM articles")->fetch_all(MYSQLI_ASSOC);
    			return  json_encode($articles,  JSON_UNESCAPED_UNICODE);
			}
		    
	}

	function getArticle($articleID) {
			global $conn;
			if ($_SESSION["lang"]=="BG") {
		    $article = $conn->query("SELECT nameBG AS name, contentBG AS content, authorBG AS author, imagePath, imagePath2 FROM articles WHERE id=" . $articleID)->fetch_assoc();
			return  json_encode($article,  JSON_UNESCAPED_UNICODE);
			}else{
				$article = $conn->query("SELECT id, nameEN AS name, contentEN AS content, authorEN AS author, imagePath, imagePath2 FROM articles WHERE id=" . $articleID)->fetch_assoc();
				return  json_encode($article,  JSON_UNESCAPED_UNICODE);
			}
    		
	}

	function addToCart($productID) {
		global $conn;  
		$product = $conn->query("SELECT nameBG,nameEN, imagePath, price FROM products WHERE id=" . $productID)->fetch_assoc(); 

	    $found = FALSE;

	    foreach($_SESSION["cartContents"] as &$value){
	        if($value["productID"] == $productID){
	            $value['quantity']++;
	            $found = TRUE;
	            break; // Stop the loop after we've found the item
	        }
	    }
	    
	    if(!$found){
	        array_push($_SESSION["cartContents"], array("productID" => $productID, "productNameBG"=> $product["nameBG"], "productNameEN"=> $product["nameEN"], "quantity" => 1, "price" => $product["price"], "imagePath" => $product["imagePath"]));
	    }
	    
	    $_SESSION["cartValue"] += $product["price"];

	    return  json_encode($_SESSION,  JSON_UNESCAPED_UNICODE);
	}

	function removeFromCart($productID) {

	    $found = FALSE;

	    foreach($_SESSION["cartContents"] as $key=>&$value){
	        if($value["productID"] == $productID){
	            $value['quantity']--;
	            $_SESSION["cartValue"] -= $value["price"];
	            if ($value['quantity']==0) {
	            	unset($_SESSION["cartContents"][$key]);	
	            }
	            var_dump($_SESSION["cartContents"]);
	            $found = TRUE;
	            break; // Stop the loop after we've found the item
	        }
	    }
	    

	    
	    //echo "string";
	    //return  json_encode($_SESSION,  JSON_UNESCAPED_UNICODE);
	}	


	function getAccount($accountID) {
		global $conn;  
		$query = "SELECT * FROM users WHERE id=" . $accountID;

		$user = $conn->query($query)->fetch_assoc(); 

		$query = "SELECT value FROM orders WHERE userID=" . $accountID;

		$userOrders = $conn->query($query)->fetch_all();
		$totalOrders = 0;

		foreach ($userOrders as  $value) {
			$totalOrders += intval($value[0]);
			
		};

		$userOutput["totalOrders"] = $totalOrders;
		$userOutput["email"] = $user["email"];
		$userOutput["name"] = $user["firstName"]." ".$user["lastName"];

		return json_encode($userOutput,  JSON_UNESCAPED_UNICODE);

	}
	

?>