<?php
/**
 * Created by PhpStorm.
 * User: Aslangery
 * Date: 15.05.2018
 * Time: 20:11
 */

namespace Commands;


use Models\User;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use App\GitHubAPI;
use App\DB;

class GetUserCommand extends Command
{
	protected function configure()
	{
		$this->setName('user:get')
			->setDescription('Get users from github.')
			->addArgument('start', InputArgument::OPTIONAL, 'Start ID of User');
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$start=$input->getArgument('start');
		$response=GitHubAPI::getUsers($start);
		$users=json_decode($response);
		$entityManager=DB::getEntityManager();
		foreach ($users as $user)
		{
			$entityUser=$entityManager->find('Models\User', $user->id);
			if($entityUser===null)
			{
				$entityUser= new User();
				$entityUser->setGithubId($user->id);
				$entityUser->setGithubLogin($user->login);
				$entityManager->persist($entityUser);
				$output->writeln('User '.$user->login.' was added');
			} else {
				$entityUser->setGithubLogin($user->login);
				$output->writeln('User '.$user->login.' was modified');
			}
		}
		$entityManager->flush();
	}
}