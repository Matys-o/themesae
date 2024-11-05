<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header style="display: flex; align-items: center; justify-content: space-between; padding: 10px 20px; background-color: #000;">
    
    <?php // Logo section ?>
    <div style="flex-shrink: 0;">
        <a href="<?php echo home_url(); ?>" style="display: inline-block;">
            <?php // Replace with an actual logo image or site title ?>
            <img src="<?php echo get_template_directory_uri(); ?>/images/logo nrlt blanc png.png" alt="<?php bloginfo('name'); ?> Logo" style="height: 40px;">
        </a>
    </div>

    <?php // Main navigation ?>
    <nav style="display: flex; gap: 20px;">
    <a href="<?php echo home_url(); ?>" style="color: #fff; text-decoration: none; font-weight: bold;">Page d'accueil</a>
    <a href="<?php echo get_permalink(get_page_by_path('creer-son-tournois')); ?>" style="color: #fff; text-decoration: none; font-weight: bold;">Créer son tournoi</a>
    <a href="<?php echo get_permalink(get_page_by_path('rejoindre-tournoi')); ?>" style="color: #fff; text-decoration: none; font-weight: bold;">Rejoindre un tournoi</a>
    <a href="<?php echo get_permalink(get_page_by_path('compte')); ?>" style="color: #fff; text-decoration: none; font-weight: bold;">Compte</a>
    <a href="<?php echo wp_logout_url(); ?>" style="color: #fff; text-decoration: none; font-weight: bold;">Déconnexion</a>
</nav>




    <?php // Hamburger icon for mobile ?>
    <div onclick="toggleMenu()" style="display: none; flex-direction: column; cursor: pointer; width: 24px; height: 24px; justify-content: space-between;">
        <span style="display: block; height: 2px; background-color: #FFC107; border-radius: 2px;"></span>
        <span style="display: block; height: 2px; background-color: #FFC107; border-radius: 2px; margin-top: 4px;"></span>
        <span style="display: block; height: 2px; background-color: #FFC107; border-radius: 2px; margin-top: 4px;"></span>
    </div>

</header>

<script>
function toggleMenu() {
    var nav = document.querySelector('nav');
    if (nav.style.display === 'none' || nav.style.display === '') {
        nav.style.display = 'flex';
    } else {
        nav.style.display = 'none';
    }
}
</script>

<?php wp_footer(); ?>
</body>
</html>
