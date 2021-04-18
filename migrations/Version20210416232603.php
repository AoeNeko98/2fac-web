<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210416232603 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE eleve (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, score DOUBLE PRECISION DEFAULT NULL, bac_type VARCHAR(255) DEFAULT NULL, INDEX IDX_ECA105F7A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etablissement (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, discription VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, num INT NOT NULL, etat INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scoreapprox (id INT AUTO_INCREMENT NOT NULL, speciality_id INT DEFAULT NULL, score_eco DOUBLE PRECISION NOT NULL, score_info DOUBLE PRECISION NOT NULL, score_let DOUBLE PRECISION NOT NULL, score_math DOUBLE PRECISION NOT NULL, score_sc DOUBLE PRECISION NOT NULL, score_sport DOUBLE PRECISION NOT NULL, score_tech DOUBLE PRECISION NOT NULL, INDEX IDX_383D2F433B5A08D7 (speciality_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE speciality (id INT AUTO_INCREMENT NOT NULL, etablissement_id INT DEFAULT NULL, nom_sp VARCHAR(255) NOT NULL, discription VARCHAR(255) NOT NULL, INDEX IDX_F3D7A08EFF631228 (etablissement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, date_naissance DATE DEFAULT NULL, password VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE scoreapprox ADD CONSTRAINT FK_383D2F433B5A08D7 FOREIGN KEY (speciality_id) REFERENCES speciality (id)');
        $this->addSql('ALTER TABLE speciality ADD CONSTRAINT FK_F3D7A08EFF631228 FOREIGN KEY (etablissement_id) REFERENCES etablissement (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE speciality DROP FOREIGN KEY FK_F3D7A08EFF631228');
        $this->addSql('ALTER TABLE scoreapprox DROP FOREIGN KEY FK_383D2F433B5A08D7');
        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F7A76ED395');
        $this->addSql('DROP TABLE eleve');
        $this->addSql('DROP TABLE etablissement');
        $this->addSql('DROP TABLE scoreapprox');
        $this->addSql('DROP TABLE speciality');
        $this->addSql('DROP TABLE user');
    }
}
