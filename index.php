<?php

$products = [
    "Mountain Dew: Pitch Black",
    "Mountain Dew: Code Red",
    "Mountain Dew: Voltage",
    "Mountain Dew: White Out",
    "Spam"
];

$coupons = [
    "New Customer" => 15,
    "Student" => 20,
    "Adam" => 75
]

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="styles.css">

    <title>Discount Calculator</title>
</head>

<body>
    <div id="main-vue" class="container-fluid">
        <div class="row mt-5">
            <div class="col-sm">
            </div>
            <div class="col-sm-8 col-md-6 col-lg-4">
                <div class="card main-content">
                    <h1 class="card-header h5">Product Discount Calculator</h1>
                    <div class="card-body">
                        <form onsubmit="return MainVue.ValidateAll();" action="display-discount.php" method="post">
                            <div class="form-group">
                                <label for="desc">Item Name</label>
                                <small v-show="!fields[0].isValid" class="form-text angry">You must select a product from bellow.</small>
                                <div class="input-group">
                                    <select v-model="fields[0].val" v-bind:class="{ angry: !fields[0].isValid }"class="form-control" name="desc" id="desc">
                                        <option value="">Please choose a product...</option>
                                        <?php foreach($products as $product): ?>
                                            <option value="<?= $product ?>"><?= $product ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                
                            <div class="form-group">
                                <label for="desc">List Price</label>
                                <small v-show="!fields[1].isValid" class="form-text angry">You must enter a valid price. (e.g. 13.50)</small>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input v-model="fields[1].val" v-bind:class="{ angry: !fields[1].isValid }" placeholder="0.00" type="text" class="form-control" name="price" id="price">
                                </div>
                            </div>
                
                            <div class="form-group">
                                <label for="desc">Coupon to Apply</label>
                                <small v-show="!fields[2].isValid" class="form-text angry">You must select a coupon from bellow.</small>
                                <div class="input-group">
                                    <select v-model="fields[2].val" v-bind:class="{ angry: !fields[2].isValid }" class="form-control" name="percent" id="percent">
                                        <option value="">Please choose a coupon...</option>
                                        <?php foreach($coupons as $name => $percent): ?>
                                            <option value="<?= $percent ?>"><?= "$name - $percent%" ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                
                            <input type="submit" class="btn btn-primary" value="Calculate">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm">
            </div>
        </div>
    </div>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    <!-- Vue.js -->
    <script src="vue.js"></script>

    <!-- My js. -->
    <script src="code.js"></script>

</body>

</html>