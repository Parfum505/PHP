<?php
    if (isset($_GET['menu']) && !empty($_GET['menu'])) {
        $db->query('SELECT * FROM items JOIN category ON item_cat_id = cat_id
WHERE cat_name = :menu');
        $db->bind(':menu', $_GET['menu']);
        if(!$items = $db->resultset()){
            echo '<div class="container"><h2>No category: '.$_GET['menu'].' in our restaurant</h2></div>';
            exit();
        };
    }
?>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <h2 class="text-center">
            <?= $items[0]['cat_name'];?></h2>
        <?php foreach($items as $item):?>
        <div class="col-md-4 text-center">
            <div class="product">
                <a class="product_link" href="#" data-toggle="modal" data-target="#<?= $item['item_id']; ?>
                    ">
                    <img src="<?php echo $item['item_img']; ?>" class="img-responsive" alt="Image"></a>
                <h3>
                    <?= $item['item_name']; ?></h3>

                <div class="clearfix">
                    <button type="button" class="btn btn-info btn-lg pull-left" data-toggle="modal" data-target="#<?= $item['item_id']; ?>">More info</button>
                    <span class="price pull-right">
                        &#8364;
                        <?= $item['item_price']; ?></span>
                </div>
            </div>
            <!-- /.product --> </div>
        <?php endforeach; ?></div>

    <?php foreach($items as $item):?>
    <!-- Modal -->
    <div id="<?= $item['item_id']; ?>" class="modal fade " role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center">
                        <?= $item['item_name']; ?></h4>
                </div>
                <div class="modal-body">
                    <div class="container-fruid">
                        <div class="row">
                            <div class="col-sm-6">
                                <img src="<?= $item['item_img']; ?>" class="img-responsive" alt="Image"></div>
                            <div class="col-sm-6">
                                <p>
                                    <?= $item['item_discription']; ?></p>
                                <p class="price">
                                    &#8364;
                                    <?= $item['item_price']; ?></p>
                                <form action="pages/add_to_cart.php" method="POST" role="form">
                                    <div class="form-group row">
                                        <div class="col-sm-3 col-xs-4">
                                            <label for="quantity">Quantity:</label>
                                            <input type="text" class="form-control" id="quantity" name="quantity" value="1">
                                            <input type="hidden" class="form-control" name="item_id" value="<?= $item['item_id']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-9">
                                            <?php if($items[0]['cat_name'] == "Drinks")
                                           echo '<label class="checkbox-inline"><input type="checkbox" name="lemon" value="Lemon">Lemon</label>
                                            <label class="checkbox-inline"><input type="checkbox" name="ice" value="Ice">Ice cubes</label>'
                                            ?>
                                        </div>

                                    </div>
                                    <button type="submit" name="add" class="btn btn-success">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/.modal-body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!--/Modal -->
    <?php endforeach; ?></div>
<!-- /.container -->