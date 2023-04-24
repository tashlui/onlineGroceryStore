<?php
$stmt = $pdo->prepare('SELECT * FROM products ORDER BY id DESC LIMIT 4');
$stmt->execute();
?>
<?=template_header('Home')?>

<div class="featured">
    <h2>Groceries</h2>
</div>

<div class="home content-wrapper">
    <div class="home-wrapper">
        <a href="index.php?page=produce" class="homeimg">
            <img src="imgs/produce.jpg" width="300" height="300" alt="Produce">
            <span class="cat">Produce</span>
            <span class="desc">Fresh from the markets daily.</span>
        </a>
        <a href="index.php?page=fridge" class="homeimg">
            <img src="imgs/fridge.jpg" width="300" height="300" alt="Fridge">
            <span class="cat">Fridge</span>
            <span class="desc">Fresh, cold groceries for your fridge.</span>
        </a>
        <a href="index.php?page=pantry" class="homeimg">
            <img src="imgs/pantry.jpg" width="300" height="300" alt="Pantry">
            <span class="cat">Pantry</span>
            <span class="desc">A wide range of gourmet groceries.</span>
        </a>
    </div>
    
</div>

<?=template_footer()?>