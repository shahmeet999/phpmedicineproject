<form method="post">
		<input type="text" value="" style="width: 309px; height: 41px;" name="sercha1" placeholder="Search for Injections"  >
		<!--				<input type="submit" name="btnsera1" value="SEARCH">
-->
<button type="submit" style="background:#323A45; color:white; " name="btnsera1" class="btn btn-default btn-lg">
  <span class="glyphicon glyphicon" aria-hidden="true"></span>Search
</button>						
						<?php
				if(isset($_POST["btnsera1"]))
				{
					$_SESSION["sermain3"]=$_POST["sercha1"];
					header('location:inj_ser.php');
				}
			
			?>
			
			</form>