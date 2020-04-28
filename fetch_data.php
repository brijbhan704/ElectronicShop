<?php

//fetch_data.php
include('includes/config.php');

if(isset($_POST["action"]))
{
	
	$query =mysqli_query($con,"SELECT * FROM products WHERE category = '4'");
	
	if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
		{
		$min = $_POST["minimum_price"];
		$max = $_POST["maximum_price"];
	$query =mysqli_query($con,"SELECT * FROM Products WHERE productPrice BETWEEN $min AND $max");
	/*echo $query1
		$query .= "
		 AND productPrice BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
		";*/
	}
	if(isset($_POST["brand"]))
	{
		$brand =implode(',',$_POST["brand"]);
		//echo $brand;die;
	$query =mysqli_query($con,"SELECT * FROM products WHERE productCompany IN ('$brand')");


		/*$brand_filter = implode("','", $_POST["brand"]);
		
		$query .= " AND productCompany IN('".$brand_filter."')";*/


		//echo $brand_filter;die;
	}
	/*if(isset($_POST["ram"]))
	{
		$ram_filter = implode("','", $_POST["ram"]);
		$query .= "
		 AND product_ram IN('".$ram_filter."')
		";
	}
	if(isset($_POST["storage"]))
	{
		$storage_filter = implode("','", $_POST["storage"]);
		$query .= "
		 AND product_storage IN('".$storage_filter."')
		";
	}*/
	$total_row = mysqli_num_rows($query);
	$output = '';
	if($total_row > 0)
	{
		while($row =mysqli_fetch_array($query))
		{
			?>
			<div class="col-md-3">
				<div style="/*border:1px solid #ccc; border-radius:5px;*/ padding:16px; margin-bottom:16px; height:350px;">

			<div class="image hovereffect text-center">
				<a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><img  src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>"   width="100" height="200" ></a>
			</div><!-- /.image -->	

		<div class="product-info text-center">
			<h5 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a></h5>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">	
			<span class="price">
					Rs .<?php echo htmlentities($row['productPrice']);?>			</span>
											
			</div>		
			</div>

			<div class="cart clearfix animate-effect">
					<div class="action">
						<ul class="list-unstyled">
						<li class="add-cart-button btn-group">
							
							<a href="category.php?page=product&action=add&id=<?php echo $row['id']; ?>">
							<button class="btn btn-primary" style="margin-left: 13px; margin-top: 20px;" type="button">Add to cart</button>	</a>

							<a class="add-to-cart" style="font-size: 20px; margin-top: 20px;" href="category.php?pid=<?php echo htmlentities($row['id'])?>&&action=wishlist" title="Wishlist">
								 <i class="icon fa fa-heart" ></i>
							</a>										
						</li>                   
		                
					</ul>
				</div>
			</div>
					
				</div>

			</div>
			<?php
		}
	}
	else
	{
		echo'<h3>No Data Found</h3>';
	}
	
}

?>

