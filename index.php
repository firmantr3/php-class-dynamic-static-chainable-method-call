<?php
    require('vendor/autoload.php');

    print_r(\App\Firman::setName('Fatih')->setEmail('fatih@gmail.com')::reset()->get());
