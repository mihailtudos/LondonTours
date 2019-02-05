<?php
	include_once 'header.php';
?>
<?php
 include_once 'chat_button.php';
?>
<style>
<?php include('css/style.css');?>
</style>

<section class="main_container">
	<div class="container-fluid text-center">
		<h2>Registration</h2>
	</div>

	<div class="container-fluid">
		<form class="sign-up-form" action="includes/signUp_include.php" method="POST" autocomplete="off">
			<img src="img/reg_img.jpg" alt="registration banner">
			<input type="text" name="firstName" placeholder="First name">
			<input type="text" name="secondName" placeholder="Second name">
			<input type="password" name="password" placeholder="password">
			<input type="email" name="email" placeholder="example@example.com">
			<input type="tel" name="phoneNumber" placeholder="0734121321">
			<input type="text" name="street" placeholder="first line address">
			<input type="text" name="city" placeholder="city">
			<input type="text" name="postcode" placeholder="post code">

			<button class="btn btn-primary" type="submit" name="submit">Sing up</button>
		</form>
	</div>

</section>

<?php
	include_once 'footer.php';
?>
