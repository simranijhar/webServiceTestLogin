<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/webServiceTestLogin/lib/nusoap.php';
$client = new nusoap_client("http://localhost/tgx-cinemas/Simran/WebService/service.php?wsdl");

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Test for Web Service</title>
        <<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"/>
        <style type="text/css">
            body { font: 14px monospace}
            .wrapper{ width: 400px; padding: 20px; }
        </style>
    </head>
    <body>
        <div class="wrapper container">
            <h3>Login Test for Web Services</h3>
            <p>Please fill in your credentials to login.</p>
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="testUsername" id="testUsername" class="form-control" required/>
                </div>     
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="testPassword" id="testPassword" class="form-control" required/>
                </div>
                <div class="form-group">
                    <input type="submit" name="testSubmit" id="testSubmit" class="btn btn-success" value="Login"/>
                </div>
            </form>
        </div>
        <?php
            if(isset($_POST['testSubmit']) || isset($_POST['testUsername']) || isset($_POST['testPassword'])){
                $testUsername = trim($_POST['testUsername']);
                $testPassword = trim($_POST['testPassword']);
                               
                //web service
                $result = $client->call("authenticateLoginService", array("username" => $testUsername, "password" => $testPassword));
                print_r($result);
                
                if($result != 0){
                    echo "Successful login!";
                }else{
                    echo "Unsuccessful login! Invalid username or password!";
                }
            }
        ?>
    </body>
</html>
