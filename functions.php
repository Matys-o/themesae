<?php
function nrlt_theme_setup() {
    add_theme_support('title-tag');
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'nrlt')
    ));
}

function nrlt_enqueue_styles() {
    wp_enqueue_style('nrlt-style', get_stylesheet_uri());
}

add_action('after_setup_theme', 'nrlt_theme_setup');
add_action('wp_enqueue_scripts', 'nrlt_enqueue_styles');

function register_my_menu() {
    register_nav_menu('primary-menu', __('Primary Menu'));
}
add_action('init', 'register_my_menu');

function theme_enqueue_styles() {
    wp_enqueue_style('main-style', get_stylesheet_uri()); // Inclut le style.css par défaut
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/css/custom.css'); // Inclut un fichier CSS personnalisé
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery'), null, true); // Inclut un fichier JS personnalisé
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

// Enregistrer le type de contenu personnalisé pour les Équipes
function create_custom_post_type_equipes() {
    register_post_type('equipe',
        array(
            'labels' => array(
                'name' => __('Équipes'),
                'singular_name' => __('Équipe'),
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'thumbnail'),
            'menu_icon' => 'dashicons-groups',
        )
    );
}
add_action('init', 'create_custom_post_type_equipes');

// Enregistrer le type de contenu personnalisé pour les Joueurs
function create_custom_post_type_joueurs() {
    register_post_type('joueur',
        array(
            'labels' => array(
                'name' => __('Joueurs'),
                'singular_name' => __('Joueur'),
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title'),
            'menu_icon' => 'dashicons-admin-users',
        )
    );
}
add_action('init', 'create_custom_post_type_joueurs');

// Enregistrer le type de contenu personnalisé pour les Organisateurs
function create_custom_post_type_organisateurs() {
    register_post_type('organisateur',
        array(
            'labels' => array(
                'name' => __('Organisateurs'),
                'singular_name' => __('Organisateur'),
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title'),
            'menu_icon' => 'dashicons-businessman',
        )
    );
}
add_action('init', 'create_custom_post_type_organisateurs');

// Enregistrer le type de contenu personnalisé pour les Matchs
function create_custom_post_type_matchs() {
    register_post_type('match',
        array(
            'labels' => array(
                'name' => __('Matchs'),
                'singular_name' => __('Match'),
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor'),
            'menu_icon' => 'dashicons-calendar',
        )
    );
}
add_action('init', 'create_custom_post_type_matchs');

// Enregistrer le type de contenu personnalisé pour les Tournois
function create_custom_post_type_tournois() {
    register_post_type('tournoi',
        array(
            'labels' => array(
                'name' => __('Tournois'),
                'singular_name' => __('Tournoi'),
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor'),
            'menu_icon' => 'dashicons-tickets',
        )
    );
}
add_action('init', 'create_custom_post_type_tournois');


function restrict_access_to_logged_in_users() {
    // Liste des pages accessibles sans connexion (comme la page de connexion ou d'inscription)
    $accessible_pages = ['connexion', 'inscription'];

    // Vérifie si l'utilisateur est connecté
    if (!is_user_logged_in()) {
        // Récupère le slug de la page actuelle
        global $post;
        $current_page_slug = isset($post->post_name) ? $post->post_name : '';

        // Si l'utilisateur n'est pas sur une page accessible, le redirige vers la page de connexion
        if (!in_array($current_page_slug, $accessible_pages)) {
            wp_redirect(home_url('/connexion')); // Remplace 'connexion' par le slug de votre page de connexion
            exit;
        }
    }
}
add_action('template_redirect', 'restrict_access_to_logged_in_users');


?>
