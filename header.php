<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header>
    <h1><?php bloginfo('name'); ?></h1>
    <p><?php bloginfo('description'); ?></p>
</header>

<nav>
    <a href="<?php echo home_url(); ?>">Page d'accueil</a>
    <a href="<?php echo get_permalink(get_page_by_path('creer-son-tournois')); ?>">Créer son tournois</a>
    <a href="<?php echo get_permalink(get_page_by_path('rejoindre-tournoi')); ?>">Rejoindre un tournoi</a>
    <a href="<?php echo get_permalink(get_page_by_path('compte')); ?>">Compte</a>
    <a href="<?php echo wp_logout_url(); ?>">Déconnexion</a>
</nav>
