<?php
namespace Shop;

class Users
{
    private static array $instances = [];

    public static function getInstance(): Users
    {
        $class = static::class;
        if (!isset(self::$instances[$class])) {
            self::$instances[$class] = new static();
        }

        return self::$instances[$class];
    }

    public function login(array $user, $connect): bool
    {
        $user['login'] = mysqli_real_escape_string($connect, $user['login']);
        $user['password'] = mysqli_real_escape_string($connect, $user['password']);
        $sql = "SELECT id, login, password FROM users WHERE active='Y' AND login='" .$user['login'] . "' AND password='" .$user['password'] . "' LIMIT 1";
        $rsData = mysqli_query($connect, $sql);
        if ($arData = mysqli_fetch_assoc($rsData)) {
            $_SESSION['id'] = $arData['id'];
            $_SESSION['login'] = $arData['login'];
            $_SESSION['password'] = $arData['password'];
            return true;
        }
        return false;
    }

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
                    'name' => $arData['name'],
                    'login' => $arData['login'],
                ]
            ];
        }
        return ['isSuccess' => false];
    }
}