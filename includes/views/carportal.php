<?php
global $title;
echo '<div class="wrap">';
	echo "<h1>$title</h1>";
echo "</div>";
?>
<br>
<?php settings_errors(); 

if(isset($_POST["submit"])){

		update_option( 'interestNewCar', $_POST["interestNewCar"]);
		update_option( 'interestOldCar', $_POST["interestOldCar"]);
		update_option( 'interestTrans', $_POST["interestTrans"]);
		update_option( 'onetimeFee', $_POST["onetimeFee"]);
		update_option( 'adminFee', $_POST["adminFee"]);
	}

?>

<form method="post" action="">
<?php settings_fields("finance-settings-group"); ?>
<?php do_settings_sections("car-portal"); ?>
<?php submit_button(); ?>
</form>
