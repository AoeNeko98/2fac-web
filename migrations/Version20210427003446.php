<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210427003446 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE book1 (id INT AUTO_INCREMENT NOT NULL, categorie INT DEFAULT NULL, user INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, image VARCHAR(255) NOT NULL, isbn VARCHAR(255) NOT NULL, INDEX jnk (user), INDEX bhn (categorie), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE book1 ADD CONSTRAINT FK_D2C90A2E497DD634 FOREIGN KEY (categorie) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE book1 ADD CONSTRAINT FK_D2C90A2E8D93D649 FOREIGN KEY (user) REFERENCES user (id)');
        $this->addSql('ALTER TABLE abonnement DROP FOREIGN KEY FK_351268BB5BEDB7E4');
        $this->addSql('ALTER TABLE abonnement DROP FOREIGN KEY FK_351268BB6E9059DF');
        $this->addSql('ALTER TABLE abonnement CHANGE ID_Club ID_Club INT DEFAULT NULL, CHANGE ID_User ID_User INT DEFAULT NULL');
        $this->addSql('ALTER TABLE abonnement ADD CONSTRAINT FK_351268BB5BEDB7E4 FOREIGN KEY (ID_Club) REFERENCES abonnement (id)');
        $this->addSql('ALTER TABLE abonnement ADD CONSTRAINT FK_351268BB6E9059DF FOREIGN KEY (ID_User) REFERENCES user (id)');
        $this->addSql('ALTER TABLE article CHANGE image image VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE club CHANGE Nom Nom VARCHAR(50) DEFAULT NULL, CHANGE description description VARCHAR(500) DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaires DROP FOREIGN KEY FK_D9BEC0C47294869C');
        $this->addSql('ALTER TABLE commentaires DROP FOREIGN KEY FK_D9BEC0C4F675F31B');
        $this->addSql('ALTER TABLE commentaires CHANGE author_id author_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C47294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C4F675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
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

        $this->addSql('ALTER TABLE book1 DROP FOREIGN KEY FK_D2C90A2E497DD634');
        $this->addSql('DROP TABLE book1');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('ALTER TABLE abonnement DROP FOREIGN KEY FK_351268BB5BEDB7E4');
        $this->addSql('ALTER TABLE abonnement DROP FOREIGN KEY FK_351268BB6E9059DF');
        $this->addSql('ALTER TABLE abonnement CHANGE ID_Club ID_Club INT DEFAULT NULL, CHANGE ID_User ID_User INT DEFAULT NULL');
        $this->addSql('ALTER TABLE abonnement ADD CONSTRAINT FK_351268BB5BEDB7E4 FOREIGN KEY (ID_Club) REFERENCES club (ID) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE abonnement ADD CONSTRAINT FK_351268BB6E9059DF FOREIGN KEY (ID_User) REFERENCES user (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article CHANGE image image VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE club CHANGE Nom Nom VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE description description VARCHAR(500) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE commentaires DROP FOREIGN KEY FK_D9BEC0C4F675F31B');
        $this->addSql('ALTER TABLE commentaires DROP FOREIGN KEY FK_D9BEC0C47294869C');
        $this->addSql('ALTER TABLE commentaires CHANGE author_id author_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C4F675F31B FOREIGN KEY (author_id) REFERENCES user (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C47294869C FOREIGN KEY (article_id) REFERENCES article (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cours CHANGE Nom Nom VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE Discription Discription VARCHAR(500) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE Cours Cours VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE id id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE eleve CHANGE score score DOUBLE PRECISION DEFAULT \'NULL\', CHANGE bac_type bac_type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE etablissement CHANGE etat etat INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scoreapprox CHANGE speciality_id speciality_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE speciality CHANGE etablissement_id etablissement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE speciality_sear CHANGE etab_id etab_id INT DEFAULT NULL, CHANGE nom nom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE date_naissance date_naissance DATE DEFAULT \'NULL\'');
    }
}
