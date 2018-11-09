<?php
	// 		class products
	// {
	// 	var $id;
	// 	var $quantity;
	// 	var $price;
	// 	var $name;
	// 	var $image;

	// }

	function generateRandomString($length = 10) {
		    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    		$charactersLength = strlen($characters);
    		$randomString = '';
    		for ($i = 0; $i < $length; $i++) {
        		$randomString .= $characters[rand(0, $charactersLength - 1)];
    		}
    		return $randomString;
	}

	function signUp(){
			require 'connect.php';

			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$email = $_POST['email'];
			$level = $_POST['level'];
			$department = $_POST['department'];
			$password = $_POST['password'];
			$matric_number = $_POST['matric-number'];

				$sql = "INSERT INTO users (matric_number, firstname, lastname, email, department, level, password, Reg_Date)
			VALUES ( '$matric_number','$firstname', '$lastname', '$email', '$department', '$level', '$password', now()) ";
				$result = mysqli_query($conn, $sql);

			if($result){
					echo "<script>window.open('login.php', '_self')</script>";
						}
				else{
					echo "<script>alert('Unsuccessful Registration')</script>";

				}


		}
function payOnline(){
	require 'connect.php';

	$matric_number = $_POST['matric_number'];
	$session = $_POST['session'];

	$sql = "INSERT INTO payments (user_matric, payment_date, session) VALUES ('$matric_number', now(), '$session')";
	$result = mysqli_query($conn, $sql);
	if($result){
			?>
				<script type="text/javascript">
						var handler = PaystackPop.setup({
							key: 'pk_test_c7dd5e846247461fa0423b50313b412107657ece',
							email: '<?php echo $_SESSION['email']; ?>',
							amount: 50000,
							metadata: {
								 custom_fields: [
										{
												display_name: "Mobile Number",
												variable_name: "mobile_number",
												value: "+2348012345678"
										}
								 ]
							},
							callback: function(response){
									alert('success. transaction ref is ' + response.reference);
									window.open('index.php', '_self');
							},
							onClose: function(){
									location.reload();

							}
						});
						handler.openIframe();
				</script>
			<?php
						echo "<script>window.open('process.php', '_self')</script>";
				}
		else{
			echo "<script>alert('Unsuccessful Payment')</script>";

		}

}
function signIn(){

			require 'connect.php';

			$matric_number =  mysqli_real_escape_string($conn, $_POST['matric_number']);
			$password = mysqli_real_escape_string($conn, $_POST['password']);

				$sql = "SELECT * FROM users WHERE matric_number = '$matric_number' AND password = '$password' ";

				$result = mysqli_query($conn, $sql);
				$check_user = mysqli_num_rows($result);

				if($check_user > 0){
					$row = mysqli_fetch_array($result);
					$_SESSION['login-status'] = true;
					$_SESSION['firstname'] = $row["firstname"];
					$_SESSION['email'] = $row["email"];
					$_SESSION['matric_number'] = $row["matric_number"];
					$_SESSION['id'] = $row["id"];
					echo "<script>window.open('index.php', '_self')</script>";
						}
				else{

					$_SESSION['login-status'] = false;

					?>
						<script type = 'text/javascript'>
							alert("Invalid Email or Password");
							// document.getElementById('alert').style.display = 'block';
		    			// 	document.getElementById('alert').innerHTML = 'Invalid Email or Password, Try Again';
						</script>
					<?php
				}
		}

function logOut(){
				session_destroy();
				header('location: index.php');

		}
function savePayment(){
	require 'connect.php';

		 $matric_number = $_POST['matric_number'];
		 $session = $_POST['session'];
		 $paymentID = generateRandomString();
		 $sql = "INSERT INTO payments (payment_id, user_matric, payment_date, session) VALUES ('$paymentID','$matric_number', now(), '$session')";
		 $result = mysqli_query($conn, $sql);
		 $_SESSION['payment_id'] = $paymentID;


}
?>
