
<!DOCTYPE html>
<html>

<head>
    <title>Add Item</title>
    <!-- Link to Bootstrap CSS -->
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <h1>Add Item</h1>
                <?php
                if(isset($_GET['status'])){?>
                    <div class="alert alert-secondary"><?php echo htmlentities($_GET['status']);?></div>
                <?php }
                ?>

                <form action="insert.php" method="post" enctype="multipart/form-data">

                    <div class="form-group mb-4">
                        <label for="item_name">Item Name</label>
                        <input type="text" class="form-control" id="item_name" name="item_name" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="item_price">Item Price</label>
                        <input type="number" class="form-control" id="item_price" name="item_price" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="item_desc">Item Description</label>
                        <textarea class="form-control" id="item_desc" name="item_desc" required></textarea>
                    </div>

                    <div class="form-group mb-4">
                        <label for="item_image">Item Image</label>
                        <input type="file" id="item_image" name="item_image" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="item_cat">Item Category</label>
                        <select name="item_cat" id="item_cat" class="form-control">
                            <?php
                $category = query($conn,"SELECT * FROM `category`");
                foreach($category as $cat ){ ?>
                            <option value="<?php echo $cat['cat_id'];?>"><?php echo $cat['cat_desc'];?></option>
                            <?php }
                ?>
                        </select>
                    </div>

                    <button type="submit" name="submit" value="Done" class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>


    </div>

    <!-- Link to jQuery -->
<!--    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>-->
    <!-- Link to Bootstrap JS -->
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->

</body>

</html>