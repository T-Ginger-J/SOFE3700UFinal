<?php
ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

/* accepts an array inside a cookie that allows
    various parameters to be defined that describes 
    the behaviour of the cookie's session */
session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true // doesn't allow the user to change anything about the cookie with a script
]);

session_start(); // start session

// run an update every 30 min to refresh the cookie
if (isset($_SESSION["last_regeneration"])) {
    regenerate_session_id()
} else {
    $interval = 60 * 30; // 30 min interval before refeshing
    if (time() = $_SESSION["last_regeneration"] >= $interval) {
        regenerate_session_id()
    }
}

function regenerate_session_id()
{
    session_regenerate_id();
    $_SESSION["last_regeneration"] = time();
}