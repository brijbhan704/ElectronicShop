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
   <!--  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> -->
   <!--  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css
    ">
    <style>
        .my-card
            {
            position:absolute;
            left:40%;
            top:-20px;
            border-radius:50%;
                }
                #box{
                    margin-top: 30px;
                }
        </style>
</head>
<body>
<?php include_once('include/header.php');?>
    <?php include_once('include/sidebar.php');?>
   <!--  Start Orders -->

        
                
<div class="row w-80">
        <div class="col-md-3">
            <div class="card border shadow mx-sm-1 p-3">
                <?php $query=mysqli_query($con,"select * from orders");
                            $num = mysqli_num_rows($query);
                             ?>
                <div class="text-info text-center mt-3"><h1><span class="count text-primary"><?php echo $num;?></span></h1></div>
                <div class="text-info text-center mt-2"><h5>Total Number of Orders</h5></div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border shadow mx-sm-1 p-3">
                 <?php 
                         $result = mysqli_query($con,"SELECT * FROM users");
                        $num_rows2 = mysqli_num_rows($result);
                        {
                             ?>
                <!-- <div class="card border-success shadow text-success p-3 my-card"><span class="fa fa-eye" aria-hidden="true"></span></div> -->
                <div class="text-success text-center mt-3"><h1><span class="count text-warning"><?php echo $num_rows2;?></span></h1></div><?php } ?>
                <div class="text-success text-center mt-2"><h5>Total Number of Users</h5></div>
            </div>
        </div>

         <div class="col-md-3">
            <div class="card border shadow mx-sm-1 p-3">
                <?php $result = mysqli_query($con,"SELECT * FROM userlog");
                        $num_rows3 = mysqli_num_rows($result);
                        {
                ?>
                <!-- <div class="card border-danger shadow text-danger p-3 my-card" ><span class="fa fa-heart" aria-hidden="true"></span></div> -->
                <div class="text-danger text-center mt-3"><h1><span class="count text-danger"><?php echo $num_rows3;?></span></h1></div>
            <?php }?>
                <div class="text-danger text-center mt-2"><h5> User Login Log</h5></div>
            </div>
        </div>

        <div class="col-md-3" id="box">
            <div class="card border shadow mx-sm-1 p-3">
                <!-- <div class="card border-warning shadow text-warning p-3 my-card" ><span class="fa fa-inbox" aria-hidden="true"></span></div> -->
                 <?php   
                       $f1="00:00:00";
                        $from=date('Y-m-d')." ".$f1;
                        $t1="23:59:59";
                        $to=date('Y-m-d')." ".$t1;
                         $result = mysqli_query($con,"SELECT * FROM Orders where orderDate Between '$from' and '$to'");
                        $num_rows1 = mysqli_num_rows($result);
                        {
                            
                        ?> 
                <div class="text-warning text-center mt-3"><h1><span class="count text-success"><?php echo htmlentities($num_rows1);?></span>
                            </h1></div><?php } ?>
               
                <div class="text-warning text-center mt-2"><h5>Today's Orders</h5></div>
            </div>
        </div>
        
            <div class="col-md-3" id="box">
            <div class="card border shadow mx-sm-1 p-3">
                <!-- <div class="card border-info shadow text-warning p-3 my-card" ><span class="fa fa-inbox" aria-hidden="true"></span></div> -->
                <?php   
                        $status='Delivered';                                     
                    $ret = mysqli_query($con,"SELECT * FROM Orders where orderStatus!='$status' || orderStatus is null ");
                    $num = mysqli_num_rows($ret);
                            
                     ?>
                <div class="text-warning text-center mt-3"><h1><span class="count text-dark"><?php echo htmlentities($num);?></span></h1></div>
                <div class="text-warning text-center mt-2"><h5>Total Pending Orders</h5></div>
            </div>
        </div>

        <div class="col-md-3" id="box">
            <div class="card border shadow mx-sm-1 p-3">
                <!-- <div class="card border-dark shadow text-warning p-3 my-card" ><span class="fa fa-inbox" aria-hidden="true"></span></div> -->
                <?php $status='Delivered';                                   
                    $rt = mysqli_query($con,"SELECT * FROM Orders where orderStatus='$status'");
                    $num1 = mysqli_num_rows($rt);
                         ?>
                <div class="text-warning text-center mt-3"><h1><span class="count text-primary"><?php echo htmlentities($num1);?></span></h1></div>
                <div class="text-warning text-center mt-2"><h5>Total Deliverd Orders</h5></div>
            </div>
        </div>

        <div class="col-md-3" id="box">
            <div class="card border shadow mx-sm-1 p-3">
                <!-- <div class="card border-info shadow text-warning p-3 my-card" ><span class="fa fa-inbox" aria-hidden="true"></span></div> -->
                <?php $status='Delivered';                                   
                    $rt = mysqli_query($con,"SELECT * FROM category");
                    $num1 = mysqli_num_rows($rt);
                    ?>
                <div class="text-warning text-center mt-3"><h1><span class="count text-danger"><?php echo htmlentities($num1);?></span></h1></div>
                <div class="text-warning text-center mt-2"><h5>Total Active Users</h5></div>
            </div>
        </div>

        <div class="col-md-3" id="box">
            <div class="card border shadow mx-sm-1 p-3">
               
                            <?php $status='in Process';                                   
                            $rt = mysqli_query($con,"SELECT * FROM orders where orderStatus='$status'");
                            $num11 = mysqli_num_rows($rt);
                            ?>
                <div class="text-warning text-center mt-3"><h1><span class="count text-info"><?php echo htmlentities($num11);?></span></h1></div>
                <div class="text-warning text-center mt-2"><h5>Open Orders</h5></div>
            </div>
        </div>

        <div class="col-md-3" id="box">
            <div class="card border shadow mx-sm-1 p-3">
                <!-- <div class="card border-warning shadow text-warning p-3 my-card" ><span class="fa fa-inbox" aria-hidden="true"></span></div> -->
                <div class="text-warning text-center mt-3"><h1><span class="count text-success"><?php ?></span></h1></div>
                <div class="text-warning text-center mt-2"><h5>Add New Text</h5></div>
            </div>
        </div>


        <div class="col-md-5" id="box">
            <div class="card border shadow mx-sm-1 p-3">
                <div class="card border-warning shadow text-warning p-3 my-card" ><span class="fa fa-inbox" aria-hidden="true"></span></div> 
                <div class="text-warning text-center mt-3"><h1></h1></div>
                <div class="text-warning text-center mt-2" style="padding-bottom: 20px;"><h5>Add New Text</h5></div>
                
            </div>
        </div>

        <div class="col-md-5" id="box">
            <div class="card border shadow mx-sm-1 p-3">
                <div class="card border-warning shadow text-warning p-3 my-card" ><span class="fa fa-inbox" aria-hidden="true"></span></div> 
                <div class="text-warning text-center mt-3"><h1></h1></div>
                <div class="text-warning text-center mt-2"><h5>Add New Text here</h5></div>
                
            </div>
        </div>

        </div>
     </div>

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