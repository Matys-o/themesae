<?php
/*
Template Name: FAQ
*/

get_header();
?>

<div class="content faq-page">
    <h2>FAQ - Questions Fréquentes</h2>

    <section>
        <h3>Général</h3>
        <p><strong>Qu’est-ce que NRLT ?</strong><br>
        NRLT est une plateforme dédiée à l'organisation de tournois Rocket League, spécialement conçue pour des compétitions en format 3v3. Notre objectif est de fournir une expérience compétitive pour les joueurs de tous niveaux.</p>

        <p><strong>Comment participer aux tournois ?</strong><br>
        Pour participer, vous devez vous inscrire sur le site et créer ou rejoindre une équipe de 3 joueurs. Une fois votre équipe constituée, vous pourrez vous inscrire au tournoi en cours.</p>
    </section>

    <section>
        <h3>Inscription et Équipe</h3>
        <p><strong>Comment créer une équipe ?</strong><br>
        Allez sur la page d'inscription au tournoi et remplissez les informations de votre équipe, y compris le nom de l'équipe, le logo, et les membres. Vous devez inviter deux autres joueurs pour compléter votre équipe de 3.</p>

        <p><strong>Puis-je modifier les membres de mon équipe après inscription ?</strong><br>
        Une fois l’équipe inscrite au tournoi, les changements de membres ne sont pas autorisés pour garantir l’équité des compétitions.</p>

        <p><strong>Est-ce que tous les membres de l’équipe doivent être inscrits sur NRLT ?</strong><br>
        Oui, chaque membre de l’équipe doit avoir un compte sur le site et être connecté pour participer au tournoi.</p>
    </section>

    <section>
        <h3>Format du Tournoi</h3>
        <p><strong>Quel est le format des tournois ?</strong><br>
        Les tournois sont organisés sous un format en 3v3, avec des phases de groupes suivies d'un bracket à élimination directe pour déterminer les gagnants. Tous les matchs sont en Best of 5 (BO5).</p>

        <p><strong>Comment les équipes sont-elles classées ?</strong><br>
        Les équipes sont classées en fonction de leurs performances dans les matchs de groupe. Les victoires rapportent des points, et les meilleurs équipes avancent dans le bracket à élimination directe.</p>

        <p><strong>Combien de temps dure un tournoi ?</strong><br>
        La durée dépend du nombre de participants et du format du tournoi. En général, les tournois se déroulent sur une journée complète.</p>
    </section>

    <section>
        <h3>Règles et Conduite</h3>
        <p><strong>Quelles sont les règles de conduite pour les joueurs ?</strong><br>
        Les participants doivent respecter l'esprit sportif et éviter tout comportement toxique, incluant le harcèlement, la triche ou les insultes. Les infractions peuvent mener à une disqualification.</p>

        <p><strong>Qu’arrive-t-il si un membre de l’équipe se déconnecte pendant un match ?</strong><br>
        En cas de déconnexion d’un joueur, l’équipe est encouragée à continuer le match. Si la déconnexion persiste, le match peut être reporté ou attribué à l’équipe adverse selon la situation.</p>
    </section>

    <section>
        <h3>Technique et Support</h3>
        <p><strong>Quels sont les paramètres de match pour les tournois ?</strong><br>
        Tous les matchs utilisent les paramètres standards de Rocket League pour les tournois 3v3. Cela inclut une limite de temps de 5 minutes par match et aucune utilisation de mutators.</p>

        <p><strong>Comment puis-je signaler un problème technique ou un comportement inapproprié ?</strong><br>
        Vous pouvez signaler les problèmes techniques ou les comportements inappropriés en contactant le support via la page <a href="<?php echo home_url('/contact'); ?>">CONTACT</a> sur notre site.</p>

        <p><strong>Mon compte est bloqué, que faire ?</strong><br>
        Si votre compte est bloqué, contactez le support technique pour obtenir de l’aide. Un administrateur examinera votre situation et décidera s’il est possible de rétablir l’accès.</p>
    </section>
</div>

<?php get_footer(); ?>
