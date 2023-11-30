<?php
  function Load_All_Data_order(){
    $sql = "SELECT * FROM `bill`";
    $list_bill = pdo_query($sql);
    return $list_bill;
}
function Delete_Data_Order($id){
    $sql = "DELETE FROM `bill` WHERE id_bill =".$id;
    pdo_query($sql);
  }
  function Load_One_Data_Order($id){
    $sql = "SELECT * FROM `bill` WHERE `id_bill`=".$id;
    $list_one_bill = pdo_query_one($sql);
    return $list_one_bill;
  }
  function Update_Data_Order($id){
    $sql = "UPDATE `bill` SET `status`= '1' WHERE `id_bill` = ".$id;
    pdo_query($sql);
  }
?>