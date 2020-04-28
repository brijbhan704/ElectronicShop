<div class="container">
             <div class="col-xs-12 col-sm-12 col-md-6" id="card">
                <div class="card ">
                    <div class="card-body pb-0">
                        <p class="text-dark text-success"><strong>Total Number Of Products </strong></p>
                        <table class="table">
                            <tr>
                                <th>Product Name</th>
                                 <th>Product Company</th>
                                    <th>In Stock</th>
                            </tr>
                            <tr>
                            <?php //$status='Delivered';                                   
                    $rt = mysqli_query($con,"SELECT p.productName,p.productCompany FROM products p INNER JOIN subcategory s ON p.subCategory = s.id ");
                    while($data = mysqli_fetch_assoc($rt)){
                    $num1 = mysqli_num_rows($rt);
                    ?>
                         <!-- <h2 class="mb-0">
                            <span class="count text-warning"><?php //echo htmlentities($num1);?></span>
                        </h2> -->
                        
                        
                                <td><?php echo $data['productName'];?></td>
                                <td><?php echo $data['productCompany'];?></td>
                                <td><?php echo htmlentities($num1);?></td>
                            </tr>
                        <?php }?>
                        </table>
                        <div class="chart-wrapper px-0" style="height:100px;" height="">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
        </div>