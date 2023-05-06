<?php
include '../includes/connectdb.php';
if($_SESSION['admin_sid']==session_id())
{
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
	<link rel="stylesheet" href="../../public/styles.css">
	<link rel="icon" href="../images/templogo.png">
    <title>Account Registration</title>
  </head>
  <body class="w-full h-full bg-blue-200 md:bg-blue-300">

  <?php include 'adminsidebar.html' ?>
      <div class="">
        <div>
          <form class="px-4 rounded mx-auto max-w-3xl w-full my-32 inputs space-y-6" action="adminpanel.php" method="post">
		  	<div>
				<h1 class="text-4xl font-bold">ACCOUNT REGISTRATION</h1>
				<p class="text-gray-600">
				Changes you make will be visible to other users
				</p>
			</div>
			<div class="flex space-x-4">
				<div class="w-1/2">
					<label for="fname" class="font-bold">First Name:</label>
					<input type="text" name="fname" placeholder="First Name" class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400" required><br>
				</div>
				<div class="w-1/2">
					<label for="lname" class="font-bold">Last Name:</label>
					<input type="text" name="lname" placeholder="Last Name" class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400" required><br>
				</div>
			</div>
			<div>
				<div>
					<label for="user" class="font-bold w-2">Username:</label>
					<input type="text" name="user" placeholder="Username" class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400" required><br>
				</div>
				<br>
				<div>	
					<label for="pass" class="font-bold">Password:</label>
					<input type="password" name="pass" placeholder="Password" class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400" required><br>
				</div>
			</div>
			<div  class="flex space-x-4">
				<div class="w-1/2">
					<label for="level" class="font-bold">User Level</label>
					<select class="flex border border-gray-400 px-4 py-2 rounded focus:outline-none focus:border-teal-400" name="level">
						<option value="0">[0]admin</option>
						<option value="1">[1]staff</option>
						<option value="2" selected>[2]client</option>
					</select>
				</div>
				<div class="w-1/2">
					<label for="contactNum" class="font-bold">Contact Number:</label>
					<input type="text" name="contactNum" placeholder="09xxxxxxxxx" class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"><br>
				</div>
			</div>
			<div class="flex space-x-4">
				<div class="w-1/2">
					<label for="email" class="font-bold">Email:</label>
					<input type="text" name="email" placeholder="sample@sample.com" class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"><br>
				</div>
				<div class="w-1/2">
					<label for="address" class="font-bold">Address:</label>
					<input type="text" name="address" placeholder="______ City" class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"><br>
				</div>
			</div>

            <button type="submit" name="button1" formaction="../crud/user_add.php" class="mt-5 border-green-700 border-2 p-2 rounded-md">Add User</button>
            <button type="reset" name="button2" class="mt-5 border-gray-700 border-2 p-2 rounded-md">Clear</button>
          </form>
        </div>
      </div>
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
