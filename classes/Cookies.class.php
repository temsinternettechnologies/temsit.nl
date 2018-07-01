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

    public static $enabled = true;

    public function __construct($expiration, $path = null)
    {
        self::$expiration = $expiration;
        if (isset($path)) {
            self::$path = $path;
        }else{
            self::$path = "/";
        }

        if(!self::CookiesEnabled()){
            $enabled = false;
        }
    }

    public static function CookiesEnabled(){
        setcookie("test_cookie", "test", time() + 5, '/');

        if(count($_COOKIE) > 0) {
            setcookie("test_cookie", "test", time() + -5, '/');
            return true;
        } else {
            return false;
        }
    }

    public static function setCookie($key, $value)
    {
        if (self::$enabled) {
            try {
                setcookie($key, $value, self::$expiration, self::$path);
                return true;
            } catch (Exception $e) {
                if ($_SERVER['HTTP_HOST'] == "localhost") {
                    var_dump($e->getMessage());
                    var_dump($e->getTraceAsString());
                    exit;
                }
                return false;
            }
        }
        return false;
    }

    public static function getCookie($key)
    {
        if(self::$enabled) {
            try {
                if (isset($_COOKIE[$key])) {
                    return $_COOKIE[$key];
                } else {
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
        return false;
    }
}