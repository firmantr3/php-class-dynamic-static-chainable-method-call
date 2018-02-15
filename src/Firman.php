<?php
    namespace App;

    class Firman {
        protected static $instance;

        protected $defaults = [
            'name' => 'Firman Taruna Nugraha',
            'email' => 'firmantr3@gmail.com',
        ];

        protected $data;

        private function __construct() {
            $this->data = $this->defaults;
        }

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

        public static function setName($val) {
            $instance = static::getInstance();

            $instance->data['name'] = $val;

            return $instance;
        }

        public static function setEmail($val) {
            $instance = static::getInstance();

            $instance->data['email'] = $val;

            return $instance;
        }

        public static function reset() {
            $instance = static::getInstance();

            $instance->data = $instance->defaults;

            return $instance;
        }

        public static function get() {
            $instance = static::getInstance();

            return $instance->data;
        }
    }
