<?php
include '../includes/connectdb.php';

if($_SESSION['admin_sid']==session_id())
{
  
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/styles.css">
    <meta charset="utf-8">
	<link rel="icon" href="../images/templogo.png">
    <title>Edit User</title>
  </head>
  <body class="w-full h-full bg-blue-200 md:bg-blue-300">
    
    <?php
      $userID = $_GET['userID'];
      #$quey = 'SELECT * FROM services WHERE serviceID ='.$_GET['servicesID']';'

      $userquery = mysqli_query($connectdb, "SELECT * FROM users WHERE userID ='$userID';");
      while($row = mysqli_fetch_array($userquery)){
        $userq = $row['username'];
        $passq = $row['password'];
        $fname = $row['user_firstname'];
        $lname = $row['user_lastname'];
        $level = $row['user_level'];
        $contactnum = $row['contact_num'];
        $email = $row['email'];
        $address = $row['address'];

        }
 
    ?>

<form class="px-4 rounded mx-auto max-w-3xl w-full my-32 inputs space-y-6" action="adminpanel.php" method="post">
		  	<div>
				<h1 class="text-4xl font-bold">ACCOUNT REGISTRATION</h1>
				<p class="text-gray-600">
				Changes you make will be visible to other users
				</p>
                <input type="hidden" name="userID" value="<?php echo $userID; ?>">
			</div>
			<div class="flex space-x-4">
				<div class="w-1/2">
					<label for="fname" class="font-bold">First Name:</label>
					<input type="text" name="fname"  value="<?php echo $fname; ?>" placeholder="First Name" class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400" required><br>
				</div>
				<div class="w-1/2">
					<label for="lname" class="font-bold">Last Name:</label>
					<input type="text" name="lname"  value="<?php echo $lname; ?>" placeholder="Last Name" class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400" required><br>
				</div>
			</div>
			<div>
				<div>
					<label for="user" class="font-bold w-2">Username:</label>
					<input type="text" name="user"  value="<?php echo $userq; ?>" placeholder="Username" class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400" required><br>
				</div>
				<br>
				<div>	
					<label for="pass" class="font-bold">Password:</label>
					<input type="password" name="pass" value="<?php echo $passq; ?>" placeholder="Password" class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400" required><br>
				</div>
			</div>
			<div  class="flex space-x-4">
				<div class="w-1/2">
					<label for="level" class="font-bold">User Level</label>
					<select  value="<?php echo $level; ?>" class="flex border border-gray-400 px-4 py-2 rounded focus:outline-none focus:border-teal-400" name="level">
						<option value="0">[0]admin</option>
						<option value="1">[1]staff</option>
						<option value="2" selected>[2]client</option>
					</select>
				</div>
				<div class="w-1/2">
					<label for="contactNum" class="font-bold">Contact Number:</label>
					<input type="text" name="contactNum"  value="<?php echo $contactnum; ?>" placeholder="09xxxxxxxxx" class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"><br>
				</div>
			</div>
			<div class="flex space-x-4">
				<div class="w-1/2">
					<label for="email" class="font-bold">Email:</label>
					<input type="text" name="email" value="<?php echo $email; ?>" placeholder="sample@sample.com" class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"><br>
				</div>
				<div class="w-1/2">
					<label for="address" class="font-bold">Address:</label>
					<input type="text" name="address" value="<?php echo $address; ?>" placeholder="______ City" class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"><br>
				</div>
			</div>

            <button type="submit" formaction="../crud/user_update.php" name="button1" class="mt-5 border-green-700 border-2 p-2 rounded-md">Update User</button>
            <a href="adminpanel.php" name="button" class="mt-5 border-gray-700 border-2 p-2 rounded-md">Clear</button>
          </form>

  </body>
</html>
<?php
	}else
	{
		if($_SESSION['staff_sid']==session_id()){
			header("location:404.php");
		}
		else{
			if($_SESSION['customer_sid']==session_id()){
				header("location:404.php");
			}else{
				header("location:../login.php");
			}
		}
	}
?>