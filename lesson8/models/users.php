<?php
namespace Shop;

class Users
{
    /**
     * @var array
     */
    private static array $instances = [];

    /**
     * @return Users
     */
    public static function getInstance(): Users
    {
        $class = static::class;
        if (!isset(self::$instances[$class])) {
            self::$instances[$class] = new static();
        }

        return self::$instances[$class];
    }

    /**
     * @return bool
     */
    public function isLogin() : bool
    {
        if (isset($_SESSION['id']) && intval($_SESSION['id']) > 0) {
            return true;
        }
        return false;
    }

    public function isAdmin() : bool
    {
        if ($this->isLogin() && $_SESSION['id'] == "admin") {
            return true;
        }
        return false;
    }

    /**
     * @return void
     */
    public function logout() : void
    {
        unset($_SESSION['id']);
        unset($_SESSION['login']);
        unset($_SESSION['password']);
    }

    /**
     * @param array $user
     * @param $connect
     * @return bool
     */
    public function login(array $user, $connect): bool
    {
        if ($arData = $this->isRegistration($user, $connect)) {
            $_SESSION['id'] = $arData['id'];
            $_SESSION['login'] = $arData['login'];
            $_SESSION['password'] = $arData['password'];
            return true;
        }
        return false;
    }

    /**
     * @param array $user
     * @param $connect
     * @return array|false
     */
    public function isRegistration(array $user, $connect)
    {
        $user['login'] = mysqli_real_escape_string($connect, $user['login']);
        $user['password'] = mysqli_real_escape_string($connect, $user['password']);

        $sql = "SELECT id, login, password, role FROM users WHERE active='Y' AND login='" .$user['login'] . "' AND password='" . $user['password'] . "' LIMIT 1";

        $rsData = mysqli_query($connect, $sql);

        if ($arData = mysqli_fetch_assoc($rsData)) {
            return [
                'id' => $arData['id'],
                'login' => $arData['login'],
                'password' => $arData['password'],
                'role' => $arData['role'],
            ];
        }
        return false;
    }

    /**
     * @param array $user
     * @param $connect
     * @return bool
     */
    public function registeration(array $user, $connect): bool
    {
        if (!$this->isRegistration($user, $connect)) {
            $user['login'] = mysqli_real_escape_string($connect, $user['login']);
            $user['password'] = mysqli_real_escape_string($connect, $user['password']);
            $user['email'] = mysqli_real_escape_string($connect, $user['email']);

            mysqli_query($connect, "INSERT INTO `users` (`login`, `password`, `email`) VALUES ('" . $user['login'] . "', '" . $user['password']  . "', '" . $user['email'] . "')");

            return $this->login($user, $connect);
        }
        return false;
    }

    /**
     * @param array $user
     * @param $connect
     * @return array|false[]
     */
    public function getProfile(array $user, $connect): array
    {
        $user['login'] = mysqli_real_escape_string($connect, $user['login']);
        $user['password'] = mysqli_real_escape_string($connect, $user['password']);
        $sql = "SELECT id, login, name FROM users WHERE active='Y' AND login='" .$user['login'] . "' AND password='" .$user['password'] . "' LIMIT 1";
        $rsData = mysqli_query($connect, $sql);
        if ($arData = mysqli_fetch_assoc($rsData)) {
            return [
                'isSuccess' => true,
                'user' => [
                    'id' => $arData['id'],
                    'name' => $arData['name'],
                    'login' => $arData['login'],
                ]
            ];
        }
        return ['isSuccess' => false];
    }
}