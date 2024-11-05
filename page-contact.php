<?php
/*
Template Name: Contact
*/

get_header();
?>

<div class="content contact-page">
    <h2>Contactez-nous</h2>
    <p>Vous avez des questions ? Vous rencontrez un problème technique ? Utilisez le formulaire ci-dessous pour nous contacter, et nous vous répondrons dans les plus brefs délais.</p>

    <form method="post" action="#contact-form" id="contact-form">
        <fieldset>
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>

            <label for="subject">Sujet :</label>
            <input type="text" id="subject" name="subject" required>

            <label for="message">Message :</label>
            <textarea id="message" name="message" rows="5" required></textarea>
        </fieldset>

        <button type="submit" class="btn submit-contact">Envoyer</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $subject = sanitize_text_field($_POST['subject']);
        $message = sanitize_textarea_field($_POST['message']);

        $to = get_option('admin_email');
        $headers = "From: $name <$email>\r\n";
        $mail_subject = "Message de Contact: $subject";
        $mail_message = "Nom: $name\nEmail: $email\n\nMessage:\n$message";

        if (wp_mail($to, $mail_subject, $mail_message, $headers)) {
            echo '<p class="success-message">Merci pour votre message ! Nous reviendrons vers vous sous peu.</p>';
        } else {
            echo '<p class="error-message">Une erreur est survenue. Veuillez réessayer plus tard.</p>';
        }
    }
    ?>
</div>

<?php get_footer(); ?>
