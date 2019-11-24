<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191121155826 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE team_points CHANGE points points INT DEFAULT NULL');
        $this->addSql('ALTER TABLE team_tasks ADD team_id INT NOT NULL, CHANGE created_by created_by VARCHAR(255) DEFAULT NULL, CHANGE status status TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE team_tasks ADD CONSTRAINT FK_975E2CD7296CD8AE FOREIGN KEY (team_id) REFERENCES teams (id)');
        $this->addSql('CREATE INDEX IDX_975E2CD7296CD8AE ON team_tasks (team_id)');
        $this->addSql('ALTER TABLE teams CHANGE github_repo github_repo VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE sprints CHANGE deadline deadline DATETIME DEFAULT NULL, CHANGE points points INT DEFAULT NULL');
        $this->addSql('ALTER TABLE users CHANGE team_id team_id INT DEFAULT NULL, CHANGE lastname lastname VARCHAR(255) DEFAULT NULL, CHANGE location location VARCHAR(255) DEFAULT NULL, CHANGE github_username github_username VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE project_details CHANGE projects_id projects_id INT DEFAULT NULL, CHANGE repository repository VARCHAR(255) DEFAULT NULL, CHANGE created created DATETIME DEFAULT NULL, CHANGE deadline deadline DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE project_details CHANGE projects_id projects_id INT DEFAULT NULL, CHANGE repository repository VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE created created DATETIME DEFAULT \'NULL\', CHANGE deadline deadline DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE sprints CHANGE deadline deadline DATETIME DEFAULT \'NULL\', CHANGE points points INT DEFAULT NULL');
        $this->addSql('ALTER TABLE team_points CHANGE points points INT DEFAULT NULL');
        $this->addSql('ALTER TABLE team_tasks DROP FOREIGN KEY FK_975E2CD7296CD8AE');
        $this->addSql('DROP INDEX IDX_975E2CD7296CD8AE ON team_tasks');
        $this->addSql('ALTER TABLE team_tasks DROP team_id, CHANGE created_by created_by VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE status status TINYINT(1) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE teams CHANGE github_repo github_repo VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE users CHANGE team_id team_id INT DEFAULT NULL, CHANGE lastname lastname VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE location location VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE github_username github_username VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
