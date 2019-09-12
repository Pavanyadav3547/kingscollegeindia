<?php

require_once("config.php");
if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {
    // not logged in send to login page
    redirect("index.php");
}

// set page title
$title = "Dashboard";




include 'header.php';
?>
<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'kingscollege'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$sql = 'SELECT * 
		FROM userdata';

$query = mysqli_query($conn, $sql);

if (!$query) {
    die ('SQL Error: ' . mysqli_error($conn));
}
?>
<?php if ($ERROR_MSG <> "") { ?>
        <div class="alert alert-dismissable alert-<?php echo $ERROR_TYPE ?>">
            <button data-dismiss="alert" class="close" type="button">x</button>
            <p><?php echo $ERROR_MSG; ?></p>
        </div>

<?php } ?>
    <div class="mainbody">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table id="example" class="display nowrap" style="width:100%">
                    <thead>
                    <tr>
                        <th>NO</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Phone No.</th>
                        <th>Email Id</th><th>Date of birth</th><th>Address</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no 	= 1;
                    $total 	= 0;
                    while ($row = mysqli_fetch_array($query))
                    {

                        echo '<tr>
					<td>'.$no.'</td>
					<td>'.$row['name'].'</td>
					<td>'.$row['gender'].'</td>
					<td>'.$row['phone'].'</td>
					<td>'.$row['email'].'</td>
					<td>'.$row['dob'].'</td>
					<td>'.$row['address'].'</td>
					
				
				</tr>';
                        $no++;
                    }?>
                    </tbody>

                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <a href="logout.php"><button class="btn btn-lg btn-danger" type="button"><i class="fa fa-sign-out"></i>Logout</button></a>
            </div>
             <div class="col-md-6">
                <a href="export.php"><button class="btn btn-lg btn-success" type="button"><i class="fa fa-sign-in"></i>Export</button></a>
            </div>
        </div>

    </div>




<?php include 'footer.php'; ?>