<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php echo Asset::css(array('bootstrap.css','style.css')); ?>
	<style>
		body { margin: 50px; }
	</style>
	<?php echo Asset::js(array(
		'jquery.min.js',
		'bootstrap.js',
		'hello.js',
		'att.js',
	)); ?>
	<script>
		$(function(){ $('.topbar').dropdown(); });
	</script>
</head>
<body>

	<?php if ($current_user): ?>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Project 2</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="<?php echo Uri::segment(2) == '' ? 'active' : ''; ?>">
						<?php echo Html::anchor('admin', 'Dashboard') ?>
					</li>

					<?php
						$files = new GlobIterator(APPPATH.'classes/controller/admin/*.php');
						foreach($files as $file)
						{
							$section_segment = $file->getBasename('.php');
							$section_title = Inflector::humanize($section_segment);
							?>
							<li class="<?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
								<?php echo Html::anchor('admin/'.$section_segment, $section_title) ?>
							</li>

							<?php
						}
					?>

					<li class="<?php echo Uri::segment(2) == '' ? 'active' : '' ?>">
						<?php echo Html::anchor('ahome', 'Travel Attractions') ?>
					</li>

					
							<li class="<?php echo Uri::segment(2) == 'about' ? 'active' : '' ?>">
								<?php echo Html::anchor('ahome/about', 'About Us') ?>
							</li>
							<li class="<?php echo Uri::segment(2) == 'allattraction' ? 'active' : '' ?>">
								<?php echo Html::anchor('federation/allattraction', 'Other Att') ?>
							</li>
							<li class="<?php echo Uri::segment(2) == 'buy_brochure' ? 'active' : '' ?>">
								<?php echo Html::anchor('ahome/buy_brochure', 'Travel Brochures') ?>
							</li>
				</ul>
				<ul class="nav navbar-nav pull-right">
					<li class="dropdown">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo $current_user->username ?> <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><?php echo Html::anchor('admin/logout', 'Logout') ?></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
	
	<?php else: ?>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Project 2</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="<?php echo Uri::segment(2) == '' ? 'active' : '' ?>">
						<?php echo Html::anchor('ahome', 'Travel Attractions') ?>
					</li>
					<li class="<?php echo Uri::segment(2) == 'allattraction' ? 'active' : '' ?>">
								<?php echo Html::anchor('federation/allattraction', 'Other Att') ?>
							</li>
					
							<li class="<?php echo Uri::segment(2) == 'about' ? 'active' : '' ?>">
								<?php echo Html::anchor('ahome/about', 'About Us') ?>
							</li>
							<li class="<?php echo Uri::segment(2) == 'buy_brochure' ? 'active' : '' ?>">
								<?php echo Html::anchor('ahome/buy_brochure', 'Travel Brochures') ?>
							</li>
					
				</ul>
				<ul class="nav navbar-nav pull-right">
					
						
							<li><?php echo Html::anchor('admin/login', 'Login'); ?></li>
						
					
				</ul>
			</div>
		</div>
	</div>
	
	<?php endif; ?>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><?php echo $title; ?></h1>
				<hr>
<?php if (Session::get_flash('success')): ?>
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<p>
					<?php echo implode('</p><p>', (array) Session::get_flash('success')); ?>
					</p>
				</div>
<?php endif; ?>
<?php if (Session::get_flash('error')): ?>
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<p>
					<?php echo implode('</p><p>', (array) Session::get_flash('error')); ?>
					</p>
				</div>
<?php endif; ?>
			</div>
			<div class="col-md-12">
<?php  echo $content; ?>
			</div>
		</div>
		<hr/>
		
		<footer>
			<div class="container text-center">
			<p>
				This site is part of a CSU <a href="http://cs.colostate.edu/~ct310">CT310</a> Project.<br>
			</p>
			</div>
		</footer>
		
		
	</div>
</body>
</html>
