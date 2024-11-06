<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <style>
        /* Styles généraux */
        body {
            font-family: Arial, sans-serif;
            color: #ffffff;
            background-color: #000000;
            margin: 0;
            padding: 0;
        }

        /* Header */
        .site-header {
            background-color: #000000;
            padding: 1em 2em;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
        }

        /* Logo */
        .logo img {
            height: 40px;
        }

        /* Navigation */
        .main-nav {
            display: flex;
            gap: 15px;
        }

        .nav-button {
            background-color: #333;
            color: #fff;
            text-decoration: none;
            padding: 0.5em 1em;
            border-radius: 5px;
            font-weight: bold;
            transition: box-shadow 0.3s ease, background-color 0.3s ease;
        }

        .nav-button:hover {
            box-shadow: 0px 4px 8px rgba(255, 193, 7, 0.8); /* Ombre jaune au survol */
            background-color: #444;
        }

        /* Menu burger pour mobile */
        .menu-burger {
            display: none;
            flex-direction: column;
            cursor: pointer;
            gap: 4px;
        }

        .menu-burger span {
            display: block;
            width: 24px;
            height: 2px;
            background-color: #FFC107;
            border-radius: 2px;
        }

        /* Styles responsive pour mobile */
        @media (max-width: 768px) {
            .main-nav {
                display: none;
                flex-direction: column;
                gap: 10px;
                background-color: #333;
                position: absolute;
                top: 60px;
                right: 20px;
                padding: 1em;
                border-radius: 8px;
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5);
                width: 200px;
            }

            .main-nav.open {
                display: flex;
            }

            .menu-burger {
                display: flex;
            }

            .nav-button {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
    <div class="logo">
        <a href="<?php echo home_url(); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/images/logo nrlt blanc png.png" alt="<?php bloginfo('name'); ?> Logo">
        </a>
    </div>

    <nav class="main-nav">
        <a href="<?php echo home_url(); ?>" class="nav-button">Page d'accueil</a>
        <a href="<?php echo get_permalink(get_page_by_path('creer-son-tournois')); ?>" class="nav-button">Créer son tournoi</a>
        <a href="<?php echo get_permalink(get_page_by_path('rejoindre-tournoi')); ?>" class="nav-button">Rejoindre un tournoi</a>
        <a href="<?php echo get_permalink(get_page_by_path('compte')); ?>" class="nav-button">Compte</a>
        <a href="<?php echo wp_logout_url(); ?>" class="nav-button">Déconnexion</a>
    </nav>

    <div class="menu-burger" onclick="toggleMenu()">
        <span></span>
        <span></span>
        <span></span>
    </div>
</header>

<script>
function toggleMenu() {
    document.querySelector('.main-nav').classList.toggle('open');
}
</script>

<?php wp_footer(); ?>
</body>
</html>
