<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login As</title>
	<link rel="icon" href="./img/logo.png" type="image/png">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<style>
		body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('img/BACKGROUND.jpg') no-repeat center center fixed;
            background-size: cover; /* Ensures the image covers the entire background */
            background-position: center; /* Keeps the background centered */
            background-attachment: fixed; /* Prevents the background from scrolling */
        }
		.login-container {
			background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 100%;
		}
		
		.logo {
			width: 100px;
			margin: 20px auto;
			display: block;
		}
		
		.btn {
			margin-bottom: 10px;
		}
		
		.btn-primary {
			font-size: large;
            background-color: #24ce48;
            border-color: #24ce48;
            color: #fff;
        }
		
		.btn-secondary {
			font-size: large;
			background-color: #000000;
			border-color: #000000;
		}
		.btn:hover {
			background-color: #04614C;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row justify-content-center align-items-center" style="height: 100vh">
			<div class="col-md-6">
				<div class="login-container">
					<img src="img/logo.png" alt="Logo" class="logo">
					<h2 class="text-center">Login As</h2>
					<form>
                    <a><hr class="divider" /></a>
						<a href="adminlogin.php" class="btn btn-primary btn-block">Admin</a>
						<a href="judgelogin.php" class="btn btn-primary btn-block">Judge</a>
						
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
