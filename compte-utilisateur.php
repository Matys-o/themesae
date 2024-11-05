<?php
/*
Template Name: Compte Utilisateur
*/

get_header();
$current_user = wp_get_current_user();

// Vérifie si un post de type "joueurs" existe pour cet utilisateur
$joueur_post = get_posts([
    'post_type' => 'joueurs',
    'meta_key' => 'user_id',
    'meta_value' => $current_user->ID,
    'posts_per_page' => 1,
]);

// Crée un post "joueurs" si aucun n'existe
if (empty($joueur_post)) {
    $joueur_post_id = wp_insert_post([
        'post_title' => $current_user->display_name,
        'post_type' => 'joueurs',
        'post_status' => 'publish',
    ]);
    add_post_meta($joueur_post_id, 'user_id', $current_user->ID, true);
} else {
    $joueur_post_id = $joueur_post[0]->ID;
}

// Si le formulaire est soumis, met à jour les informations de l'utilisateur et du joueur
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['username'])) {
        $username = sanitize_text_field($_POST['username']);
        wp_update_user(['ID' => $current_user->ID, 'display_name' => $username]);
        wp_update_post(['ID' => $joueur_post_id, 'post_title' => $username]);
    }
    
    if (!empty($_POST['biography'])) {
        $biography = sanitize_textarea_field($_POST['biography']);
        update_user_meta($current_user->ID, 'description', $biography);
        update_post_meta($joueur_post_id, 'biography', $biography);
    }
    
    if (!empty($_FILES['profile_picture']['name'])) {
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        require_once(ABSPATH . 'wp-admin/includes/image.php');
        
        $uploadedfile = $_FILES['profile_picture'];
        $upload_overrides = ['test_form' => false];
        $movefile = wp_handle_upload($uploadedfile, $upload_overrides);
        
        if ($movefile && !isset($movefile['error'])) {
            $profile_picture_url = $movefile['url'];
            update_user_meta($current_user->ID, 'profile_picture', $profile_picture_url);
            update_post_meta($joueur_post_id, 'profile_picture', $profile_picture_url);
        }
    }
}

// Récupère les informations de l'utilisateur
$profile_picture = get_user_meta($current_user->ID, 'profile_picture', true) ?: get_template_directory_uri() . '/images/8c12f4d6-f964-4843-bb50-71de6b7e55ae.png';
$username = $current_user->display_name;
$biography = get_user_meta($current_user->ID, 'description', true);
$rank = "Champion"; // Exemple de classement
$wins = 20; // Exemple de victoires
$losses = 5; // Exemple de défaites
?>

<div class="content user-account-page">
    <h2>Profil de <?php echo esc_html($username); ?></h2>
    
    <!-- Formulaire de modification du profil -->
    <form method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Photo de Profil</legend>
            <div class="profile-picture">
                <img src="<?php echo esc_url($profile_picture); ?>" alt="Photo de Profil" class="profile-image">
            </div>
            <label for="profile_picture">Changer la photo de profil :</label>
            <input type="file" id="profile_picture" name="profile_picture" accept="image/*">
        </fieldset>
        
        <fieldset>
            <legend>Informations Utilisateur</legend>
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" id="username" name="username" value="<?php echo esc_attr($username); ?>" required>
            
            <label for="biography">Biographie :</label>
            <textarea id="biography" name="biography" rows="4"><?php echo esc_textarea($biography); ?></textarea>
        </fieldset>

        <button type="submit" class="btn save-profile">Enregistrer les modifications</button>
    </form>
    
    <!-- Affichage du classement et de l'historique -->
    <section class="user-stats">
        <h3>Classement et Historique</h3>
        <p>Classement actuel : <strong><?php echo esc_html($rank); ?></strong></p>
        <p>Victoires : <strong><?php echo esc_html($wins); ?></strong></p>
        <p>Défaites : <strong><?php echo esc_html($losses); ?></strong></p>
    </section>
</div>

<?php get_footer(); ?>
