<?php

namespace App\Command;

use App\Entity\Films;
use App\Entity\People;
use App\Entity\Planets;
use App\Entity\Species;
use App\Entity\Vehicles;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[AsCommand(
    name: 'app:importapidata',
    description: 'Add a short description for your command',
)]
class ImportapidataCommand extends Command
{

    public function __construct(private HttpClientInterface $client, private EntityManagerInterface $em)
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output):int
    {
        $page = rand(0,10);

        $exchangeApiCall = $this->client->request ('GET', 'https://swapi.dev/api/people/?page=' . $page)->toArray();

        $people = $exchangeApiCall['results'];

        $randomPerson = $people[array_rand($people)];

        $data = new People();

        $data->setName($randomPerson['name']);
        $data->setHeight($randomPerson['height']);

        $exchangeApiCall = $this->client->request ('GET', 'https://swapi.dev/api/species/?page=' . $page)->toArray();

        $people = $exchangeApiCall['results'];

        $randomPerson = $people[array_rand($people)];

        $data = new Species();

        $data->setName($randomPerson['name']);
        $data->setClassification($randomPerson['classification']);

        $exchangeApiCall = $this->client->request ('GET', 'https://swapi.dev/api/planets/?page=' . $page)->toArray();

        $people = $exchangeApiCall['results'];

        $randomPerson = $people[array_rand($people)];

        $data = new Planets();

        $data->setName($randomPerson['name']);
        $data->setRotationPeriod($randomPerson['rotation_period']);

        $this->em->persist($data);
        $this->em->flush();

        $exchangeApiCall = $this->client->request ('GET', 'https://swapi.dev/api/films/?page=' . $page)->toArray();

        $people = $exchangeApiCall['results'];

        $randomPerson = $people[array_rand($people)];

        $data = new Films();

        $data->setTitle($randomPerson['title']);
        $data->setEpisodeId($randomPerson['episode_id']);

        $exchangeApiCall = $this->client->request ('GET', 'https://swapi.dev/api/vehicles/?page=' . $page)->toArray();

        $people = $exchangeApiCall['results'];

        $randomPerson = $people[array_rand($people)];

        $data = new Vehicles();

        $data->setName($randomPerson['name']);
        $data->setModel($randomPerson['model']);

        $this->em->persist($data);
        $this->em->flush();

        return Command::SUCCESS;
    }
}