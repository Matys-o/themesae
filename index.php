<?php
/* Template Name: Accueil */

get_header(); 
?>

<div class="content">
    <section class="tournois-header">
        <div class="tournois-hero-image">
            <img src="<?php echo get_template_directory_uri(); ?>/images/rl.jpg" alt="Tournoi Rocket League">
        </div>
        <div class="tournois-intro">
            <h2>Vivez vos propres tournois avec NRLT</h2>
            <div class="buttons">
            <a href="<?php echo get_permalink(get_page_by_path('creer-son-tournois')); ?>" class="btn create-tournament">Créer son tournoi</a>
<a href="<?php echo get_permalink(get_page_by_path('rejoindre-tournoi')); ?>" class="btn join-tournament">Rejoindre un tournoi</a>

            </div>
            <p class="description">
                NRLT est une plateforme pour les passionnés de Rocket League, permettant de créer ou de rejoindre des tournois. Les joueurs peuvent former des équipes, s'inscrire et suivre leur progression en temps réel, profitant pleinement de l'esprit compétitif du jeu.
            </p>
        </div>
    </section>

    <section class="current-tournaments">
        <h3>Les tournois en cours</h3>
        <div class="tournament-cards">
            <div class="tournament-card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/large.png" alt="Tournoi 3V3 Champion">
                <div class="tournament-info">
                    <h4>3V3 Champion</h4>
                    <p>Tournoi en cours</p>
                    <p>Participants : <strong>16 équipes</strong></p>
                </div>
            </div>

            <div class="tournament-card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/rocket-league-championship-series-season-6-drives-up-the-ante-with-1-million-prize-pool-31.png" alt="Tournoi 3V3 Rumble">
                <div class="tournament-info">
                    <h4>3V3 Rumble</h4>
                    <p>Tournoi en cours</p>
                    <p>Participants : <strong>12 équipes</strong></p>
                </div>
            </div>

            <div class="tournament-card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/464925.jpg" alt="Tournoi 3V3 Clash">
                <div class="tournament-info">
                    <h4>3V3 Clash</h4>
                    <p>Tournoi en cours</p>
                    <p>Participants : <strong>10 équipes</strong></p>
                </div>
            </div>

            <div class="tournament-card">
                <img src="<?php echo get_template_directory_uri(); ?>/images/rocket-league-octane.jpg" alt="Tournoi 3V3 Academic Rules">
                <div class="tournament-info">
                    <h4>3V3 Academic Rules</h4>
                    <p>Tournoi en cours</p>
                    <p>Participants : <strong>8 équipes</strong></p>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
