
<?php 

include('config.php');
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Product filter in php</title>
      <script src="cdn/jquery-1.10.2.min.js"></script>
    <script src="cdn/jquery-ui.js"></script>
    <script src="cdn/bootstrap.min.js"></script>
    <link rel="stylesheet" href="cdn/bootstrap.min.css">
    <link href = "cdn/jquery-ui.css" rel = "stylesheet">
    <!-- Custom CSS -->
    <link href="cdn/style.css" rel="stylesheet">
    
</head>
<body>
    <div class="container">
        <div class="row">     
            <div class="col-md-3">
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
           
</body>
</html>