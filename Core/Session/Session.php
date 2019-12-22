<?php

namespace Core\Session;

/**
 * Session singleton class.
 *
 */
class Session
{
    /**
     * Session Time
     *
     * @var int
     */
    const SESSION_TIME = 1800;

    /**
     * Session regeneration time
     *
     * @var int
     */
    const SESSION_REGENERATE_TIME = 300;

    /**
     * Array holding values gathered from $_SESSION.
     *
     * @var array
     */
    protected $sessions;

    /**
     * Session Singleton Instance.
     *
     * @var Session
     */
    protected static $instance;

    /**
     * Class constructor for protect to initialize other instance
     *
     */
    protected function __construct()
    {
        if (session_status() == PHP_SESSION_ACTIVE) {
            $this->sessions = $_SESSION;
        }
    }

    /**
     * Singleton instance method.
     *
     * Supports lazy loading so instance will ge generated only if needed. Also
     * prohibits mutliple instances of object.
     *
     * @static
     *
     * @return Session
     */
    public static function getInstance()
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }
        static::$instance::open();
        static::$instance::manage();
        return static::$instance;
    }

    /**
     * Start Session if is not exists
     *
     * @return void
     */
    public static function open()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * manage session
     * regenerate time or
     * destroy session,
     * regenerate session id 
     *
     * @return void
     */
    public static function manage()
    {
        if (!isset($_SESSION['sessionTime'])) {
            $_SESSION['sessionTime'] = time();
            return;
        }

        if ((int) $_SESSION['sessionTime'] + self::SESSION_TIME < time()) {
            $_SESSION = [];
            if (isset($_COOKIE[session_name()])) {
                setcookie(session_name(), "", time() - 3600);
            }
            session_destroy();
            return;
        }

        if ((int) $_SESSION['sessionTime'] + self::SESSION_REGENERATE_TIME < time()) {
            session_regenerate_id(true);
            $_SESSION['sessionTime'] = time();
            return;
        }
    }

    /**
     * Destroy session if exists
     *
     * @return void
     */
    public function destroy()
    {
        if (session_status() == PHP_SESSION_ACTIVE) {
            session_destroy();
        }
    }

    /**
     * Method for getting property value from current session.
     *
     * It will return all values if $name is set to null, but if property
     * defined but does not exist it will return null.
     *
     * @param string $name
     *
     * @return mixed
     */

    public function get($name = null)
    {
        if ($name === null) {
            return $this->sessions;
        }
        if (array_key_exists($name, $this->sessions)) {
            return $this->sessions[$name];
        }
        return null;
    }
    /**
     * Method for setting property and value to current session.
     *
     * @param string $name
     * @param mixed  $value
     *
     * @return boolean
     */
    public function set($name, $value)
    {
        $this->sessions[$name] = $value;
        return true;
    }

    /**
     * Method for unsetting property and value to current session.
     *
     * @param string $name
     * @param mixed  $value
     *
     * @return boolean
     */
    function unset($name) {
        unset($this->sessions[$name]);
        return true;
    }

    /**
     * Method for adding new property and value to current session if not exists.
     *
     * @param string $name
     * @param mixed  $value
     *
     * @return boolean
     */
    public function add($name, $value)
    {
        if (array_key_exists($name, $this->sessions)) {
            return false;
        }
        $this->sessions[$name] = $value;
        return true;
    }
}
