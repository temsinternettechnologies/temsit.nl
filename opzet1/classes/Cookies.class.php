<?php
/**
 * Created by PhpStorm.
 * User: Menno
 * Date: 06/04/2018
 * Time: 00:07
 */

class Cookies
{
    /* This variable can be set to the path of the appliction needed.*/
    public static $path;
    /* This variable must be set to the amount of seconds before the cookie should destroy */
    public static $expiration;

    public function __construct($expiration, $path)
    {
        self::$expiration = $expiration;
        self::$path = $path;
    }

    public static function setCookie($key, $value)
    {
        try {
            setcookie($key, $value, self::$expiration, self::$path);
            return true;
        } catch (Exception $e) {
            if (strpos($_SERVER['HTTP_HOST'], "dev") === 0) {
                var_dump($e->getMessage());
                var_dump($e->getTraceAsString());
                exit;
            }
            return false;
        }
    }

    public
    static function getCookie($key)
    {
        try {
            if (isset($_COOKIE[$key])) {
                return $_COOKIE[$key];
            }else{
                return false;
            }
        } catch (Exception $e) {
            if (strpos($_SERVER['HTTP_HOST'], "dev") === 0) {
                var_dump($e->getMessage());
                var_dump($e->getTraceAsString());
                exit;
            }
            return false;
        }
    }
}