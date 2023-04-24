<?php

if (isset($_POST['placeorder']) && !empty($_POST['name']) && !empty($_POST['address']) && !empty($_POST['suburb']) && !empty($_POST['state']) && 
!empty($_POST['country']) && !empty($_POST['phone']) && !empty($_POST['email'])) {
    unset($_SESSION["cart"]);
    header('location: index.php?page=placeorder');
    exit;
}


?>


<?=template_header('Delivery details')?>

<div class="delivery content-wrapper">
    <h1>Delivery Details</h1>
    <form action="index.php?page=deliverydetails" method="post">
        <input type="text" placeholder="Name" name="name"><p>*</p>
        <br>
        <br>
        <input type="text" placeholder="Address" name="address"><p>*</p>
        <br>
        <br>
        <input type="text" placeholder="Suburb" name="suburb"><p>*</p>
        <br>
        <br>
        <input type="text" placeholder="State" name="state"><p>*</p>
        <br>
        <br>
        <input type="text" placeholder="Country" name="country"><p>*</p>
        <br>
        <br>
        <input type="text" placeholder="Phone number" name="phone"><p>*</p>
        <br>
        <br>
        <input type="text" placeholder="Email" name="email"><p>*</p>
        <br>
        <br>
        <div class="buttons">
            <input type="submit" value="Place Order" name="placeorder">
                
        </div>
    </form>
</div>

<?=template_footer()?>