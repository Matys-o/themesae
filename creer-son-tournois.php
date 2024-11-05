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
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tournament_name = sanitize_text_field($_POST['tournament_name']);
    $max_teams = intval($_POST['max_teams']);
    $team_name = sanitize_text_field($_POST['team_name']);
    $invite1 = sanitize_email($_POST['invite1']);
    $invite2 = sanitize_email($_POST['invite2']);
    
    if (!function_exists('wp_handle_upload')) require_once(ABSPATH . 'wp-admin/includes/file.php');
    $uploadedfile = $_FILES['tournament_image'];
    $upload_overrides = array('test_form' => false);
    $movefile = wp_handle_upload($uploadedfile, $upload_overrides);
    $tournament_image_url = $movefile['url'] ?? '';

    $uploadedfile = $_FILES['team_image'];
    $movefile = wp_handle_upload($uploadedfile, $upload_overrides);
    $team_image_url = $movefile['url'] ?? '';

    $ranking_page_url = get_permalink(get_page_by_path('classement'));
    wp_redirect($ranking_page_url . '?tournament_name=' . urlencode($tournament_name) . '&max_teams=' . $max_teams);
    exit;
}

get_footer();
ob_end_flush();
?>
