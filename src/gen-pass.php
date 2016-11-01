<?php
/**
 * Examen 2016: Restaurant Project
 *
 * @since         1.0.0
 * @author        Nathalie Braczek <nathalie.braczek.gmx.de>
 * @copyright (C) 2016 Nathalie Braczek. All rights reserved.
 * @license       MIT, see LICENCE
 */

/**
 * In the `src` directory, enter
 *
 * php gen-pass.php foobar
 *
 * in order to make 'foobar' your new admin password.
 */
$argv = $_SERVER['argv'];
$password = $argv[1];
file_put_contents('.password', password_hash($password, PASSWORD_DEFAULT));
