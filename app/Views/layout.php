<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>

	<link rel="stylesheet" href="<?= $this->assetUrl('node_modules/bootstrap/dist/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('node_modules/font-awesome/css/font-awesome.min.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
</head>
<body>
	<header>
		<nav class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?= $this->url('default_home') ?>"><?= $w_site_name; // <?= équivaut à "<?php echo" ?></a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<?php
						// Sans ternaire
						if ($w_current_route === 'default_home') {
							//echo 'active';
						} else {
							echo '';
						}
						// Avec ternaire
						($w_current_route === 'default_home') ? 'active' : ''; // "?" correspond au if et le ":" au else
						?>
						<li class="<?= ($w_current_route === 'default_home') ? 'active' : ''; ?>"><a href="<?= $this->url('default_home') ?>">Accueil</a></li>
						<li class="<?= ($w_current_route === 'default_contact') ? 'active' : ''; ?>"><a href="<?= $this->url('default_contact') ?>">Contact</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Activités <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="<?= $this->url('activity_create') ?>">Ajouter une activité</a></li>
								<li><a href="<?= $this->url('activity_all') ?>">Voir les activités</a></li>
							</ul>
						</li>
					</ul>
					<?php if ($w_user) { ?>
						<p class="navbar-text navbar-right"><?php echo $w_user['username']; ?></p>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="<?= $this->url('security_logout') ?>">Se déconnecter</a></li>
						</ul>
					<?php } else { ?>
						<form id="signin" class="navbar-form navbar-right" role="form">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input id="email" type="email" class="form-control" name="email" value="" placeholder="Email Address">
							</div>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								<input id="password" type="password" class="form-control" name="password" value="" placeholder="Password">
							</div>
							<button type="submit" class="btn btn-primary">Connexion</button>
							<a href="<?= $this->url('security_register'); ?>" class="btn btn-info">Inscription</a>
						</form>
					<?php } ?>
				</div>
			</div>
		</nav>
	</header>

	<div class="container">
		<section>
			<?= $this->section('main_content') ?>
		</section>

		<footer>
		</footer>
	</div>

	<script src="<?= $this->assetUrl('node_modules/jquery/dist/jquery.min.js') ?>"></script>
	<script src="<?= $this->assetUrl('node_modules/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
</body>
</html>
