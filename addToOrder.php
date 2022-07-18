<?php 
                                $employee_id = $_POST['user_id'];
                                $supplier_id = $_POST['supplier_id'];
                                $product_id = $_POST['txtID'];
                                $txtProductName = $_POST['txtProductName'];
                                $txtProductType = $_POST['txtProductType'];
                                $txtAmount = $_POST['txtAmount'];
                                date_default_timezone_set("Asia/Bangkok");
                                $order_date = date("Y-m-d H:i:s");
                                $purchase = "INSERT INTO tb_orderproduct (supplier_id ,employee_id ,order_date, status) VALUES ($supplier_id ,$employee_id ,'$order_date', 0)";
                                $save = mysqli_query($conn, $purchase);
                                $data = "SELECT order_id FROM tb_orderproduct ORDER BY order_id DESC";
                                $drag = mysqli_query($conn, $data);
                                $fetch = mysqli_fetch_array($drag);
                                $order_id = $fetch['order_id'];
                                foreach ($txtProductName as $key => $value) {
                                    $insert = "INSERT INTO tb_orderproduct_detail (order_id, product_id ,product_name, product_type, amount) VALUES ('" . $order_id . "', '" . $product_id[$key] . "','" . $txtProductName[$key] . "', '" . $txtProductType[$key] . "', '" . $txtAmount[$key] . "')";
                                    $add = mysqli_query($conn, $insert);
                                }
                                if ($purchase && $insert) {
                                    echo "<script>alert('Success')
                                    location.href='orderProduct.php';</script>";
                                } ?>
                                <td valign=middle class="text-center"><?php echo $i ?></td>
                                                    <td valign=middle class="text-center"><?php echo $f['product_id'] ?></td>
                                                    <td valign=middle class="text-center"><?php echo $f['product_name'] ?></td>
                                                    <td valign=middle class="text-center"><?php echo $f['product_type'] ?></td>
                                                    <td valign=middle class="text-center"><input type="number" min="1" max="99"></td>   
