<div class="header-nav animate-dropdown">
    <div class="container-fluid">  
    <div class="row">   
        <div class="yamm navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!--Start LOGO -->
            <div class="col-xs-12"> 
            <div class="col-md-6">               
            <div class="logo">
                <a href="index.php">                 
                    <h2>LOGO</h2>
                </a>
            </div> 
            </div>     
            <div class=" col-md-6 nav-bg-class">
            <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
    	   <div class="nav-outer">
    		<ul class="nav navbar-nav">	
            <?php $sql=mysqli_query($con,"select id,categoryName  from category limit 6");
            while($row=mysqli_fetch_array($sql))
            {
            ?>
        	<li class="dropdown yamm">
        	<a href="side-menu.php?cid=<?php echo $row['id'];?>"> <?php echo $row['categoryName'];?></a>  		
        	</li>
            <li class="active dropdown yamm-fw">
            <a href="index.php" data-hover="dropdown" class="dropdown-toggle">Home</a>                 
            </li>
        	<?php } ?>     			
        	</ul><!-- /.navbar-nav -->
        		<div class="clearfix"></div>				
        	</div>
        </div>
     </div>
</div>
</div>
</div>
 </div>
</div>