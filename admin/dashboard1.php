<?php
//electronic_shop@123!
// Admin@123
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
    date_default_timezone_set('Asia/Kolkata');// change according timezone
    $currentTime = date( 'd-m-Y h:i:s A', time () );
?>
<!DOCTYPE html>
<html lclass="no-js" lang="en">
<head>

    <link rel="apple-touch-icon" href="apple-icon.png">
   

   <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin| Dashboard</title>
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <!--  <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet"> -->
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <!-- <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'> -->
</head>
<body>
<?php include_once('include/header.php');?>
    <?php include_once('include/sidebar.php');?>
   <!--  Start Orders -->
 <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="card text-white bg-flat-4">
                    <div class="card-body pb-0">
                        
                            <?php $query=mysqli_query($con,"select * from orders");
                            //$data = mysqli_fetch_assoc($query);
                            $num = mysqli_num_rows($query);
                            //echo $num;die;

                             ?>
                        <h2 class="mb-0">
                            <span class="count text-primary"><?php echo $num;?></span>
                        </h2>
                        <p class="text-dark text-success"><strong>Total Number of Orders</strong></p>
                        <div class="chart-wrapper px-0" style="height:40px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
<!-- End Total Orders -->
<!-- start total users -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="card text-white bg-light-blue ">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="manage-computer.php">Action</a>
                                    
                                </div>
                            </div>
                        </div>
                        <?php   
                       
                         $result = mysqli_query($con,"SELECT * FROM users");
                        $num_rows2 = mysqli_num_rows($result);
                        {
                            
                         ?>
                        <h2 class="mb-0">
                            <span class="count text-success"><?php echo htmlentities($num_rows2);?></span>
                            <?php } ?>
                        </h2>
                        <p class="text-dark"><strong><a href="manage-users.php"
                            >Toatal Numbers Of User's</a></strong></p>

                        <div class="chart-wrapper px-0" style="height:40px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
<!-- End Users -->

                <!-- start total users log in log -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="card text-black ">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="manage-computer.php">Action</a>
                                    
                                </div>
                            </div>
                        </div>
                        <?php   
                       
                         $result = mysqli_query($con,"SELECT * FROM userlog");
                        $num_rows3 = mysqli_num_rows($result);
                        {
                            
                         ?>
                        <h2 class="mb-0">
                            <span class="count text-info"><?php echo htmlentities($num_rows3);?></span>
                            <?php } ?>
                        </h2>
                        <p class="text-dark text-success"><strong><a href="user-logs.php"
                            >Toatl Numbers Of User Login Log</a></strong></p>

                        <div class="chart-wrapper px-0" style="height:40px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
<!-- End Users log in log -->
    <!--  Start Todays Orders -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="card text-black ">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="manage-computer.php">Action</a>
                                    
                                </div>
                            </div>
                        </div>
                <?php   
                       $f1="00:00:00";
                        $from=date('Y-m-d')." ".$f1;
                        $t1="23:59:59";
                        $to=date('Y-m-d')." ".$t1;
                         $result = mysqli_query($con,"SELECT * FROM Orders where orderDate Between '$from' and '$to'");
                        $num_rows1 = mysqli_num_rows($result);
                        {
                            
                        ?>
                        <h2 class="mb-0">
                            <span class="count text-warning"><?php echo htmlentities($num_rows1);?></span>
                            <?php } ?>
                        </h2>
                        <p class="text-dark text-success"><strong><a href="todays-orders.php"
                            >Today's Orders</a></strong></p>

                        <div class="chart-wrapper px-0" style="height:40px;" height="70">
                            <!-- <canvas id="widgetChart2"></canvas> -->
                        </div>

                    </div>
                </div>
            </div>
            <!--  End Todays Orders -->
            <!--  Start Pending Orders -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="card text-black ">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="manage-computer.php">Action</a>
                                    
                                </div>
                            </div>
                        </div>
                        <?php   
                        $status='Delivered';                                     
                    $ret = mysqli_query($con,"SELECT * FROM Orders where orderStatus!='$status' || orderStatus is null ");
                    $num = mysqli_num_rows($ret);
                            
                     ?>
                        <h2 class="mb-0">
                            <span class="count text-secondary"><?php echo htmlentities($num);?></span>
                        </h2>
                        <p class="text-dark text-success"><strong><a href="pending-orders.php"
                            >Total Pending Orders</a></strong></p>

                        <div class="chart-wrapper px-0" style="height:40px;" height="70">
                           <!--  <canvas id="widgetChart2"></canvas> -->
                        </div>

                    </div>
                </div>
            </div>
<!--  ENd Pending Orders -->
<!--  Start Toatl Deliverd -->
             <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="card text-black ">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="manage-computer.php">Action</a>
                                    
                                </div>
                            </div>
                        </div>
                            <?php $status='Delivered';                                   
                    $rt = mysqli_query($con,"SELECT * FROM Orders where orderStatus='$status'");
                    $num1 = mysqli_num_rows($rt);
                         ?>
                        <h2 class="mb-0">
                            <span class="count text-primary"><?php echo htmlentities($num1);?></span>
                        </h2>
                        <p class="text-dark text-success"><strong><a href="delivered-orders.php"
                            >Total Deliverd Orders</a></strong></p>

                        <div class="chart-wrapper px-0" style="height:40px;" height="70">
                            <!-- <canvas id="widgetChart2"></canvas> -->
                        </div>

                    </div>
                </div>
            </div>
<!--  Start Toatl Deliverd -->
<!--  Start Product Category -->
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="card text-black ">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="manage-computer.php">Action</a>
                                    
                                </div>
                            </div>
                        </div>
                            <?php $status='Delivered';                                   
                    $rt = mysqli_query($con,"SELECT * FROM category");
                    $num1 = mysqli_num_rows($rt);
                    ?>
                        <h2 class="mb-0">
                            <span class="count text-danger"><?php echo htmlentities($num1);?></span>
                        </h2>
                        <p class="text-dark text-success"><strong>Total Active Users</strong></p>

                        <div class="chart-wrapper px-0" style="height:40px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
<!--  End Product Category -->
<!--  Start sub category -->
              <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="card text-black ">
                    <div class="card-body pb-0">
                        
                            <?php $status='in Process';                                   
                            $rt = mysqli_query($con,"SELECT * FROM orders where orderStatus='$status'");
                            $num11 = mysqli_num_rows($rt);
                            ?>
                        <h2 class="mb-0">
                            <span class="count text-warning"><?php echo htmlentities($num11);?></span>
                        </h2>
                        <p class="text-dark text-success"><strong>Open Orders</strong></p>

                        <div class="chart-wrapper px-0" style="height:40px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
           <!--  end sub category -->

           <!--  Start sub category and its stock -->
           
            <div class="container">
             <div class="col-xs-12 col-sm-12 col-md-6" id="card">
                <div class="card ">
                    <div class="card-body pb-0">
                        <p class="text-dark text-success text-center"><strong>Total Number Of Products </strong></p>
                        <table class="table">
                            <tr>
                                 <th>Product Name</th> 
                                 <th class="pull-right">In Stock</th>
                            </tr>
                            <tr>
                            <?php //$status='Delivered'; 
                            /*$id = mysqli_query($con,"SELECT count(*) FROM products WHERE subCategory=6");
                            $num1 = mysqli_num_rows($id) ;  
                            echo $num1;die;*/
                            $rt = mysqli_query($con,"SELECT * FROM products p INNER JOIN subcategory s ON p.subCategory = s.id ");
                            $num1 = mysqli_num_rows($rt) ;     
                            //echo $num1;die;                            
                    $rt = mysqli_query($con,"SELECT subcategory FROM subcategory");
                   while($data = mysqli_fetch_assoc($rt)){
                    //$num1 = mysqli_num_rows($rt)
                    ?>
                         <!-- <h2 class="mb-0">
                            <span class="count text-warning"><?php //echo htmlentities($num1);?></span>
                        </h2> -->
                                <!-- <td><?php //echo $data['productName'];?></td> -->
                                <td><?php echo $data['subcategory'];?></td>
                                <td><b class="label pull-right"><span class="count text-white"><?php echo htmlentities($num1);?></span></b></td>
                            </tr>
                        <?php }?>
                        <tr><td></td><td><a href="manage-products.php"><button class="btn btn-success text-center" name="submit">Show Details</button></a></td></tr>
                        </table>

                        <div class="chart-wrapper px-0" style="height:0px;" height="">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
            <!--  Start sub category -->
              <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="card text-black ">
                    <div class="card-body pb-0">
                        
                            <?php $status='in Process';                                   
                            $rt = mysqli_query($con,"SELECT * FROM orders where orderStatus='$status'");
                            $num11 = mysqli_num_rows($rt);
                            ?>
                       <!--  <h2 class="mb-0">
                            <span class="count text-warning"><?php //echo htmlentities($num11);?></span>
                        </h2> -->
                        <!-- Example single danger button -->
                            <div class="col-sm-12">
                        <select class=" test" name="gender">
                      <option value=""> Total Orders In One Day</option>
                       <option value="Male">Total Orders In Seven Days</option>
                        <option value="Female">Total Orders In Thirty Days</option>
                      </select>
                    
                    </div>  
                              
                            </div>
                            <table class="table">
                            <tr>
                                 <th>Product Name</th> 
                                 <th class="pull-right"></th>
                            </tr>
                        </table>
                        <div class="chart-wrapper px-0" style="height:70px; max-width:40%;">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
           <!--  end sub category -->
        </div>


           <!--  end sub category and its stock -->
   <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
     <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
    <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    
   <?php }?> 
</body>
</html>
