<?php
if (isset($_POST['productsearch'])) {
    // The amounts of products to show on each page
    $num_products_on_each_page = 24;
    // The current page - in the URL, will appear as index.php?page=products&p=1
    $current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;
    // Fetch the products from the database and return the result as an Array
    $search_query = $_POST['productsearch']; 
    $search_query = htmlspecialchars($search_query); 
    // changes characters used in html to their equivalents, for example: < to &gt;

    $stmt = $pdo->prepare("SELECT * FROM products WHERE name LIKE '%".$search_query."%' OR brand LIKE '%".$search_query."%' ORDER BY name DESC LIMIT ?,?");

    // bindValue will allow us to use an integer in the SQL statement, which we need to use for the LIMIT clause
    $stmt->bindValue(1, ($current_page - 1) * $num_products_on_each_page, PDO::PARAM_INT);
    $stmt->bindValue(2, $num_products_on_each_page, PDO::PARAM_INT);
    $stmt->execute();

    // Fetch the products from the database and return the result as an Array
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
$total_products = $pdo->query("SELECT * FROM products WHERE name LIKE '%".$search_query."%'OR brand LIKE '%".$search_query."%'")->rowCount();

?>

<?=template_header('Search')?>

<div class="featured">
    <h2>Groceries</h2>
</div>

<div class="products content-wrapper">
    <h1>Search</h1>
    <p><?=$total_products?> Search</p>
    <br>
    <div class="products-wrapper">
        <?php foreach ($results as $product): ?>
        <a href="index.php?page=product&id=<?=$product['id']?>" class="product">
            <img src="imgs/<?=$product['img']?>" width="200" height="200" alt="<?=$product['name']?>">
            <span class="name"><?=$product['name']?></span>
            <span class="price">
                &dollar;<?=$product['price']?>  
            </span>
        </a>
        <?php endforeach; ?>
    </div>
    <div class="buttons">
        <?php if ($current_page > 1): ?>
        <a href="index.php?page=search&p=<?=$current_page-1?>">Prev</a>
        <?php endif; ?>
        <?php if ($total_products > ($current_page * $num_products_on_each_page) - $num_products_on_each_page + count($results)): ?>
        <a href="index.php?page=search&p=<?=$current_page+1?>">Next</a>
        <?php endif; ?>
    </div>
</div>

<?=template_footer()?>