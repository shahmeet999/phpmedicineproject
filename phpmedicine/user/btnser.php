<form method="post">
<!--		<input type="text" value="" name="sercha" placeholder="Search for skin care products"  >
						<input type="submit" name="btnsera" value="SEARCH">
	-->

<input type="text" value="" style="width: 309px; height: 41px;" name="sercha" placeholder="Search for skin care products"  >
		<!--				<input type="submit" name="btnsera1" value="SEARCH">
-->
<button type="submit" style="background:#323A45; color:white; " name="btnsera" class="btn btn-default btn-lg">
  <span class="glyphicon glyphicon" aria-hidden="true"></span>Search
</button>			

	<?php
				if(isset($_POST["btnsera"]))
				{
					$_SESSION["ser"]=$_POST["sercha"];
					header('location:skin_ser.php');
				}
			
			?>
			
			</form>