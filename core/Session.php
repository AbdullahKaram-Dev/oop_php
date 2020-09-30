<?php

namespace Core;

class Session
{

    public function get(string $key)
    {
      return  (! empty($_SESSION[$key]) ? $_SESSION[$key] : false);
    }

    public function set(string $key, $value)
    {
        return (isset($_SESSION) ? $_SESSION[$key] = $value : false);
    }

    public function has(string $key):bool
    {
        return (isset($_SESSION[$key]) ? true : false);
    }

    public function remove(string $key): bool
    {
        if (isset($_SESSION[$key])){

            unset($_SESSION[$key]);

            return true;

        } else {

            return false;
        }

    }

    public function destroy()
    {
        session_start();
        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
    }

    public function flash($key)
    {
       echo $this->get($key);
        $this->remove($key);
    }
}