<?php
/*
Template Name: Rejoindre un Tournoi
*/

get_header();
?>

<div class="content join-tournament-page">
    <h2>Rejoindre un Tournoi</h2>

    <!-- Section 1 : Tournois en cours pour regarder la diffusion -->
    <section class="ongoing-tournaments">
        <h3>Tournois en cours - Assistez à la Diffusion</h3>
        <div class="tournament-cards">
            <?php
            // Exemples de tournois en cours
            $ongoing_tournaments = [
                ['name' => 'Tournoi Champion', 'viewers' => 300, 'image' => 'image rl.jpg'],
                ['name' => 'Tournoi Diamant', 'viewers' => 150, 'image' => 'image rl.jpg'],
                ['name' => 'Tournoi Grand Champion', 'viewers' => 500, 'image' => 'image rl.jpg'],
            ];

            foreach ($ongoing_tournaments as $tournament) {
                ?>
                <div class="tournament-card">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/<?php echo $tournament['image']; ?>" alt="<?php echo esc_html($tournament['name']); ?>">
                    <div class="tournament-info">
                        <h4><?php echo esc_html($tournament['name']); ?></h4>
                        <p>Spectateurs en direct : <strong><?php echo intval($tournament['viewers']); ?></strong></p>
                        <button class="btn watch-stream">Regarder la Diffusion</button>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </section>

    <!-- Section 2 : Tournois à venir auxquels on peut s'inscrire -->
    <section class="upcoming-tournaments">
        <h3>Tournois à venir - Rejoignez une Équipe</h3>
        <div class="tournament-cards">
            <?php
            // Exemples de tournois à venir
            $upcoming_tournaments = [
                ['name' => 'Tournoi Champion', 'teams_registered' => 4, 'max_teams' => 8, 'level' => 'Champion', 'image' => 'rocket-league-hitboxes.jpg'],
                ['name' => 'Tournoi Diamant', 'teams_registered' => 6, 'max_teams' => 8, 'level' => 'Diamant', 'image' => 'rocket-league-hitboxes.jpg'],
                ['name' => 'Tournoi Grand Champion', 'teams_registered' => 2, 'max_teams' => 8, 'level' => 'Grand Champion', 'image' => 'rocket-league-hitboxes.jpg'],
            ];

            foreach ($upcoming_tournaments as $tournament) {
                ?>
                <div class="tournament-card">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/<?php echo $tournament['image']; ?>" alt="<?php echo esc_html($tournament['name']); ?>">
                    <div class="tournament-info">
                        <h4><?php echo esc_html($tournament['name']); ?></h4>
                        <p>Équipes inscrites : <strong><?php echo intval($tournament['teams_registered']) . '/' . intval($tournament['max_teams']); ?></strong></p>
                        <p>Niveau : <strong><?php echo esc_html($tournament['level']); ?></strong></p>
                        <button class="btn join-tournament" onclick="openJoinForm('<?php echo esc_js($tournament['name']); ?>')">S'inscrire</button>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </section>

    <!-- Formulaire d'inscription à un tournoi -->
    <div id="join-form" class="join-form" style="display: none;">
        <h4>Inscription à : <span id="tournament-name"></span></h4>
        <form method="post" enctype="multipart/form-data">
            <label for="team-name">Nom de l'Équipe :</label>
            <input type="text" id="team-name" name="team_name" required>

            <label for="team-image">Image de l'Équipe :</label>
            <input type="file" id="team-image" name="team_image" accept="image/*" required>

            <label for="member1">Membre 1 :</label>
            <input type="text" id="member1" name="member1" required>

            <label for="member2">Membre 2 :</label>
            <input type="text" id="member2" name="member2" required>

            <button type="submit" class="btn submit-join">S'inscrire</button>
            <button type="button" class="btn cancel-join" onclick="closeJoinForm()">Annuler</button>
        </form>
    </div>
</div>

<script>
function openJoinForm(tournamentName) {
    document.getElementById('tournament-name').textContent = tournamentName;
    document.getElementById('join-form').style.display = 'block';
}

function closeJoinForm() {
    document.getElementById('join-form').style.display = 'none';
}
</script>

<?php get_footer(); ?>
