<?php
namespace Shop;

class Cart
{
    private static array $instances = [];

    public static function getInstance(): Cart
    {
        $class = static::class;
        if (!isset(self::$instances[$class])) {
            self::$instances[$class] = new static();
        }

        return self::$instances[$class];
    }

    public function getCart()
    {

    }
}