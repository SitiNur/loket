<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php if($notif !="" && $notif =="login success") { 
	redirect(base_url('/dashboard'));
}?>

 <head>
    <!-- jquery -->
 	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- Bootsrap-->
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <!-- Custom CSS -->
	<link href="<?php echo base_url()?>assets/css/login.css" rel="stylesheet" id="login-css">
 </head>
<body>

<div class="vertical-center">
 	<div class="container col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6 col-lg-offset-4 col-lg-4">
            <br/>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Sign In</h1>
                </div>
                <div class="panel-body">
                	<form action="<?php echo base_url()?>login/login" method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user" style="width: auto"></i>
                            </span>
                            <input id="email"  type="text" class="form-control" name="user_name" placeholder="Email" required="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-lock" style="width: auto"></i>
                            </span>
                            <input id="password"  type="password" class="form-control" name="password" placeholder="Password" required="" />
                        </div>
                    </div>
                    <button id="btnLogin" class="btn btn-default" style="width: 100%">
                        Sign In<i class="glyphicon glyphicon-log-in"></i>
                    </button>
                   </form>
                  
                       <h3 style="text-align: center;">OR</h3>
                    <div class="col-md-2"></div>
                    <div class="col-md-8" style="text-align: center;">
                        <a href="<?php echo base_url()?>twitter/auth">
                        	<img src="<?php echo base_url();?>assets/img/twitter.png" alt="twitter-img" style="width: 100%"/>
                        </a>
                    </div>
                     <div class="col-md-2"></div>
                </div>
            </div>
    </div>
</div>
	
</body>

<?php if($notif !="" && $notif != "login success") { ?>
	<script type="text/javascript">
		alert("<?php echo $notif?>");
	</script>
<?php } ?>