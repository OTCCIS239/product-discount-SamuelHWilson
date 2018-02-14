<?php
    //Grab data
    include_once("db_interface.php");

    $productId = filter_input(INPUT_POST, "product_id");
    $couponId = filter_input(INPUT_POST, "coupon_id");

    $product = GetOne("SELECT * FROM products WHERE id = :product_id", $conn, [
        ":product_id" => $productId
    ]);
    $coupon = GetOne("SELECT * FROM coupons WHERE id = :coupon_id", $conn, [
        ":coupon_id" => $couponId
    ]);

    //Setup vars.
    $pName = $product["name"];
    $pDesc = $product["description"];
    $price = (double)$product["price"];
    $cName = $coupon["code"];
    $cDesc = $coupon["description"];
    $discountPercent = (double)$coupon["discount_percent"];
 
    //Calculate discount.
    $discountAmount = $price * ($discountPercent / 100);
    $discountedPrice = $price - $discountAmount;
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Discount Information</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-sm">
            </div>
            <div class="col-sm-8 col-md-6 col-lg-4">
                <div class="card main-content">
                    <h1 class="card-header h5">Product Discount Information</h1>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-5">Product Description</dt>
                            <dd class="col-sm-7"><?= $pDesc?></dd>
                            <dt class="col-sm-5">List Price</dt>
                            <dd class="col-sm-7"><?= "$".number_format($price, 2)?></dd>
                            <dt class="col-sm-5">Coupon Description</dt>
                            <dd class="col-sm-7"><?= $cName.", ".$cDesc?></dd>
                            <dt class="col-sm-5">Discount Percent</dt>
                            <dd class="col-sm-7"><?= $discountPercent."%"?></dd>
                            <dt class="col-sm-5">Discount Amount</dt>
                            <dd class="col-sm-7"><?= "$".number_format($discountAmount, 2)?></dd>
                            <dt class="col-sm-5">Discounted Price</dt>
                            <dd class="col-sm-7"><?= "$".number_format($discountedPrice,2)?></dd>
                        </dl>
                        <a class="btn btn-primary" href="index.php">Go Back</a>
                    </div>
                </div>
            </div>
            <div class="col-sm">
            </div>
        <div>
    </div>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>

</html>