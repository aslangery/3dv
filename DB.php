<?php
/**
 * Created by PhpStorm.
 * User: Aslangery
 * Date: 15.05.2018
 * Time: 23:55
 */
namespace App;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
abstract class DB
{
	protected static $entityManager=null;

	public static function getEntityManager()
	{
		if (!self::$entityManager)
		{
			$paths = array(__DIR__."/models");
			$isDevMode = false;
			$dbParams = array(
				'driver'   => 'pdo_mysql',
				'user'     => 'root',
				'password' => 'root',
				'dbname'   => '3dv',
			);
			$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
			self::$entityManager = EntityManager::create($dbParams, $config);
		}
		return self::$entityManager;
	}
}