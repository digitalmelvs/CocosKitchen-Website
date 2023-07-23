<?php
include_once "../conn_db.php";

if(isset($_POST['item_id'])){
    // Get the form data
    $item_id = mysqli_real_escape_string($conn, $_POST['item_id']);
    $item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
    $item_cat = mysqli_real_escape_string($conn, $_POST['item_cat']);
    $item_desc = mysqli_real_escape_string($conn, $_POST['item_desc']);
    $item_price = mysqli_real_escape_string($conn, $_POST['item_price']);
    
    
$isPriceAdjusted = True;
 
// Upload the image file
// initialize variable
$upload_msg ="";
$item_filename="";
$target_file ="";
$target_dir = "../img/";
$uploadOk = 1;
$err_msg="";
$mode=0;
    
 // the image change so this will execute
//check if there is file to upload
if(isset($_FILES['item_image']) && $_FILES['item_image']['error'] != UPLOAD_ERR_NO_FILE ){
    $mode=1;  
    $item_filename = basename($_FILES["item_image"]["name"]);
    $target_file = $target_dir . $item_filename;
    $new_file_ind = 1;
    $uploadOk = 1;
    
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["item_image"]["tmp_name"]);
    if($check !== false) {
        //$upload_msg .= "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    }else {
        $upload_msg .= "File is not an image.<br>";
        $uploadOk = 0;
    }
    
        // Check file size
    if ($_FILES["item_image"]["size"] > 50000000) {
        $upload_msg .= "Sorry, your file is too large.<br>";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "webp" ) {
        $upload_msg .= "Sorry, only JPG, JPEG, PNG, webp & GIF files are allowed.<br>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $upload_msg .= "Sorry, your file cannot be uploaded.<br>";
    } 
    else {
        //initialize variables
        $newbasename=$item_name . "." .$imageFileType;
        $newfilename=$target_dir . $newbasename;
         
        
        //check if upload is done.
            if (move_uploaded_file($_FILES["item_image"]["tmp_name"], $newfilename)) {
                $upload_msg .= "The Item Image has been updated.<br>";
                
                //initiate update parameters
                $table = "products";
                $fields =array("item_desc" => $item_desc,

                            "cat_id" => $item_cat,
                            "item_file" => $newbasename
                            );
                $filter =array("item_id" => $item_id);
                
                update($conn, $table, $fields, $filter);
                
                //pricing
                
                if($isPriceAdjusted){
                    $update_product_price = "UPDATE products
                        SET item_price = ?
                        WHERE item_id = ?";
                                            
                    query($conn, $update_product_price, array($item_price, $item_id));
                                     
                    $err_msg .= "Pricing Adjusted for {$item_name}.";
                }
            
         }
         else{
                 $upload_msg .= "The file ". htmlspecialchars( $item_filename). " was not uploaded. <br>";
            }   
    }
}
else {
$mode = 2;
    // the image did not change so this will execute
    
    $table = "products";
    $fields =array("item_desc" => $item_desc,
                "cat_id" => $item_cat
                );
    $filter =array("item_id" => $item_id);
                
    update($conn, $table, $fields, $filter);
    
    if (move_uploaded_file($_FILES["item_image"]["tmp_name"], $newfilename)) {
        $upload_msg .= "The Item Image has been updated.<br>";
                    
        //initiate update parameters
        $table = "products";
        $fields =array("item_desc" => $item_desc,
                                    
                    "cat_id" => $item_cat,
                    "item_file" => $newbasename
                    );
        $filter =array("item_id" => $item_id);
                    
        update($conn, $table, $fields, $filter);
                    
        //pricing
        
        if($isPriceAdjusted){

        $update_product_price = "UPDATE products
            SET item_price = ?
            WHERE item_id = ?";
                                                
            query($conn, $update_product_price, array($item_price, $item_id));
                                         
                $err_msg .= "Pricing Adjusted for {$item_name}.";
            }
                
        }
                    
    }
    if( $err_msg != "" || $upload_msg != ""){
        $err_msg = $err_msg . "</br>" . $upload_msg;
    }else{
        $err_msg = "No Updates Made for $item_name";
     }

header("location: index.php?updateitem=$item_id&status=$err_msg&mode=$mode");
exit();
}

