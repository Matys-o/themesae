<?php
/*
Template Name: Classement
*/

get_header();
?>

<div class="content ranking-page">
    <h2>Classement des Équipes pour le Tournoi : <?php echo isset($_GET['tournament_name']) ? esc_html($_GET['tournament_name']) : ''; ?></h2>
    <p>Nombre maximum d'équipes : <?php echo isset($_GET['max_teams']) ? intval($_GET['max_teams']) : ''; ?></p>

    <div class="team-ranking">
        <?php
        // Exemple de données d'équipes avec des informations supplémentaires
        $teams = [
            ['name' => 'Équipe 1', 'players' => ['Joueur A', 'Joueur B', 'Joueur C'], 'image' => 'team1.jpg'],
            ['name' => 'Équipe 2', 'players' => ['Joueur D', 'Joueur E', 'Joueur F'], 'image' => 'team2.jpg'],
            ['name' => 'Équipe 3', 'players' => ['Joueur G', 'Joueur H'], 'image' => 'team3.jpg'],
            ['name' => 'Équipe 4', 'players' => ['Joueur I', 'Joueur J', 'Joueur K'], 'image' => 'team4.jpg'],
        ];

        if (!empty($teams)) {
            echo '<table>';
            echo '<thead><tr><th>Équipe</th><th>Nombre de Joueurs</th></tr></thead>';
            echo '<tbody>';
            foreach ($teams as $index => $team) {
                echo '<tr onclick="showTeamDetails(' . $index . ')">';
                echo '<td>' . esc_html($team['name']) . '</td>';
                echo '<td>' . count($team['players']) . '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<p>Aucune équipe inscrite pour le moment.</p>';
        }
        ?>
    </div>

    <!-- Détails de l'équipe -->
    <div id="team-details" class="team-details-card" style="display: none;">
        <div class="team-details-content">
            <span class="close-btn" onclick="closeTeamDetails()">&times;</span>
            <img id="team-image" src="" alt="Image de l'équipe">
            <h3 id="team-name"></h3>
            <ul id="team-players"></ul>
        </div>
    </div>
</div>

<script>
const teams = <?php echo json_encode($teams); ?>;

function showTeamDetails(index) {
    const team = teams[index];
    document.getElementById('team-image').src = '<?php echo get_template_directory_uri(); ?>/images/' + team.image;
    document.getElementById('team-name').textContent = team.name;
    
    const playersList = document.getElementById('team-players');
    playersList.innerHTML = '';
    team.players.forEach(player => {
        const li = document.createElement('li');
        li.textContent = player;
        playersList.appendChild(li);
    });

    document.getElementById('team-details').style.display = 'block';
}

function closeTeamDetails() {
    document.getElementById('team-details').style.display = 'none';
}
</script>

<?php get_footer(); ?>
