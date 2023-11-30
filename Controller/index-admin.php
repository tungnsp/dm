
<?php
session_start();
include "../Model/pdo.php";
include "../Model/action-categories.php";
include "../Model/action-product.php";
include "../Model/action-account.php";
include "../Model/action-shopping-cart.php";
include "../Model/action-order.php";
include "../View/Admin/sidebar.php";

if(isset($_GET['request']) && $_GET['request']){
        switch($_GET['request']){

            case "home": 
                include "./index-home.php";
                break;
            case "acc":
                $list_user = Load_All_Data_Acc();
                include "../View/Admin/acc.php";
                break;
            case "delete_acc":
                if(isset($_GET['id']) && $_GET['id']){
                    $id = $_GET['id'];
                    Delete_Data_Acc($id);
                    $_SESSION['status'] = "Delete successfully";
                    // $_SESSION['status_code'] = "success";
                }
                $list_user = Load_All_Data_Acc();
                include "../View/Admin/acc.php";
                break;   
            case "edit_acc":
                if(isset($_GET['id']) && $_GET['id']){
                    $id = $_GET['id'];
                    $list_one_acc = Load_One_Data_Acc($id);
                }
                $list_user = Load_All_Data_Acc();
                include "../View/Admin/update-acc.php";
                break;
            case "update_acc":
                if(isset($_POST['submit']) && $_POST['submit']) {
                    $id = $_POST['id_user'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $full_name = $_POST['full_name'];
                    $role = $_POST['role'];
                    
                    Update_Data_Acc($id, $email,$password,$full_name, $role);
                    $_SESSION['status'] = "Update successfully";
                    // $_SESSION['status_code'] = "success";
                }
                $list_user = Load_All_Data_Acc();
                include "../View/Admin/acc.php";
                break;

            case "create_acc":
                if(isset($_POST['submit']) && $_POST['submit']){
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $full_name = $_POST['full_name'];
                    $role = $_POST['role'];
                    Add_Data_Acc($email,$password,$full_name,$role);
                    $_SESSION['status'] = "Add successfully";
                }
                include "../View/Admin/sweetalert.php";
                include "../View/Admin/add-acc.php";
                break; 
            case "categories":
                $list_categories = Load_All_Data_Categories();
                include "../View/Admin/categories.php";
                break;
            
            case "delete":
                if(isset($_GET['id']) && $_GET['id']){
                    $id = $_GET['id'];
                    Delete_Data_Categories($id);
                    $_SESSION['status'] = "Delete successfully";
                    // $_SESSION['status_code'] = "success";
                }
                $list_categories = Load_All_Data_Categories();
                include "../View/Admin/categories.php";
                break;
            
            case "create":
                if(isset($_POST['submit']) && $_POST['submit']){
                    $name_category = $_POST['name_category'];
                    Add_Data_Categories($name_category);
                    $_SESSION['status'] = "Add successfully";
                }
                include "../View/Admin/sweetalert.php";
                include "../View/Admin/add-categories.php";
                break;
            
            case "edit":
                if(isset($_GET['id']) && $_GET['id']){
                    $id = $_GET['id'];
                    $list_one_category = Load_One_Data_Categories($id);
                }
                $list_categories = Load_All_Data_Categories();
                include "../View/Admin/update-categories.php";
                break;
            
            case "update":
                if(isset($_POST['submit']) && $_POST['submit']) {
                    $id = $_POST['id_category'];
                    $name_categories = $_POST['name_category'];
                    Update_Data_Categories($id, $name_categories);
                    $_SESSION['status'] = "Update successfully";
                    // $_SESSION['status_code'] = "success";
                }
                $list_categories = Load_All_Data_Categories();
                include "../View/Admin/categories.php";
                break;

            case "product":
                $list_products = Load_All_Data_Products();
                include "../View/Admin/products.php";
                break;
            
            case "delete-product":
                if(isset($_GET['id']) && $_GET['id']){
                    $id = $_GET['id'];
                    Delete_Data_Products($id);
                    $_SESSION['status'] = "Delete successfully";
                    // $_SESSION['status_code'] = "success";
                }
                $list_products = Load_All_Data_Products();
                include "../View/Admin/sweetalert.php";
                include "../View/Admin/products.php";
                break;
                
            case "create-product":
                if(isset($_POST['submit']) && $_POST['submit']){
                    $name_products = $_POST['name_product'];
                    $file_name = $_FILES['images']['name'];
                    $price = $_POST['price'];
                    $id_categories = $_POST['id_categories'];
                    $_SESSION['status'] = "Delete successfully";
                    Upload_Images($file_name);
                    Add_Data_Products($id_categories,$name_products,$file_name, $price);
                }
                $list_categories = Load_All_Data_Categories();
                include "../View/Admin/sweetalert.php";
                include "../View/Admin/add-products.php";
                break;
            
            case "edit-product":
                if(isset($_GET['id']) && $_GET['id']){
                    $id = $_GET['id'];
                    $list_one_data_product = Load_One_Data_Products($id);
                }
                $list_categories = Load_All_Data_Categories();
                include "../View/Admin/update-products.php";
                break;

            case "update-product":
                if(isset($_POST['submit']) && $_POST['submit']){
                    $name_products = $_POST['name_product'];
                    $file_name = $_FILES['images']['name'];
                    $price = $_POST['price'];
                    $id_categories = $_POST['id_categories'];
                    $description =$_POST['description'];
                    $id = $_POST['id_product'];
                    $_SESSION['status'] = "Update successfully";
                    Upload_Images($file_name);
                    Update_Data_Products($id_categories,$name_products,$file_name,$price,$id,$description);
                }
                $list_products = Load_All_Data_Products();
                include "../View/Admin/sweetalert.php";
                include "../View/Admin/products.php";
                break;

            case "topping":
                $list_topping = Load_All_Data_Topping();
                include "../View/Admin/topping.php";
                break;

            case "edit-topping":
                if(isset($_GET['id']) && $_GET['id']){
                    $id = $_GET['id'];
                    $list_one_data_topping = Load_One_Data_Topping($id);
                }

                include "../View/Admin/update-topping.php";
                break;

            case "update-topping":
                if(isset($_POST['submit']) && $_POST['submit']) {
                    $id = $_POST['id_topping'];
                    $name_topping = $_POST['name_topping'];
                    $price_topping =$_POST['price_topping'];
                    Update_Data_Topping($id, $name_topping,$price_topping);
                    $_SESSION['status'] = "Update successfully";
                    // $_SESSION['status_code'] = "success";
                }
                $list_topping = Load_All_Data_Topping();
                include "../View/Admin/topping.php";
                break;

            case "create-topping":
                    if(isset($_POST['submit']) && $_POST['submit']){
                        $name_topping = $_POST['name_topping'];
                        $price_topping =$_POST['price_topping'];
                        Add_Data_Topping($name_topping,$price_topping);
                    }
                    $list_topping = Load_All_Data_Topping();
                    include "../View/Admin/add-topping.php";
                    break;

            case "delete-topping":
                    if(isset($_GET['id']) && $_GET['id']){
                            $id = $_GET['id'];
                            Delete_Data_Topping($id);
                            $_SESSION['status'] = "Delete successfully";
                            // $_SESSION['status_code'] = "success";
                    }
                        $list_topping = Load_All_Data_Topping();
                        include "../View/Admin/topping.php";
                        break;

            case "statistic":
                include "../View/Admin/chart.php";
                break;
             case "order":
                 $list_bill = Load_All_Data_order();
                 include "../View/Admin/order.php";
                break;
            case "delete_order":
                if(isset($_GET['id']) && $_GET['id']){
                    $id = $_GET['id'];
                     Delete_Data_Order($id);
                     $_SESSION['status'] = "Delete successfully";
                        // $_SESSION['status_code'] = "success";
                    }
                    $list_bill = Load_All_Data_order();
                    include "../View/Admin/order.php";
                    break; 
                    case "edit_order":
                        if(isset($_GET['id']) && $_GET['id']){
                            $id = $_GET['id'];
                            $list_one_bill = Load_One_Data_Order($id);
                            Update_Data_Order($id);
                            $_SESSION['status'] = "Update successfully";
                            // $_SESSION['status_code'] = "success";
                        }
                        $list_bill = Load_All_Data_order();
                        include "../View/Admin/order.php";
                        break;
                   
                  
                    
        }
}else{
    // $list_data = Load_all();
    include "../View/Admin/dashboard.php";
}

?>