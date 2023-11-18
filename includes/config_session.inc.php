<?php 
ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'localhost',
    'path' => '/',
    'secure' => false, // Set to true if served over HTTPS
    'httponly' => true
]);

session_start();

// checks session every 30 min
if (!isset($_SESSION["last_regeneration"]) || time() - $_SESSION["last_regeneration"] >= 60 * 30) {
    session_regenerate_id(true); // Regenerate session ID and delete old session
    $_SESSION["last_regeneration"] = time();
}
 