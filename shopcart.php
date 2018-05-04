
<div class="row">
	<div class="col-md-3">
		<?php ?>
		<form method="post" action = <?php echo 
Uri::create('federation/shopcart')?>>
       
		<label for="id">Travel Brochures:</label>
		<select id="brochure" name="Brochure"> </select> <br>
	
		<label for="id">Quantity:</label>
		<input type="text"  name="Quantity" value = "0" > <br>

		<label for="id">Name:</label>
		<input type="text"  name="Name"> <br>

		<label for="id">Email:</label>
	        <input id="emailAddress" type="email" name ="emailAdd" required> <br>
	
		<input type ="submit" value ="Order" name ="Order" >
       
		</form>

		<?php ?>

	</div>
</div>
