<?php
    namespace App;

    abstract class BaseClass {
        protected static $instance;

        public static function getInstance() {
            if(!static::$instance) {
                static::$instance = new static;
            }

            return static::$instance;
        }

        public static function handleCall($method, $args) {
            $instance = static::getInstance();

            switch(count($args)) {
                case 0:
                    return $instance::$method();
                case 1:
                    return $instance::$method($args[0]);
                case 2:
                    return $instance::$method($args[0], $args[1]);
                default:
                    return call_user_func_array(array($instance, $method), $args);
            }
        }

        public static function __callStatic($method, $args)
        {
            return static::handleCall($method, $args);
        }

        public function __call($method, $args) {
            return static::handleCall($method, $args);
        }
    }
