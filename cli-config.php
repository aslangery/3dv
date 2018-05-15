<?php
/**
 * Created by PhpStorm.
 * User: Aslangery
 * Date: 16.05.2018
 * Time: 0:46
 */

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use App\DB;


$entityManager = DB::getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);