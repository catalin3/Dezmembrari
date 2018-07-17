<?php include('../init.php'); ?>
<?php
session_start();

if(isset($_SESSION['logat'])){
    header("Location: http://localhost/proiecte/dezmembrari/admin/");
    exit();
}
if(isset($_COOKIE['remember'])){
    $_SESSION['logat'] = 1;
    header("Location: http://localhost/proiecte/dezmembrari/admin/");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin AlbaDez</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                    	<?php

                    	if(count($_POST)) : ?>
                    	<?php 
                    		

						//$query = $db->query("SEL    ECT * FROM admin WHERE (username = '" . $_POST['email'] . "' OR email='".$_POST['email']."') AND password = '".md5($_POST['password'])."'");
                        $query = $db->query("SELECT * FROM admin WHERE (username = '" . $_POST['email'] . "' OR email='".$_POST['email']."') AND password = '".$_POST['password']."'");
                        //$query = $db->query("Select * FROM andmin");
                        ?>
                    		<?php

                            if($query->num_rows >= 1) : ?>
                            <?php 
                                $row = mysqli_fetch_assoc($query);
                                $id = row["id:"]; 
                            ?>
                            <?php $_SESSION['logat']=$id; ?>
                    			<?php header("Location: http://localhost/proiecte/dezmembrari/admin/"); ?>
                				<div class="alert alert-success alert-dismissable">
	                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                                V-ati logat cu succes.
	                            </div>
			        		<?php else : ?>
                    			<div class="alert alert-danger alert-dismissable">
	                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                                E-mail sau parola este incorecta.
	                            </div>
			        		<?php endif; ?>
                    	<?php endif; ?>
                        <?php
                        ?>



                        <form role="form" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                    <?php
                                    $cookie_value=1;
                                    if(isset($_POST['remember'])){
                                        setcookie('remember',$cookie_value,time() + 86400 * 30);
                                    }

                                    ?>
                                </div>
                                <div class="form-group">
                                	<a href="recovery.php" class="">Recovery password</a>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="login" class="btn btn-lg btn-success btn-block" value="Login" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
