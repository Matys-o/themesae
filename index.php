<?php
/*
Template Name: Landing Page NRLT
*/

get_header();
?>

<main class="landing-page">
    <!-- Section Héro -->
    <section class="hero-section">
        <h1>Vivez vos propres tournois avec <span style="color: #ffa500;">NRLT</span></h1>
        <div class="hero-buttons">
            <a href="<?php echo home_url('/creer-ses-tournois'); ?>" class="button">Créer son tournoi</a>
            <a href="<?php echo home_url('/rejoindre-tournoi'); ?>" class="button secondary">Rejoindre un tournoi</a>
        </div>
    </section>

    <!-- Section Introduction -->
    <section class="about-section">
        <p>NRLT est une plateforme pour les passionnés de Rocket League, permettant de créer ou de rejoindre des tournois. Les joueurs peuvent former des équipes, s’inscrire et suivre leur progression en temps réel, profitant pleinement de l'esprit compétitif du jeu.</p>
    </section>

    <!-- Section Tournois en cours -->
    <section class="tournaments-section">
        <h2>Les <span style="color: #ffa500;">tournois</span> en cours</h2>
        <div class="tournament-card">
            <img src="<?php echo get_template_directory_uri(); ?>/images/large.png" alt="3V3 Champion">
            <h3>3V3 Champion</h3>
            <p>100€ de cashprize</p>
            <button>734 inscrits</button>
            <a href="#" class="stream-button">Accéder à la diffusion</a>
        </div>
        <div class="tournament-card">
            <img src="<?php echo get_template_directory_uri(); ?>/images/rocket-league-championship-series-season-6-drives-up-the-ante-with-1-million-prize-pool-31.png" alt="3V3 Rumble">
            <h3>3V3 Rumble</h3>
            <p>200€ de cashprize</p>
            <button>734 inscrits</button>
            <a href="#" class="stream-button">Accéder à la diffusion</a>
        </div>
    </section>
</main>

<?php get_footer(); ?>
