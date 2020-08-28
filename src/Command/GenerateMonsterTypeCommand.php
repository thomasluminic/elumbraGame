<?php

namespace App\Command;

use App\Entity\Type;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class GenerateMonsterTypeCommand extends Command
{
    const TYPES = [
        'Spirit',
        'Beast',
        'Insect',
        'Flower',
        'Angel',
        'Elf',
        'Human',
        'Demon',
        'Machine',
        'Machine/Artillery',
        'Machine/Bird',
        'Machine/Insect',
        'Machine/Mimic',
        'Machine/Magician',
        'Machine/Dragon',
        'Machine/Demon',
        'Machine/Titan/Artillery',
        'Angel/Magician',
        'Angel/Machine',
        'Invocation/Beast/Licorn',
        'Invocation/Demon',
        'Invocation/Demon/Beast',
        'Beast/Demon/Angel',
        'Beast/Flower',
        'Beast/Bird',
        'Beast/Demon',
        'Beast/Elemental',
        'Beast/Angel/Elemental',
        'Beast/Elemental/Demon',
        'Dryad/Flower',
        'Demon/Mimic',
        'Demon/Mimic/Book',
        'Demon/Angel',
        'Demon/Angel/Elemental',
        'Demon/Lich',
        'Insect/Beast',
        'Insect/Flower',
        'Insect/Dragon',
        'Insect/Elemental',
        'Beast/Bird',
        'Human/Spirit/Demon',
        'Human/Magician/Elf',
        'Human/Demon/Machine',
        'Human/Elf',
        'Human/Elemental',
        'Human/Angel',
        'Human/Demon',
        'Human/Machine',
        'Beast/Tree',
        'Human/Demon/Magician',
        'Golem/Elemental/Tree',
        'Avatar/Dryad/Flower',
        'Avatar/Tree',
        'Elemental/Beast/Bird',
        'Elemental/Golem/Book',
        'Elemental/Dragon',
        'Elemental/Spirit',
        'Elemental/Golem',
        'Elemental/Slime',
        'Elemental',
        'Avatar/Elemental',
        'Avatar/Golem/Elemental',
        'Avatar/Magician/Angel',
        'Avatar/Machine/Titan',
        'Elemental/Imp',
        'Dinosaur',
        'Spirit/Book',
        'Spirit/Demon',
        'Demon/Imp',
        'Eldritch/Undead/Zombie',
    ];

    protected static $defaultName = 'app:generate-monster-type';

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
    }

    protected function configure()
    {
        $this->setDescription('Génération des types de monstre');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $this->generateMonster();
        $io->writeln(count(self::TYPES) . ' type de monstre ajoutée en Base de donnée');
        return Command::SUCCESS;
    }

    protected function generateMonster(): void
    {
        foreach (self::TYPES as $race) {
            $monsterType = new Type();
            $monsterType->setName($race);
            $this->entityManager->persist($monsterType);
        }
        $this->entityManager->flush();
    }

}
