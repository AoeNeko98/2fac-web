<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210425232306 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE abonnement DROP FOREIGN KEY FK_351268BB2ABD43F2');
        $this->addSql('ALTER TABLE abonnement ADD ID_User INT DEFAULT NULL, CHANGE ID_Club ID_Club INT DEFAULT NULL');
        $this->addSql('ALTER TABLE abonnement ADD CONSTRAINT FK_351268BB6E9059DF FOREIGN KEY (ID_User) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_351268BB6E9059DF ON abonnement (ID_User)');
        $this->addSql('ALTER TABLE article CHANGE image image VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE club CHANGE Nom Nom VARCHAR(50) DEFAULT NULL, CHANGE description description VARCHAR(500) DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaires CHANGE author_id author_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cours CHANGE Nom Nom VARCHAR(50) DEFAULT NULL, CHANGE Discription Discription VARCHAR(500) DEFAULT NULL, CHANGE Cours Cours VARCHAR(255) DEFAULT NULL, CHANGE id id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE eleve CHANGE score score DOUBLE PRECISION DEFAULT NULL, CHANGE bac_type bac_type VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE etablissement CHANGE etat etat INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scoreapprox CHANGE speciality_id speciality_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE speciality CHANGE etablissement_id etablissement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE speciality_sear CHANGE etab_id etab_id INT DEFAULT NULL, CHANGE nom nom VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE date_naissance date_naissance DATE DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE abonnement DROP FOREIGN KEY FK_351268BB6E9059DF');
        $this->addSql('DROP INDEX IDX_351268BB6E9059DF ON abonnement');
        $this->addSql('ALTER TABLE abonnement DROP ID_User, CHANGE ID_Club ID_Club INT DEFAULT NULL');
        $this->addSql('ALTER TABLE abonnement ADD CONSTRAINT FK_351268BB2ABD43F2 FOREIGN KEY (id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE article CHANGE image image VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE club CHANGE Nom Nom VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE description description VARCHAR(500) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE commentaires CHANGE author_id author_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cours CHANGE Nom Nom VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE Discription Discription VARCHAR(500) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE Cours Cours VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE id id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE eleve CHANGE score score DOUBLE PRECISION DEFAULT \'NULL\', CHANGE bac_type bac_type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE etablissement CHANGE etat etat INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scoreapprox CHANGE speciality_id speciality_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE speciality CHANGE etablissement_id etablissement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE speciality_sear CHANGE etab_id etab_id INT DEFAULT NULL, CHANGE nom nom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE date_naissance date_naissance DATE DEFAULT \'NULL\'');
    }
}
