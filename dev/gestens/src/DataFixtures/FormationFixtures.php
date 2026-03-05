<?php

namespace App\DataFixtures;

use App\Entity\Formation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class FormationFixtures extends Fixture
{
    // Constantes pour référencer les formations
    public const FORMATION_1 = 'formation_1';
    public const FORMATION_2 = 'formation_2';
    public const FORMATION_3 = 'formation_3';
    public const FORMATION_4 = 'formation_4';
    public const FORMATION_5 = 'formation_5';

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        $niveaux = ['Licence', 'Master', 'Doctorat', 'DUT', 'Licence Pro'];
        $intitules = [
            'Informatique', 
            'Mathématiques', 
            'Physique', 
            'Chimie', 
            'Biologie',
            'Économie',
            'Droit',
            'Lettres',
            'Sciences de l\'ingénieur'
        ];
        $parcours = [
            'MIAGE', 
            'Développement logiciel', 
            'Réseaux et sécurité',
            'Intelligence artificielle',
            'Data Science',
            'Systèmes embarqués',
            'Génie civil',
            'Commerce international'
        ];

        // Créer 5 formations et les sauvegarder avec des références
        for ($i = 1; $i <= 5; $i++) {
            $formation = new Formation();
            $formation->setNiveau($faker->randomElement($niveaux));
            $formation->setIntitule($faker->randomElement($intitules));
            $formation->setParcours($faker->randomElement($parcours));
            
            $manager->persist($formation);
            
            // Ajouter une référence pour pouvoir la réutiliser dans CoursFixtures
            $this->addReference(self::{'FORMATION_' . $i}, $formation);
        }

        $manager->flush();
    }
}