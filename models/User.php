<?php
/**
 * Created by PhpStorm.
 * User: Aslangery
 * Date: 15.05.2018
 * Time: 23:42
 */

namespace Models;

/**
 * @Entity @Table(name="users")
 **/
class User
{
	/** @Id @Column(type="integer")  **/
	protected $github_id;
	/** @Column(type="string") **/
	protected $github_login;

	/**
	 * @return mixed
	 */
	public function getGithubId()
	{
		return $this->github_id;
	}

	/**
	 * @return mixed
	 */
	public function getGithubLogin()
	{
		return $this->github_login;
	}

	/**
	 * @param mixed $github_id
	 */
	public function setGithubId($github_id)
	{
		$this->github_id = $github_id;
	}

	/**
	 * @param mixed $github_login
	 */
	public function setGithubLogin($github_login)
	{
		$this->github_login = $github_login;
	}
}