<?php
function pdo_connect_mysql() {
    // Update the details below with your MySQL details
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'shoppingcart';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}
// Header
function template_header($title) {
    // Get the number of items in the shopping cart, which will be displayed in the header.
    $num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
    
echo <<<EOT

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
        <header>
        
            <div class="content-wrapper">
                <h1><a href="index.php?page=home">NutriCare</a> </h1>
                <nav>
                    <ul>
                        <li><a href="index.php?page=products">All Products</a> </li>
                        <li><a href="index.php?page=produce">Produce</a> 
                            <ul>
                                <li><a href="index.php?page=fruitveg">Fruit & Veg</a></li>
                                <li><a href="index.php?page=bakery">Bakery</a></li></li>
                            </ul>
                            <li><a href="index.php?page=butcher">Butcher</a> 
                            <ul>
                                <li><a href="index.php?page=meat">Meat</a></li></li>
                            </ul>
                        <li><a href="index.php?page=fridge">Fridge</a> 
                            <ul>
                                <li><a href="index.php?page=dairyeggs">Dairy & Eggs</a></li></li>
                            </ul>
                        <li><a href="index.php?page=pantry">Pantry</a> 
                            <ul>
                                <li><a href="index.php?page=condoilherbspice">Condiments, Oils, Herbs & Spices</a></li>
                                <li><a href="index.php?page=healthfoodandsnacks">Health Foods and Snacks</a></li>
                                <li><a href="index.php?page=pastaandsauce">Pasta & Pasta Sauces</a></li>
                                <li><a href="index.php?page=ricenoodlegrains">Rice, noodles and grains</a></li>
                                <li><a href="index.php?page=longlifemilkanddrinks">Long life Milk & Drinks</a></li>
                                <li><a href="index.php?page=spreads">Spreads</a></li>
                                <li><a href="index.php?page=baking">Baking</a></li></li>
                            </ul>
                        <li><a href="index.php?page=frozen">Frozen</a> 
                            <ul>
                                <li><a href="index.php?page=frozdessertsicecream">Frozen Desserts & Ice-cream</a></li> 
                                <li><a href="index.php?page=frozfruitveg">Frozen Fruit & Vegetables</a></li></li>
                            </ul>


                        </ul>
                </nav>
                
                <div class="link-icons">
                    <div class="search-container">
                        <form action="index.php?page=itemsearch" method="POST">
                            <input type="text" placeholder="Search.." name="productsearch">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <a href="index.php?page=cart">
						<i class="fas fa-shopping-cart"></i>
                        <span>$num_items_in_cart</span>
					</a>
                </div>
            </div>
        </div>
        </header>
        <main>
EOT;
}





// Footer
function template_footer() {
$year = date('Y');
echo <<<EOT
        </main>
        <footer>
            <div>
                <a class="footlink" href="index.php?page=products">All Products</a> |
                <a class="footlink" href="index.php?page=produce">Produce</a> |
                <a class="footlink" href="index.php?page=butcher">Butcher</a> |
                <a class="footlink" href="index.php?page=fridge">Fridge</a> |
                <a class="footlink" href="index.php?page=pantry">Pantry</a> |
                <a class="footlink" href="index.php?page=frozen">Frozen</a>
    </body>
</html>
EOT;
}
?>