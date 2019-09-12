<?php
define('HOST','localhost');
define('USERNAME', 'sociofj2_nrk');
define('PASSWORD','nrkcrafted@socio123');
define('DB','sociofj2_nrk');

$con = mysqli_connect(HOST,USERNAME,PASSWORD,DB);
// Fetching Values From URL
$name = $_POST['name'];
$email = $_POST['email'];
$city = $_POST['city'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$product_name = $_POST['product_name'];


$sql ="insert into userdata(name, email, city, phone, address, product_name) values ('$name', '$email','$city','$phone','$address','$product_name')" ;//Insert Query
echo "Form Submitted successfully";


if(mysqli_query($con, $sql)){
    echo 'success';
}

function clean_text($string)
{
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}

if(isset($_POST["submit"]))
{
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
				<td width="30%">Email Address</td>
				<td width="70%">'.$_POST["email"].'</td>
			</tr>
			
			
			<tr>
				<td width="30%">Subject</td>
				<td width="70%">'.$_POST["phone"].'</td>
			</tr>
		
		
			<tr>
				<td width="30%">Phone Number</td>
				<td width="70%">'.$_POST["address"].'</td>
			</tr>
			
			<tr>
				<td width="30%">Company Name</td>
				<td width="70%">'.$_POST["product_name"].'</td>
			</tr>
			
		</table>
	';

    require("class.phpmailer.php");

    $mail = new PHPMailer();

    $mail->IsSMTP();
    $mail->Host = "sociowash.com";
    $mail->SMTPAuth = true;
//$mail->SMTPSecure = "ssl";
    $mail->Port = 587;
    $mail->Username = "test@sociowash.com";
    $mail->Password = "ET)Wi4xWQvK9";

    $mail->From = "pavan@sociowash.com";
    $mail->FromName = "New Lead";
    $mail->AddAddress("pavan@sociowash.com");
//$mail->AddReplyTo("mail@mail.com");

    $mail->IsHTML(true);							//Sets message type to HTML
    $mail->AddAttachment($path);					//Adds an attachment from a path on the filesystem
    $mail->Subject = $_POST["product_name"];				//Sets the Subject of the message
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
}

?>
