<!DOCTYPE html>
<html lang="ID">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sawojajar Login</title>

	<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/datepicker3.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/styles.css" rel="stylesheet">

	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>

<body>	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<?php $validasi = strlen( validation_errors() ); if( !empty($validasi)) :?>
						<div class="alert bg-danger alert-dismissible fade in" role="alert">
							<span class="glyphicon glyphicon-exclamation-sign"></span>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							 </button>
  							<span><?php echo strip_tags(validation_errors());?></span>
						</div>
					<?php endif; ?>
					<?php echo form_open( "verifylogin" ) . PHP_EOL; ?>
						<div class="form-group">
							<input class="form-control" placeholder="Username" name="username" type="text" autofocus>
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="Password" name="password" type="password">
						</div>
						<input type="submit" value="Log In" class="btn btn-primary">
					</form> 
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	
		

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>
