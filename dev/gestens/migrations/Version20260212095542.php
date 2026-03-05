<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260212095542 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__cours AS SELECT id, semestre, nom, description, ects, heure_tp, heure_td, heure_cm FROM cours');
        $this->addSql('DROP TABLE cours');
        $this->addSql('CREATE TABLE cours (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, semestre VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, ects VARCHAR(255) DEFAULT NULL, heure_tp DATE DEFAULT NULL, heure_td DATE DEFAULT NULL, heure_cm DATE DEFAULT NULL, formation_id INTEGER NOT NUll, CONSTRAINT FK_FDCA8C9C5200282E FOREIGN KEY (formation_id) REFERENCES formation (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO cours (id, semestre, nom, description, ects, heure_tp, heure_td, heure_cm,formation_id) SELECT id, semestre, nom, description, ects, heure_tp, heure_td, heure_cm,1 FROM __temp__cours');
        $this->addSql('DROP TABLE __temp__cours');
        $this->addSql('CREATE INDEX IDX_FDCA8C9C5200282E ON cours (formation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__cours AS SELECT id, semestre, nom, description, ects, heure_tp, heure_td, heure_cm FROM cours');
        $this->addSql('DROP TABLE cours');
        $this->addSql('CREATE TABLE cours (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, semestre VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, ects VARCHAR(255) DEFAULT NULL, heure_tp DATE DEFAULT NULL, heure_td DATE DEFAULT NULL, heure_cm DATE DEFAULT NULL)');
        $this->addSql('INSERT INTO cours (id, semestre, nom, description, ects, heure_tp, heure_td, heure_cm) SELECT id, semestre, nom, description, ects, heure_tp, heure_td, heure_cm FROM __temp__cours');
        $this->addSql('DROP TABLE __temp__cours');
    }
}
