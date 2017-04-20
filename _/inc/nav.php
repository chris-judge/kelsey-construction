<?php

// Add menus
add_theme_support( 'menus' );

//Register header menu
function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Nav' ));
}
add_action( 'init', 'register_my_menu' );