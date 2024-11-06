<?php
/*
Template Name: Connexion et Inscription
*/

ob_start();
get_header();

// Redirection si l'utilisateur est déjà connecté
if (is_user_logged_in()) {
    wp_redirect(home_url());
    exit;
}

// Si le formulaire de connexion est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $creds = array(
        'user_login'    => $_POST['username'],
        'user_password' => $_POST['password'],
        'remember'      => !empty($_POST['remember']),
    );
    
    $user = wp_signon($creds, false);
    
    if (is_wp_error($user)) {
        $login_error_message = $user->get_error_message();
    } else {
        wp_redirect(home_url());
        exit;
    }
}

// Si le formulaire d'inscription est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $username = sanitize_text_field($_POST['reg_username']);
    $email = sanitize_email($_POST['reg_email']);
    $password = $_POST['reg_password'];
    $accept_terms = !empty($_POST['accept_terms']);

    if (!$accept_terms) {
        $register_error_message = "Vous devez accepter les Conditions Générales d'Utilisation.";
    } elseif (username_exists($username) || email_exists($email)) {
        $register_error_message = "Le nom d'utilisateur ou l'adresse e-mail est déjà utilisé.";
    } else {
        $user_id = wp_create_user($username, $password, $email);

        if (is_wp_error($user_id)) {
            $register_error_message = $user_id->get_error_message();
        } else {
            // Attribution du rôle de contributeur
            wp_update_user(['ID' => $user_id, 'role' => 'contributor']); // Ici, le rôle est défini comme 'contributeur'
            $register_success_message = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
        }
    }
}

?>

<div class="content login-page">
    <h2>Connexion</h2>
    
    <?php if (!empty($login_error_message)) : ?>
        <div class="error-message">
            <?php echo $login_error_message; ?>
        </div>
    <?php endif; ?>

    <form method="post">
        <input type="hidden" name="login" value="1">
        <label for="username">Nom d'utilisateur ou e-mail :</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>

        <label for="remember">
            <input type="checkbox" id="remember" name="remember"> Se souvenir de moi
        </label>

        <button type="submit" class="btn login-button">Connexion</button>
    </form>

    <p><a href="<?php echo wp_lostpassword_url(); ?>">Mot de passe oublié ?</a></p>
    
    <h2>Inscription</h2>
    
    <?php if (!empty($register_error_message)) : ?>
        <div class="error-message">
            <?php echo $register_error_message; ?>
        </div>
    <?php endif; ?>
    
    <?php if (!empty($register_success_message)) : ?>
        <div class="success-message">
            <?php echo $register_success_message; ?>
        </div>
    <?php endif; ?>

    <form method="post">
        <input type="hidden" name="register" value="1">
        <label for="reg_username">Nom d'utilisateur :</label>
        <input type="text" id="reg_username" name="reg_username" required>

        <label for="reg_email">Adresse e-mail :</label>
        <input type="email" id="reg_email" name="reg_email" required>

        <label for="reg_password">Mot de passe :</label>
        <input type="password" id="reg_password" name="reg_password" required>

        <label for="accept_terms">
            <input type="checkbox" id="accept_terms" name="accept_terms"> J'ai lu et j'accepte les <a href="<?php echo home_url('/conditions-generales-utilisation'); ?>" target="_blank">Conditions Générales d'Utilisation</a>
        </label>

        <button type="submit" class="btn register-button">S'inscrire</button>
    </form>
</div>

<?php
get_footer();
ob_end_flush();
?>
