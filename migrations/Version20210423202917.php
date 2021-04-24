<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210423202917 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, etablissement_id INT NOT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, image VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_23A0E66FF631228 (etablissement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE speciality_sear (id INT AUTO_INCREMENT NOT NULL, etab_id INT DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, INDEX IDX_7DF06575782C8EBC (etab_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66FF631228 FOREIGN KEY (etablissement_id) REFERENCES etablissement (id)');
        $this->addSql('ALTER TABLE speciality_sear ADD CONSTRAINT FK_7DF06575782C8EBC FOREIGN KEY (etab_id) REFERENCES etablissement (id)');
        $this->addSql('ALTER TABLE eleve CHANGE score score DOUBLE PRECISION DEFAULT NULL, CHANGE bac_type bac_type VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE scoreapprox CHANGE speciality_id speciality_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE speciality CHANGE etablissement_id etablissement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE date_naissance date_naissance DATE DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE speciality_sear');
        $this->addSql('ALTER TABLE eleve CHANGE score score DOUBLE PRECISION DEFAULT \'NULL\', CHANGE bac_type bac_type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE scoreapprox CHANGE speciality_id speciality_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE speciality CHANGE etablissement_id etablissement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE date_naissance date_naissance DATE DEFAULT \'NULL\'');
    }
}
