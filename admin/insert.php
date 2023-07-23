<?php
include_once "../conn_db.php";

// Get the form data
$item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
$item_cat = mysqli_real_escape_string($conn, $_POST['item_cat']);
$item_desc = mysqli_real_escape_string($conn, $_POST['item_desc']);
$item_price = mysqli_real_escape_string($conn, $_POST['item_price']);

$upload_msg ="";
$target_file ="";

// Check if the item already exists in the product table
if (is_existing($conn, $item_name, 'item_name', 'products')) {
    
    // Get the item_id of the existing item
    $query = "SELECT item_id FROM products WHERE item_name='$item_name'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $item_id = $row['item_id'];

    // Update the existing item's information in the products table
    $query = "UPDATE products SET cat_id='$item_cat', item_price='$item_price', item_desc='$item_desc' WHERE item_id='$item_id'";
    mysqli_query($conn, $query);

}
else 
{
// Upload the image file
$target_dir = "../img/";
$target_file = $target_dir . basename($_FILES["item_image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["item_image"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
// if (is_existing($target_file)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }

// Check file size
if ($_FILES["item_image"]["size"] > 50000000) { // 50mb image size
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
 
   // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["item_image"]["tmp_name"], $target_file)) {
        $upload_msg .= "";
        // Insert the new item and related tables data into the database:
        if (!empty($item_name) && !empty($item_desc) && !empty($item_price)) {
            // Insert the new item's information into the products table
            $query = "INSERT INTO products (item_name, cat_id, item_price, item_desc, item_file) VALUES ('$item_name', '$item_cat', '$item_price', '$item_desc', '$target_file')";
            mysqli_query($conn, $query);

            // Get the item_id of the newly inserted item
            $item_id = mysqli_insert_id($conn);
            $msg="Item successfully Added";

            // Redirect the user to the product list page
            header("Location: index.php?additem&msg=$msg");
            exit();
        } else {
            // Display an error message if any required field is empty
            $upload_msg .= "Please fill in all required fields.";
        }
    } 
    else {
        // Display an error message if the file was not moved successfully
        $upload_msg .= "Sorry, there was an error uploading your file.";
    }
}

}

 