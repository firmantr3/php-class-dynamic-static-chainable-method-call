<?php
    namespace App;

    class Firman extends BaseClass {
        protected $defaults = [
            'name' => 'Firman Taruna Nugraha',
            'email' => 'firmantr3@gmail.com',
        ];

        protected $data;

        public function __construct() {
            $this->data = $this->defaults;
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
