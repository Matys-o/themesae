<?php
/*
Template Name: Création de Tournoi
*/

// Active la mise en tampon de sortie
ob_start();

get_header();
?>

<div class="content create-tournament-page">
    <h2>Créer Votre Tournoi</h2>
    <form id="create-tournament-form" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Étape 1 : Informations du Tournoi</legend>
            
            <label for="tournament-name">Nom du Tournoi :</label>
            <input type="text" id="tournament-name" name="tournament_name" required>

            <label for="tournament-image">Image du Tournoi :</label>
            <input type="file" id="tournament-image" name="tournament_image" accept="image/*" required>

            <label for="max-teams">Nombre d'équipes maximum :</label>
            <input type="number" id="max-teams" name="max_teams" min="2" max="64" required>
        </fieldset>

        <fieldset>
            <legend>Étape 2 : Création de l'Équipe</legend>

            <label for="team-name">Nom de l'Équipe :</label>
            <input type="text" id="team-name" name="team_name" required>

            <label for="team-image">Image de l'Équipe :</label>
            <input type="file" id="team-image" name="team_image" accept="image/*" required>

            <label for="invite1">Inviter un ami (Email) :</label>
            <input type="email" id="invite1" name="invite1" required>

            <label for="invite2">Inviter un second ami (Email) :</label>
            <input type="email" id="invite2" name="invite2" required>
        </fieldset>

        <button type="submit" class="btn submit-tournament">Créer le Tournoi</button>
    </form>

    <!-- Bouton pour afficher les tournois précédents -->
    <button onclick="document.getElementById('previous-tournaments').style.display='block'" class="btn view-tournaments">Voir les Tournois Précédents</button>
</div>

<!-- Section des tournois précédents -->
<div id="previous-tournaments" style="display:none;">
    <h3>Tournois Précédents</h3>
    <div class="tournament-cards">
        <?php
        // Récupère les anciens tournois créés dans le type de contenu personnalisé "tournois"
        $args = array(
            'post_type' => 'tournois',
            'posts_per_page' => 10, // Limite le nombre de tournois affichés
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC'
        );
        $tournaments = new WP_Query($args);

        // Boucle pour afficher les tournois sous forme de cartes
        if ($tournaments->have_posts()) :
            while ($tournaments->have_posts()) : $tournaments->the_post();
                $tournament_image = get_post_meta(get_the_ID(), 'tournament_image', true);
                $max_teams = get_post_meta(get_the_ID(), 'max_teams', true);
        ?>
                <div class="tournament-card">
                    <?php if ($tournament_image) : ?>
                        <img src="<?php echo esc_url($tournament_image); ?>" alt="<?php the_title(); ?>">
                    <?php endif; ?>
                    <div class="tournament-info">
                        <h4><?php the_title(); ?></h4>
                        <p>Nombre d'équipes maximum : <strong><?php echo esc_html($max_teams); ?></strong></p>
                        <a href="<?php the_permalink(); ?>" class="btn">Voir le Tournoi</a>
                    </div>
                </div>
        <?php
            endwhile;
        else :
            echo '<p>Aucun tournoi précédent disponible.</p>';
        endif;
        wp_reset_postdata();
        ?>
    </div>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tournament_name = sanitize_text_field($_POST['tournament_name']);
    $max_teams = intval($_POST['max_teams']);
    $team_name = sanitize_text_field($_POST['team_name']);
    $invite1 = sanitize_email($_POST['invite1']);
    $invite2 = sanitize_email($_POST['invite2']);
    
    // Téléchargement de l'image du tournoi
    if (!function_exists('wp_handle_upload')) require_once(ABSPATH . 'wp-admin/includes/file.php');
    $uploadedfile = $_FILES['tournament_image'];
    $upload_overrides = array('test_form' => false);
    $movefile = wp_handle_upload($uploadedfile, $upload_overrides);
    $tournament_image_url = $movefile['url'] ?? '';

    // Téléchargement de l'image de l'équipe
    $uploadedfile = $_FILES['team_image'];
    $movefile = wp_handle_upload($uploadedfile, $upload_overrides);
    $team_image_url = $movefile['url'] ?? '';

    // Enregistrement du tournoi dans le type de contenu personnalisé "tournois"
    $tournament_post = array(
        'post_title'   => $tournament_name,
        'post_content' => 'Nombre maximum d\'équipes : ' . $max_teams,
        'post_status'  => 'publish',
        'post_type'    => 'tournois',
    );
    
    // Insertion du post et récupération de l'ID
    $tournament_post_id = wp_insert_post($tournament_post);

    // Ajout des métadonnées
    if ($tournament_post_id) {
        update_post_meta($tournament_post_id, 'max_teams', $max_teams);
        update_post_meta($tournament_post_id, 'team_name', $team_name);
        update_post_meta($tournament_post_id, 'invite1', $invite1);
        update_post_meta($tournament_post_id, 'invite2', $invite2);

        // Si l'URL de l'image existe, ajoutez-la comme image mise en avant
        if ($tournament_image_url) {
            update_post_meta($tournament_post_id, 'tournament_image', $tournament_image_url);
        }
        if ($team_image_url) {
            update_post_meta($tournament_post_id, 'team_image', $team_image_url);
        }
    }

    // Redirection vers la page de classement après la création
    $ranking_page_url = get_permalink(get_page_by_path('classement'));
    wp_redirect($ranking_page_url . '?tournament_name=' . urlencode($tournament_name) . '&max_teams=' . $max_teams);
    exit;
}

get_footer();
ob_end_flush();
?>
