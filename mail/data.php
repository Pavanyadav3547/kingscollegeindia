<?php
define('HOST','localhost');
define('USERNAME', 'root');
define('PASSWORD','');
define('DB','kingscollege');

$con = mysqli_connect(HOST,USERNAME,PASSWORD,DB);
// Fetching Values From URL
$name = $_POST['name'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$address = $_POST['address'];


$sql ="insert into userdata(name, gender, phone, email, dob , address) values ('$name', '$gender','$phone','$email','$dob','$address')" ;//Insert Query
echo "Form Submitted successfully";


if(mysqli_query($con, $sql)){
    echo 'success';
}

//if(isset($_POST["submit"]))
//{
//    $open_positions = '';
//    foreach($_POST["$open_positions"] as $row)
//    {
//        $open_positions .= $row . ', ';
//    }
//    $open_positions = substr($open_positions, 0, -2);
//    $path = 'upload/' . $_FILES["resume"]["name"];
//    move_uploaded_file($_FILES["resume"]["tmp_name"], $path);
$message = '
		<h3 align="center">Lead Details</h3>
		<table border="1" width="100%" cellpadding="5" cellspacing="5">
			<tr>
				<td width="30%">Name</td>
				<td width="70%">'.$_POST["name"].'</td>
			</tr>
			<tr>
				<td width="30%">Gender</td>
				<td width="70%">'.$_POST["gender"].'</td>
			</tr>
			<tr>
				<td width="30%">Phone No</td>
				<td width="70%">'.$_POST["phone"].'</td>
			</tr>
			<tr>
				<td width="30%">Email Address</td>
				<td width="70%">'.$_POST["email"].'</td>
			</tr>
			<tr>
				<td width="30%">DOB</td>
				<td width="70%">'.$_POST["dob"].'</td>
			</tr>
			<tr>
				<td width="30%">Address</td>
				<td width="70%">'.$_POST["address"].'</td>
			</tr>
			
			
			
		</table>
	';

require("class.phpmailer.php");

$mail = new PHPMailer();

$mail->IsSMTP();
$mail->Host = "nrkcrafted.com";
$mail->SMTPAuth = true;
//$mail->SMTPSecure = "ssl";
$mail->Port = 587;
$mail->Username = "hello@nrkcrafted.com";
$mail->Password = "nrkcrafted@socio123";

$mail->From = "hello@nrkcrafted.com";
$mail->FromName = "New Lead";
$mail->AddAddress("pavan@sociowash.com");
//$mail->AddReplyTo("mail@mail.com");

$mail->IsHTML(true);							//Sets message type to HTML
$mail->AddAttachment($path);					//Adds an attachment from a path on the filesystem
$mail->Subject = $_POST["email"];				//Sets the Subject of the message
$mail->Body = $message;							//An HTML or plain text message body
if($mail->Send())								//Send an Email. Return true on success or false on error
{
//		$message = '<div class="alert alert-success">Application Successfully Submitted</div>';
    header("Location:Thankyou.html");


}
else
{
    $message = '<div class="alert alert-danger">There is an Error</div>';
}


?>
