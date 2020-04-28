<?php

//fetch_data.php
include('config.php');

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
			$output .= '
			<div class="col-sm-4 col-lg-3 col-md-3">
				<div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:300px;">

					<img src="admin/productimages'. $row['productImage1'] .''. $row['id'] .'" alt="" class="img-responsive" >
					<p align="center"><strong><a href="product-details.php?pid='. $row['id'] .'">'. $row['productName'] .'</a></strong></p>
					<h4 style="text-align:center;" class="text-danger" >'. $row['productPrice'] .'</h4>
					<p>
					Brand : '. $row['productCompany'] .' <br />
					
					
				</div>

			</div>
			';
		}
	}
	else
	{
		$output = '<h3>No Data Found</h3>';
	}
	echo $output;
}

?>