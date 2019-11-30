<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191130142004 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE projects (id INT AUTO_INCREMENT NOT NULL, team_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, repository VARCHAR(255) DEFAULT NULL, created DATETIME DEFAULT NULL, deadline DATETIME DEFAULT NULL, INDEX IDX_5C93B3A4296CD8AE (team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE projects ADD CONSTRAINT FK_5C93B3A4296CD8AE FOREIGN KEY (team_id) REFERENCES teams (id)');
        $this->addSql('ALTER TABLE users CHANGE team_id team_id INT DEFAULT NULL, CHANGE skills_id skills_id INT DEFAULT NULL, CHANGE location location VARCHAR(255) DEFAULT NULL, CHANGE github_username github_username VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE team_tasks CHANGE status status TINYINT(1) DEFAULT NULL, CHANGE deadline deadline DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE team_points CHANGE team_id team_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE teams CHANGE github_repo github_repo VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE projects');
        $this->addSql('ALTER TABLE team_points CHANGE team_id team_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE team_tasks CHANGE status status TINYINT(1) DEFAULT \'NULL\', CHANGE deadline deadline DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE teams CHANGE github_repo github_repo VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE users CHANGE team_id team_id INT DEFAULT NULL, CHANGE skills_id skills_id INT DEFAULT NULL, CHANGE location location VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE github_username github_username VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
