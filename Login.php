<?php
   session_start();
?>
<?php
  include('DB.php');
 //include('database.php');
?>
<?php
  if($_POST){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $_SESSION['username'] = $username;// store username
    $_SESSION['password'] = $password;// store password

     $queryAdmin =
     "SELECT *
     FROM user, dbadmin
     WHERE user.ID = dbadmin.ID
     AND user.username='$username'
     AND user.password='$password'";


		 $queryClient =
     "SELECT *
     FROM user, client
     WHERE user.ID = client.client_ID
     AND user.username='$username'
     AND user.password='$password'";


		 $queryEmployee =
		 "SELECT *
		 FROM user, employee
		 WHERE user.ID = employee.employee_ID
		 AND user.username='$username'
		 AND user.password='$password'";
//Add Sales accociate table


     $resultAdmin = $mysqli->query($queryAdmin) or die($mysqli->error.__LINE__);
		 $resultClient = $mysqli->query($queryClient) or die($mysqli->error.__LINE__);
		 $resultEmployee = $mysqli->query($queryEmployee) or die($mysqli->error.__LINE__);
//		 $resultAdmin = $mysqli->query($query) or die($mysqli->error.__LINE__);

      if($resultAdmin->num_rows > 0){
         echo "Logged in as $username";

         header('Location: Admin.php');
      }elseif($resultClient->num_rows > 0){
				 echo "Logged in as $username";

				 header('Location: Client.php');
			}elseif($resultEmployee->num_rows > 0){
				echo "Logged in as $username";

			 	header('Location: Employee.php');
		}
  }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CMS-LogIn</title>
    <style>
        h1 {text-align:  center;}
        header {
            height: 20%;
        }
        section {
            text-align: center;
            height: 75%;
        }
        footer {
            position:absolute;
            right: 0;
            bottom: 0;
            left: 0;
        }

    </style>

</head>

<body>

<header>
    <h1>Contract Management System</h1></header>
</header>
<section>
  <form role="form" class="form-signin" action="Login.php" method="post">
        <span id="reauth-id" class="reauth-id"></span>
        <p class="input_title"></p>
        <input name="username" type="text" id="inputID" class="login_box" placeholder="Username" required autofocus>

        <p class="input_title"></p>
        <input name="password" type="password" id="inputPassword" class="login_box" placeholder="Password" required>
        <div id="remember" class="checkbox">
            <label>

            </label>
        </div>
        <button class="btn btn-lg btn-primary" type="submit">Login</button>
    </form>
</section>
<footer>
Managed by AITS all rigths reserved
</footer>
</body>
</html>
