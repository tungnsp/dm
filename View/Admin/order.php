<div class='dashboard-app'>
        <header class='dashboard-toolbar'><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a></header>
        <div class='dashboard-content'>
            <div class="container">
<div class="table-wrapper">
                <div class="table-title">
                <div class="row ">
                    <div class="col-sm-6">
                    <b style = "font-size:30px">QUẢN LÍ ĐƠN HÀNG</b>
                    </div>
                </div>
                </div>
                <table class="table table-striped table-hover">
                <thead>
                    <tr>
                    <th>ID hóa đơn </th>
                    <th>Tài Khoản</th>
                    <th>Tổng sản phẩm </th>
                    <th>Tên người nhận</th>
                    <th>Địa chỉ người nhận </th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Phương thức<th>
                    <th>Tổng tiền</th>
                    <th>Ngày tạo đơn </th>
                    <th>Trạng thái </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_bill as $value): extract($value)?>
                                <tr>
                                                    <td><?=$id_bill?></td>
                                                    <td><?=$id_user?></td>
                                                    <td><?=$total_name_product?></td>
                                                    <td><?=$name_receiver?></td>
                                                    <td><?=$address_delivery?></td>
                                                    <td><?=$phone_numnber?></td>
                                                    <td><?=$email?></td>
                                                    <td><?=$method?></td>
                                                    <td><?=$total_price?></td>
                                                    <td><?=$sub_total?></td>
                                                    <td><?=$date_created?></td>
                                                    
                                                    <td><?php if($status==0){
                                                        echo "Chờ xác nhận";

                                                    }else{
                                                        echo" Đã xác nhận";
                                                    }
                                                    ?></td>
                                                    
                                                    
                                                    <td>
                                                        <a href="../../../Dự_án_1/Controller/index-admin.php?request=edit_order&&id=<?=$id_bill?>" class="success" data-toggle="modal">
                                                           
                                                        <th><p>  Xác nhận đơn </p></th>
                                                        </a>
                                                        
                                                        <a href="../../../Dự_án_1/Controller/index-admin.php?request=delete_order&&id=<?=$id_bill?>" onclick = "return confirm('Bạn có muốn hủy không?')" class="delete" data-toggle="modal">
                                                        <th> <p>  hủy đơn </p></th>
                                                    </td>
                                                </tr>
                    <?php endforeach ?>
                </tbody>
                </table>
                
                    

            </div>
            </div>
</div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
