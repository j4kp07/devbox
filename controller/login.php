<?php defined('LIBRARY') or die('No direct script access allowed');

	if($Auth->loggedIn()) redirect('/dashboard');

    if(!empty($_POST['username']))
    {
		if($Auth->login($_POST['username'], $_POST['password']))
			redirect('/dashboard');
		else
			$Error->add('username', "We're sorry, you have entered an incorrect username and password. Please try again.");
    }

	$page_title = '&raquo; Login';
	require_once DIR_VIEW . '/devbox/_header.php'; 
	require_once DIR_VIEW . '/devbox/_navigation.php'; 
?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="span16">
				
					<?php if (strlen($Error)): ?>
						<div class="row">
							<div style="width: 562px; margin: 0 auto;">
								<div class="alert-message error">
							    <p><?= $Error; ?></p>
							    </div>
							</div>
						</div>
					<?php endif ?>
						
					<div class="row">
						<div style="background-image: url('/assets/images/account/background_login.jpg'); width: 562px; height: 246px; margin: 20px auto;">
							<div class="span5" style="padding: 20px 0 0 10px;">
								<div class="page-header">
									<h4>Sign-in to your account</h4>
								</div>
								<form action="/login/" method="post" class="form-stacked" style="margin-left: -20px;" autocomplete="off"> 
									<div class="clearfix">
										<label for="focus">Username:</label> 
										<input type="text" name="username" value="<?= set_default($username) ?>" id="focus" />
									</div>
									<div class="clearfix">
										<label for="password">Password:</label> 
										<input type="password" name="password" value="" id="password" />
									</div>
									<div class="clearfix">
										<input type="submit" name="btnlogin" value="Login" id="btnlogin" class="btn primary"/>
									</div>
									<input type="hidden" name="r" value="<?PHP echo htmlspecialchars(@$_REQUEST['r']); ?>" id="r">
								</form>
							</div>
							<div class="span3" style="padding: 20px 0 0 30px;">
								<div class="page-header">
									<h4>Create an account</h4>
								</div>
								<p style="margin-bottom: 40px;">Don't have an account? You can create one for FREE and in one-simple step!</p>
								<input type="button" name="btnlogin" value="Create Account" id="btnlogin" class="btn link success" rel="/acct/" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

<?php require_once DIR_VIEW . '/devbox/_footer.php'; ?>
