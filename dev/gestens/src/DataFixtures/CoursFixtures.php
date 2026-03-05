<?php

namespace App\DataFixtures;

use App\Entity\Cours;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CoursFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Créer l'objet Faker en français
        $faker = Factory::create('fr_FR');

        // Créer 20 cours aléatoires
        for ($i = 0; $i < 20; $i++) {
            $cours = new Cours();
            
            // Semestre aléatoire entre 1 et 6
            $cours->setSemestre($faker->numberBetween(1, 6));
            
            // Nom de cours aléatoire
            $cours->setNom($faker->words(3, true)); // 3 mots
            
            // Description aléatoire (1 à 3 phrases)
            $cours->setDescription($faker->sentences(3, true));
            
            $manager->persist($cours);
        }

        $manager->flush();
    }
}