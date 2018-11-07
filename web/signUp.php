<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>   
    <link rel="stylesheet" href="styles.css"/> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="script.js"></script>
	<title>Resister/Login</title>
</head>

<body>
   <div class="container">
        <div class="masthead">
            <h3 class="text-muted">Register / Login</h3>
            <nav>
                <ul class="nav nav-justified">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="assignments.html">Assignments</a></li>
                <li><a href="joblist.php">Job List</a></li>
                </ul>
            </nav>
        </div>
            <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 text-center">
                    <div class="search-box">
                        <div class="caption">
                            <h3>Register / Login</h3>
                        </div>
                        <div class="panel panel-login">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <a href="#" class="active" id="login-form-link">Login</a>
                                    </div>
                                    <div class="col-xs-6">
                                        <a href="#" id="register-form-link">Register</a>
                                    </div>
                                </div>
                                <hr>
                                </div>
                                    <form action="" id="login-form" class="loginForm">
                                        <div class="input-group">
                                            <input type="text" id="name" class="form-control" placeholder="User Name">
                                            <input type="password" id="paw" class="form-control" placeholder="Password">
                                            <input type="submit" id="submit" class="form-control" value="Login">
                                        </div>
                                    </form>                               
                                    <form action="" id="register-form" class="registerForm" style="display: none;">
                                        <div class="input-group">
                                            <input type="text" id="name" class="form-control" placeholder="User Name">
                                            <input type="password" id="paw" class="form-control" placeholder="Password">
                                            <input type="submit" id="register" class="form-control" value="Register">
                                        </div>
                                    </form>
                                </div>
                        </div>
                    </div>
                <div class="col-md-4">
                    <div class="aro-pswd_info">
                        <div id="pswd_info">
                            <h4>Password must be requirements</h4>
                            <ul>
                                <li id="letter" class="invalid">At least <strong>one letter</strong></li>
                                <li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
                                <li id="number" class="invalid">At least <strong>one number</strong></li>
                                <li id="length" class="invalid">Be at least <strong>8 characters</strong></li>
                                <li id="space" class="invalid"><strong> use [~,!,@,#,$,%,^,&,*,-,=,.,;,']</strong></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>