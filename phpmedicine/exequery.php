<?php 

?>
<div class="products">
	   		     	<h5 class="latest-product">LATEST PRODUCTS</h5>	
	   		     	  <a class="view-all" href="product.html">VIEW ALL<span> </span></a> 		     
	   		     </div>
<div class="panel panel-default">
  <div class="panel-body">
    <div class="row">
					
	
	 <?php 
 // include 'database.php';
//$res=new database();
//$con=$res->connection();  


//$cnt=$res->companybyid($_REQUEST["id"],$con);

$id=$_REQUEST["id"];
$obj=new database();
$res=$obj->companybyid($id);
//$con=mysql_connect('localhost','root','');
  //  mysql_select_db('medicine',$con);
    
	//$res=mysql_query("select * from product_tbl where company_id='$id'");

//$cnt=mysql_query("select p.*,c.cat_name from pro_tbl as p,cat as c where p.fk_cat_id=c.cat_id",$con);


  while($row=mysql_fetch_assoc($res))
  {
	
 echo' <div class="col-sm-6 col-md-4">';
   echo  '<div class="thumbnail">';
     echo ' <img src="http://localhost:3000'.$row["product_img"].'"  style="height: 145px;"></img>';
 echo    '<div class="caption">
        <h3>'.$row["product_name"].'</h3>
  <h3>'.$row["product_price"].'</h3>
               
        <p><a href="single.php?id='.$row["product_id"].'"><button type="button" style="width: 200px;" name="btnbuy" class="btn btn-default btn-lg">
  <span class="glyphicon glyphicon-buy" aria-hidden="true"></span> Preview
</button></a>
<a href="login.php"><button type="button" style="width: 200px; background:#323A45; color:white; " name="btncar" class="btn btn-default btn-lg">
  <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Add to cart
</button></a>
</p>

	<div class="star-price">
	   		     				<div class="dolor-grid"> 
		   		     				  <span class="rating">
									        <input type="radio" class="rating-input" id="rating-input-1-5" name="rating-input-1">
									        <label for="rating-input-1-5" class="rating-star1"> </label>
									        <input type="radio" class="rating-input" id="rating-input-1-4" name="rating-input-1">
									        <label for="rating-input-1-4" class="rating-star1"> </label>
									        <input type="radio" class="rating-input" id="rating-input-1-3" name="rating-input-1">
									        <label for="rating-input-1-3" class="rating-star"> </label>
									        <input type="radio" class="rating-input" id="rating-input-1-2" name="rating-input-1">
									        <label for="rating-input-1-2" class="rating-star"> </label>
									        <input type="radio" class="rating-input" id="rating-input-1-1" name="rating-input-1">
									        <label for="rating-input-1-1" class="rating-star"> </label>
							    	   </span>
	   		     				</div>
	   		     		</div>
      </div>
    </div>
  </div>
  ';  
	  
  }
 
	?>
	
			
</div>
</div>
</div>
