<?php
/**
 * Examen 2016: Restaurant Project
 *
 * @since         1.0.0
 * @author        Nathalie Braczek <nathalie.braczek.gmx.de>
 * @copyright (C) 2016 Nathalie Braczek. All rights reserved.
 * @license       MIT, see LICENCE
 */

namespace Nathalie\Exam16;

/**
 * Class Session
 *
 * @package Nathalie\Exam16
 */
class Session
{
    const LOGIN_STATE_FAILURE       = 0;
    const LOGIN_STATE_AUTHENTICATED = 1;
    const LOGIN_STATE_GUEST         = 2;

    private $hash;
    private $session_key = 'secret_key';

    /**
     * Session constructor.
     */
    public function __construct()
    {
        session_start();
        $this->hash = file_get_contents(__DIR__ . '/../.password');
    }

    /**
     * @return int
     */
    public function getLoginState()
    {
        $loginState = self::LOGIN_STATE_GUEST;

        if (isset($_SESSION[$this->session_key]) && $_SESSION[$this->session_key] == $this->hash)
        {
            $loginState = self::LOGIN_STATE_AUTHENTICATED;
        }

        return $loginState;
    }

    /**
     * @param $password
     *
     * @return int
     */
    public function login($password)
    {
        $loginState = password_verify($password, $this->hash) ? self::LOGIN_STATE_AUTHENTICATED : self::LOGIN_STATE_FAILURE;

        if ($loginState == self::LOGIN_STATE_AUTHENTICATED)
        {
            $_SESSION[$this->session_key] = $this->hash;
            if (isset($_SESSION['redirect']))
            {
                $redirect = $_SESSION['redirect'];
                unset($_SESSION['redirect']);
                header('Location: ' . $redirect);
            }
        }

        return $loginState;
    }

    /**
     * @return int
     */
    public function logout()
    {
        $_SESSION[$this->session_key] = null;
        session_write_close();

        return self::LOGIN_STATE_GUEST;
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        return $this->getLoginState() == self::LOGIN_STATE_AUTHENTICATED;
    }

    /**
     */
    public function assertValidSession()
    {
        if (!$this->isValid())
        {
            $_SESSION['redirect'] = $_SERVER['REQUEST_URI'];
            header('Location: login.php');
        }
    }
}
