<?php
ini_set('display_errors','1');
ini_set('display_startup_errors','1');

error_reporting(E_ALL);
if(isset($_GET['updateitem'])){
    
$item_id = htmlentities($_GET['updateitem']);
$item_details=query($conn, "SELECT * FROM products p
                        INNER JOIN category c ON p.cat_id = c.cat_id
                        WHERE p.item_id = '{$item_id}'
                        LIMIT 1
                    "); 
foreach($item_details as $item){ ?>
    
    <!DOCTYPE html>
<html>

<head>
    <title>Update Item</title>
    <!-- Link to Bootstrap CSS -->
<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">-->

</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <h1>Update Item</h1>
                <?php 
                if(isset($_GET['status'])){?>
                    
                    <div class="alert alert-secondary"><?php echo $_GET['status'];?></div>
                <?php }
                ?>

                <form action="update.php" method="post" enctype="multipart/form-data">

                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold"  for="item_name">Item Name</label>
                        <input type="hidden" class="form-control" id="item_id" name="item_id" value="<?php echo $item['item_id'];?>" >
                        <input type="text" class="form-control" id="item_name" name="item_name" value="<?php echo ucwords($item['item_name']);?>" readonly="readonly" required>
                    </div>

                    <div class="form-group mb-3">
                        <div class="input-group">
                            <input type="number" class="form-control" id="item_price" name="item_price" value="<?php echo ucwords($item['item_price']);?>" required placeholder="Price">                            
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold"  for="item_desc">Item Description</label>
                        <textarea class="form-control" id="item_desc" name="item_desc" required><?php echo ucwords($item['item_desc']);?></textarea>
                    </div>
                    <div class="mb-3 w-25">
                        <img src="../img/<?php echo  $item['item_file'];?>" alt="" class="img-fluid object-fit-lg-contain border rounded">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold"  for="item_image">Item Image</label>
                        <input type="file" id="item_image" name="item_image">
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold"  for="item_cat">Item Category</label>
                        <select name="item_cat" id="item_cat" class="form-control">
                            <option value=" <?php echo $item['cat_id'];?>"> <?php echo ($item['cat_desc']);?></option>
                           
                            <?php    $item_cat = $item['cat_id'];
                $category = query($conn,"SELECT * FROM `category` where cat_id <> '$item_cat' ;");
                foreach($category as $cat ){ ?>
                            <option value="<?php echo $cat['cat_id'];?>"><?php echo $cat['cat_desc'];?></option>
                            <?php }
                ?>
                        </select>
                    </div>

                   

                    <button type="submit" name="submit" value="Done" class="btn btn-lg btn-primary">Submit</button>

                </form>
            </div>
        </div>


    </div>

 
</body>

</html>
<?php } ?>


<?php }
else{
    header("location: index.php");
    
}?>