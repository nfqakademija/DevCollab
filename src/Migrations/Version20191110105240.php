<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191110105240 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE skills (id INT AUTO_INCREMENT NOT NULL, userfk INT NOT NULL, skillfk INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE teampoints CHANGE teamfk teamfk INT DEFAULT NULL, CHANGE points points INT DEFAULT NULL');
        $this->addSql('ALTER TABLE teamtasks CHANGE teamfk teamfk INT DEFAULT NULL');
        $this->addSql('ALTER TABLE projectdetails CHANGE created created DATETIME DEFAULT NULL, CHANGE deadline deadline DATETIME DEFAULT NULL, CHANGE sprint1 sprint1 DATETIME DEFAULT NULL, CHANGE sprint1points sprint1points INT DEFAULT NULL, CHANGE sprint2 sprint2 DATETIME DEFAULT NULL, CHANGE sprint2points sprint2points INT DEFAULT NULL, CHANGE sprint3 sprint3 DATETIME DEFAULT NULL, CHANGE sprint3points sprint3points INT DEFAULT NULL, CHANGE status status TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE users CHANGE lastname lastname VARCHAR(255) DEFAULT NULL, CHANGE location location VARCHAR(255) DEFAULT NULL, CHANGE github_username github_username VARCHAR(255) DEFAULT NULL, CHANGE teamfk teamfk INT DEFAULT NULL');
        $this->addSql('ALTER TABLE teams CHANGE github_repo github_repo VARCHAR(255) DEFAULT NULL, CHANGE teampoints teampoints INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE skills');
        $this->addSql('ALTER TABLE projectdetails CHANGE created created DATETIME DEFAULT \'NULL\', CHANGE deadline deadline DATETIME DEFAULT \'NULL\', CHANGE sprint1 sprint1 DATETIME DEFAULT \'NULL\', CHANGE sprint1points sprint1points INT DEFAULT NULL, CHANGE sprint2 sprint2 DATETIME DEFAULT \'NULL\', CHANGE sprint2points sprint2points INT DEFAULT NULL, CHANGE sprint3 sprint3 DATETIME DEFAULT \'NULL\', CHANGE sprint3points sprint3points INT DEFAULT NULL, CHANGE status status TINYINT(1) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE teampoints CHANGE teamfk teamfk INT DEFAULT NULL, CHANGE points points INT DEFAULT NULL');
        $this->addSql('ALTER TABLE teams CHANGE github_repo github_repo VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE teampoints teampoints INT DEFAULT NULL');
        $this->addSql('ALTER TABLE teamtasks CHANGE teamfk teamfk INT DEFAULT NULL');
        $this->addSql('ALTER TABLE users CHANGE lastname lastname VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE location location VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE github_username github_username VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE teamfk teamfk INT DEFAULT NULL');
    }
}
