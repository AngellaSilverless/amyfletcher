<?php /**
 * Header
 *
 * @package amy-fletcher
 */ ?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>

<meta charset="UTF-8">
<meta name="description" content=" ">
<meta name="keywords" content=" ">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://use.typekit.net/dmz2ckm.css"><!--TYPEKIT INJECT-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" type="image/x-icon" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<div class="page-border page-border__left-top"></div>
	<div class="page-border page-border__right-bottom"></div>

	<div id="page" class="site-wrapper">

		<main><!--closes in footer.php-->

			<nav id="nav">

				<div class="container cols-3-6-3 cols-xl-3-9 cols-md-12">

					<div class="col" id="logo-amy-fletcher">
						<a href="<?php echo home_url(); ?>" alt="Amy Fletcher - Interior Designer, Logo">
							<?php echo file_get_contents(get_field("logo_standard", "options")["url"]); ?>
						</a>
					</div>

					<div class="col" id="main-menu">
						<?php wp_nav_menu(array(
							'theme_location'  => 'main-menu',
							'container_class' => 'mainMenu'
						)); ?>
					</div>

					<div class="col" id="contact-info">
						<?php $phone = get_field("phone", "options"); $email = get_field("email", "options"); ?>
						<a class="phone" href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a>
						<a class="email" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
					</div>

				</div>

				<div class="col" id="toggle-menu"><i class="fas fa-bars"></i></div>

			</nav>
