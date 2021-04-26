<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210425232050 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE abonnement (id INT AUTO_INCREMENT NOT NULL, Date DATE NOT NULL, ID_Club INT DEFAULT NULL, INDEX nbvx (ID_Club), INDEX oiuli (id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE club (Nom VARCHAR(50) DEFAULT NULL, description VARCHAR(500) DEFAULT NULL, domaine VARCHAR(20) NOT NULL, places VARCHAR(50) NOT NULL, ID INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE abonnement ADD CONSTRAINT FK_351268BB5BEDB7E4 FOREIGN KEY (ID_Club) REFERENCES abonnement (id)');
        $this->addSql('ALTER TABLE abonnement ADD CONSTRAINT FK_351268BB2ABD43F2 FOREIGN KEY (Id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE article CHANGE image image VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaires CHANGE author_id author_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cours CHANGE Nom Nom VARCHAR(50) DEFAULT NULL, CHANGE Discription Discription VARCHAR(500) DEFAULT NULL, CHANGE Cours Cours VARCHAR(255) DEFAULT NULL, CHANGE id id INT DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UC_Person ON cours (Nom)');
        $this->addSql('ALTER TABLE eleve CHANGE score score DOUBLE PRECISION DEFAULT NULL, CHANGE bac_type bac_type VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE etablissement CHANGE etat etat INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scoreapprox DROP FOREIGN KEY FK_383D2F433B5A08D7');
        $this->addSql('ALTER TABLE scoreapprox CHANGE speciality_id speciality_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scoreapprox ADD CONSTRAINT FK_383D2F433B5A08D7 FOREIGN KEY (speciality_id) REFERENCES speciality (id)');
        $this->addSql('ALTER TABLE speciality DROP FOREIGN KEY FK_F3D7A08EFF631228');
        $this->addSql('ALTER TABLE speciality CHANGE etablissement_id etablissement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE speciality ADD CONSTRAINT FK_F3D7A08EFF631228 FOREIGN KEY (etablissement_id) REFERENCES etablissement (id)');
        $this->addSql('ALTER TABLE speciality_sear CHANGE etab_id etab_id INT DEFAULT NULL, CHANGE nom nom VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE date_naissance date_naissance DATE DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE abonnement DROP FOREIGN KEY FK_351268BB5BEDB7E4');
        $this->addSql('DROP TABLE abonnement');
        $this->addSql('DROP TABLE club');
        $this->addSql('ALTER TABLE article CHANGE image image VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE commentaires CHANGE author_id author_id INT DEFAULT NULL');
        $this->addSql('DROP INDEX UC_Person ON cours');
        $this->addSql('ALTER TABLE cours CHANGE Nom Nom VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE Discription Discription VARCHAR(500) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE Cours Cours VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE id id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE eleve CHANGE score score DOUBLE PRECISION DEFAULT \'NULL\', CHANGE bac_type bac_type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE etablissement CHANGE etat etat INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scoreapprox DROP FOREIGN KEY FK_383D2F433B5A08D7');
        $this->addSql('ALTER TABLE scoreapprox CHANGE speciality_id speciality_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scoreapprox ADD CONSTRAINT FK_383D2F433B5A08D7 FOREIGN KEY (speciality_id) REFERENCES speciality (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE speciality DROP FOREIGN KEY FK_F3D7A08EFF631228');
        $this->addSql('ALTER TABLE speciality CHANGE etablissement_id etablissement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE speciality ADD CONSTRAINT FK_F3D7A08EFF631228 FOREIGN KEY (etablissement_id) REFERENCES etablissement (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE speciality_sear CHANGE etab_id etab_id INT DEFAULT NULL, CHANGE nom nom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE date_naissance date_naissance DATE DEFAULT \'NULL\'');
    }
}
