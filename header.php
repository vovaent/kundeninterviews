<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kundeninterviews
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	
	<header id="masthead" class="site-header">
		<div class="container">
			<div class="HeaderTop">
				
				<div class="HeaderTopSearch">
					<form role="search" method="get" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<div class="HeaderTopSearchInput">
						<div class="HeaderTopSearchInputIcon">
							<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M12.4607 11.3616L15.7898 14.69L14.69 15.7898L11.3616 12.4607C10.1232 13.4535 8.58282 13.9934 6.99559 13.9912C3.13403 13.9912 0 10.8572 0 6.99559C0 3.13403 3.13403 0 6.99559 0C10.8572 0 13.9912 3.13403 13.9912 6.99559C13.9934 8.58282 13.4535 10.1232 12.4607 11.3616ZM10.9015 10.7849C11.8879 9.77042 12.4388 8.41059 12.4366 6.99559C12.4366 3.98904 10.0014 1.55458 6.99559 1.55458C3.98904 1.55458 1.55458 3.98904 1.55458 6.99559C1.55458 10.0014 3.98904 12.4366 6.99559 12.4366C8.41059 12.4388 9.77042 11.8879 10.7849 10.9015L10.9015 10.7849Z" fill="black"/>
							</svg>
						</div>
						<input type="search" aria-label="search nico" placeholder="Suchen..." name="s" value="<?php echo esc_attr( get_search_query() ); ?>">
					</div>
					<div class="HeaderTopSearchButton" onClick="$('#search-form').trigger( 'submit' )">
						<svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M6 3.5L11 8.5L6 13.5" stroke="white" stroke-width="2"/>
						</svg>
					</div>
					</form>
				</div>
				<div class="HeaderTopLogo">
					<?php
					the_custom_logo();
					?>
				</div>
				<div class="HeaderTopSocial"></div>
				
				<div class="HeaderTopBurger">
					<svg class="HeaderTopBurgerClose" width="37" height="25" viewBox="0 0 37 25" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect x="0.142822" width="36" height="3" fill="#19C79D"/>
					<rect x="0.142822" y="11" width="36" height="3" fill="#19C79D"/>
					<rect x="0.142822" y="22" width="36" height="3" fill="#19C79D"/>
					</svg>
					<svg class="HeaderTopBurgerOpen" width="52" height="53" viewBox="0 0 52 53" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect x="12.1101" y="38.2686" width="37" height="3" transform="rotate(-45 12.1101 38.2686)" fill="#19C79D"/>
					<rect x="14.2314" y="12.1055" width="37" height="3" transform="rotate(45 14.2314 12.1055)" fill="#19C79D"/>
					</svg>

				</div>
				
			</div>
		</div>	
		<div class="HeaderMenu">
			<div class="container">
				<nav id="site-navigation" class="main-navigation">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'header',
							'menu_id'        => 'header-menu',
						)
					);
					?>
				</nav><!-- #site-navigation -->
			</div>
		</div>
		<div class="HeaderTopBurgerMenu">
			<div class="container">
			<div class="HeaderTopBurgerMenuSearch">
				<form role="search" method="get" id="search-form-burger" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<div class="HeaderTopBurgerMenuSearchInput">
						<div class="HeaderTopBurgerMenuSearchInputIcon">
							<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M12.4607 11.3616L15.7898 14.69L14.69 15.7898L11.3616 12.4607C10.1232 13.4535 8.58282 13.9934 6.99559 13.9912C3.13403 13.9912 0 10.8572 0 6.99559C0 3.13403 3.13403 0 6.99559 0C10.8572 0 13.9912 3.13403 13.9912 6.99559C13.9934 8.58282 13.4535 10.1232 12.4607 11.3616ZM10.9015 10.7849C11.8879 9.77042 12.4388 8.41059 12.4366 6.99559C12.4366 3.98904 10.0014 1.55458 6.99559 1.55458C3.98904 1.55458 1.55458 3.98904 1.55458 6.99559C1.55458 10.0014 3.98904 12.4366 6.99559 12.4366C8.41059 12.4388 9.77042 11.8879 10.7849 10.9015L10.9015 10.7849Z" fill="black"/>
							</svg>
						</div>
						<input type="search" aria-label="search nico" placeholder="Suchen..." name="s" value="<?php echo esc_attr( get_search_query() ); ?>">
					</div>
					<div class="HeaderTopBurgerMenuSearchButton" onClick="$('#search-form-burger').trigger( 'submit' )">
						<svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M6 3.5L11 8.5L6 13.5" stroke="white" stroke-width="2"/>
						</svg>
					</div>
					</form>
				</div>
			
			<div class="HeaderTopBurgerMenuNav">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'header',
							'menu_id'        => 'header-menu',
						)
					);
					?>
			</div>
			</div>
		</div>
		
	</header><!-- #masthead -->
	
