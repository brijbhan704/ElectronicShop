
<?php 

include('includes/config.php');
?>
<html>
<head>
    
    <title>Product filter in php</title>
    <script src="cdn/jquery-1.10.2.min.js"></script>
    <script src="cdn/jquery-ui.js"></script>
    <script src="cdn/bootstrap.min.js"></script>
    <link rel="stylesheet" href="cdn/bootstrap.min.css">
    <link href = "cdn/jquery-ui.css" rel = "stylesheet">
    <meta charset="utf-8">

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="keywords" content="">
        <meta name="robots" content="all">

        <title>Product Category</title>

        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        
        <!-- Customizable CSS -->
        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" href="assets/css/green.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.css">
        <link rel="stylesheet" href="assets/css/owl.transitions.css">
        <!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
        <link href="assets/css/lightbox.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/animate.min.css">
        <link rel="stylesheet" href="assets/css/rateit.css">
        <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

        <!-- Demo Purpose Only. Should be removed in production -->
        <link rel="stylesheet" href="assets/css/config.css">

        <link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
        <link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
        <link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
        <link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
        <link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
        <!-- Demo Purpose Only. Should be removed in production : END -->

        
        <!-- Icons/Glyphs -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!-- Fonts --> 
        <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
        
        <!-- Favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
<style type="text/css">
.hovereffect:hover img { 
  filter: grayscale(1);
  -webkit-filter: grayscale(1);
  -webkit-transform: scale(1);
  -ms-transform: scale(0.9);
  transform: scale(0.9);
  -webkit-transition: all 0.4s ease-in;
  transition: all 0.4s ease-in;
}
</style>
</head>
<body>
<header class="header-style-1">
<?php include('includes/menu-bar.php');?>
    <?php //include('includes/top-header.php');?>
</header>
    <div class="container">
        <div class="row">     
            <div class="col-md-3" style="width: 24%!important;">
            <h4>FILTER</h4> 
    <div class="list-group">
     <h5>Price</h5>
     <input type="hidden" id="hidden_minimum_price" value="0"/>
                <input type="hidden" id="hidden_maximum_price" value="65000" />
                    <p id="price_show">1000 - 65000</p>
                    <div id="price_range"></div>
                </div>    
                <div class="list-group">
     <h5>Brand</h5>
      <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">

                <?php
                    //$status = 'In Stock';
                    $query = mysqli_query($con,"SELECT DISTINCT(productCompany) FROM products ORDER BY id DESC");
                  while($result = mysqli_fetch_assoc($query))                      
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector brand" value="<?php echo $result['productCompany']; ?>"  > <?php echo $result['productCompany']; ?></label>
                    </div>



                    <?php
                    }

                    ?>
                </div>
                </div>
            </div>
                <div class="row filter_data">

                </div>
            </div>
        </div>
<?php include('includes/brands-slider.php');?>
<?php include('includes/footer.php');?>
        <style>
        #loading
        {
        text-align:center; 
        background: url('loader.gif') no-repeat center; 
        height: 150px;
            }
        </style>

        <script>

$(document).ready(function(){

    filter_data();

    function filter_data()
    {

        $('.filter_data').html('<div id="loading" style="" ></div>');

        var action = 'fetch_data';

        var minimum_price = $('#hidden_minimum_price').val();

        var maximum_price = $('#hidden_maximum_price').val();

        var brand = get_filter('brand');

        /*var ram = get_filter('ram');
        var storage = get_filter('storage');*/
        $.ajax({
            url:"fetch_data.php",
            method:"POST",
            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, brand:brand /*, ram:ram, storage:storage*/},
            success:function(data){
                
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

    $('#price_range').slider({
        range:true,
        min:1000,
        max:65000,
        values:[1000, 65000],
        step:500,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });

});
</script>
  
    <script src="assets/js/bootstrap.min.js"></script>
    
    <script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    
    <script src="assets/js/echo.min.js"></script>
    <script src="assets/js/jquery.easing-1.3.min.js"></script>
    <script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>
</html>