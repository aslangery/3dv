<?php
/**
 * Created by PhpStorm.
 * User: Aslangery
 * Date: 15.05.2018
 * Time: 20:10
 */
require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;
use Commands\GetUserCommand;

$application = new Application();

$application->add(new GetUserCommand());

$application->run();