<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210424003350 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE commentaires (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, article_id INT NOT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_D9BEC0C4F675F31B (author_id), INDEX IDX_D9BEC0C47294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C4F675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C47294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE article CHANGE image image VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE eleve CHANGE score score DOUBLE PRECISION DEFAULT NULL, CHANGE bac_type bac_type VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE scoreapprox CHANGE speciality_id speciality_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE speciality CHANGE etablissement_id etablissement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE speciality_sear CHANGE etab_id etab_id INT DEFAULT NULL, CHANGE nom nom VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE date_naissance date_naissance DATE DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE commentaires');
        $this->addSql('ALTER TABLE article CHANGE image image VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE eleve CHANGE score score DOUBLE PRECISION DEFAULT \'NULL\', CHANGE bac_type bac_type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE scoreapprox CHANGE speciality_id speciality_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE speciality CHANGE etablissement_id etablissement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE speciality_sear CHANGE etab_id etab_id INT DEFAULT NULL, CHANGE nom nom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE date_naissance date_naissance DATE DEFAULT \'NULL\'');
    }
}
