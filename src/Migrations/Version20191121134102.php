<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191121134102 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sprints (id INT AUTO_INCREMENT NOT NULL, start DATETIME NOT NULL, name VARCHAR(255) NOT NULL, deadline DATETIME DEFAULT NULL, points INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE team_points CHANGE points points INT DEFAULT NULL');
        $this->addSql('ALTER TABLE team_tasks CHANGE created_by created_by VARCHAR(255) DEFAULT NULL, CHANGE status status TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE teams CHANGE github_repo github_repo VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE users CHANGE lastname lastname VARCHAR(255) DEFAULT NULL, CHANGE location location VARCHAR(255) DEFAULT NULL, CHANGE github_username github_username VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE project_details CHANGE repository repository VARCHAR(255) DEFAULT NULL, CHANGE created created DATETIME DEFAULT NULL, CHANGE deadline deadline DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sprints');
        $this->addSql('ALTER TABLE project_details CHANGE repository repository VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE created created DATETIME DEFAULT \'NULL\', CHANGE deadline deadline DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE team_points CHANGE points points INT DEFAULT NULL');
        $this->addSql('ALTER TABLE team_tasks CHANGE created_by created_by VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE status status TINYINT(1) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE teams CHANGE github_repo github_repo VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE users CHANGE lastname lastname VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE location location VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE github_username github_username VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
