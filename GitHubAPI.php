<?php
/**
 * Created by PhpStorm.
 * User: Aslangery
 * Date: 15.05.2018
 * Time: 21:13
 */
namespace App;

abstract class GitHubAPI
{
	protected static function request($url){
		if ($curl = curl_init ())
		{
			curl_setopt ($curl, CURLOPT_URL, $url);
			curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt ($curl, CURLOPT_HEADER, 0);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($curl, CURLOPT_USERAGENT, 'CONSOLE-APP');
			$result = curl_exec ($curl);
			curl_close ($curl);
			return $result;
		}

		return false;
	}

	public static function getUsers($start=0)
	{
		$url='https://api.github.com/users';
		if((int)$start!=0)
		{
			$url.='?since='.$start;
		}
		return self::request($url);
	}
}