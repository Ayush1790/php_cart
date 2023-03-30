<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html>

<head>
	<title>
		Products
	</title>
	<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>

<body>
	<?php
	//including header file
	include 'header.php';
	?>
	<div id="main">
		<div id="products">
			<?php
			// displaying the array dynamically
			include 'config.php';
			foreach ($products as $productkey => $productvalue) {
				echo "<div id='product-$productvalue[id]' class='product'><img src='$productvalue[img]'>
				<h3 class='title'><a href='#'> $productvalue[name]</a></h3>
				<span>Price: $$productvalue[price]</span>
				<form action='#' method ='POST'></input>
				<input type='hidden' name='id' value='$productvalue[id]'>
				<input type='hidden' name='name' value='$productvalue[name]'>
				<input type='hidden' name='img' value='$productvalue[img]'>
				<input type='hidden' name='price' value='$productvalue[price]'>
				<input type='submit' class='add-to-cart' value='Add to Cart' name='submit'></form>
				</div>";
			}
			// checking the cart array is created or not
			if (!isset($_SESSION['cart'])) {
				$_SESSION['cart'] = array();
			}
			// adding or updating the data in cart
			if (isset($_POST['submit'])) {
				$count = 0;
				foreach ($_SESSION['cart'] as $key => $value) {
					if ($value[0] == $_POST["id"]) {
						$_SESSION['cart'][$key][4] = $value[4] + 1;
						$count = 1;
						break;
					}
				}
				if ($count != 1) {
					array_push($_SESSION['cart'], [$_POST["id"], $_POST["name"], $_POST["img"], $_POST["price"], 1]);
				}
				unset($_POST['submit']);
			}
			?>
		</div>
	</div>
	<!-- displaying the data of cart -->
	<?php
	echo "<div id='display'><table class='display__table'><h1>Cart List</h1><br><thead><tr?><th>Image</th><th>Id</th>
	<th>Name</th><th>Price</th><th>Selected Item</th><th>Action</th></tr></thead>";
	echo "<tbody>";
	$total = 0;
	foreach ($_SESSION['cart'] as $key => $value) {
		echo "<tr><td><image src='./$value[2]'</td><td>$value[0]</td><td>$value[1]</td><td>$value[3]</td><td>$value[4]</td>
		<td><a href=delete.php?delid=$value[0]>X</a></td></tr>";
		$total += $value[3] * $value[4];
	}
	echo "</tbody></table><h1>Total=$total</h1></div>";
	?>
</body>

</html>
<?php
// including footer file
include 'footer.php';
?>