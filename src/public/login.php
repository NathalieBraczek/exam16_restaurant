<?php
/**
 * Examen 2016: Restaurant Project
 *
 * @since         1.0.0
 * @author        Nathalie Braczek <nathalie.braczek.gmx.de>
 * @copyright (C) 2016 Nathalie Braczek. All rights reserved.
 * @license       MIT, see LICENCE
 */

use Nathalie\Exam16\Session;

require_once __DIR__ . '/../../vendor/autoload.php';

$session    = new Session;
$loginState = $session->getLoginState();

switch (isset($_POST['action']) ? $_POST['action'] : '')
{
    case 'login':
        $loginState = $session->login($_POST['password']);
        if ($loginState == Session::LOGIN_STATE_AUTHENTICATED)
        {
            header('Location: dashboard.php');
        }
        break;
    case 'logout':
        $loginState = $session->logout();
        break;
    default:
        break;
}

$titles = [
    Session::LOGIN_STATE_AUTHENTICATED => 'Hello, Trumpster Master!',
    Session::LOGIN_STATE_FAILURE       => 'Ooops!',
    Session::LOGIN_STATE_GUEST         => 'Backend - Login',
]
?>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="css/restaurantStyle.css"/>
    </head>
    <body>
        <?php include "partial/header.php"; ?>
        <div class="box center">
            <h1 class="title"><?php echo $titles[$loginState]; ?></h1>
            <form action="login.php" class="center" method="post">
                <?php if ($loginState != Session::LOGIN_STATE_AUTHENTICATED) : ?>
                    <?php if ($loginState == Session::LOGIN_STATE_FAILURE) : ?>
                        <p class="error">That was not right - are you a Mexican invader?</p>
                    <?php endif; ?>
                    Password:
                    <input type="password" name="password">
                    <input type="hidden" name="action" value="login"/>
                    <button type="submit">Login</button>
                <?php else : ?>
                    <input type="hidden" name="action" value="logout"/>
                    <button type="submit">Logout</button>
                <?php endif; ?>
            </form>
        </div>
        <?php include "partial/footer.php"; ?>
    </body>
</html>
