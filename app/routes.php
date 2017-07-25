<?php

	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		['GET|POST', '/contact', 'Default#contact', 'default_contact'],
		['GET', '/about', 'Default#about', 'default_about'],
		['GET', '/activities', 'Activity#all', 'activity_all'],
		['GET|POST', '/activity/create', 'Activity#create', 'activity_create'],
		['GET', '/activity/delete/[i:id]', 'Activity#delete', 'activity_delete'],
		['GET|POST', '/register', 'Security#register', 'security_register'],
		['GET|POST', '/login', 'Security#login', 'security_login'],
	);
