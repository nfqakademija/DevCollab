<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191121134608 extends AbstractMigration
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
        $this->addSql('ALTER TABLE team_tasks CHANGE created_by created_by VARCHAR(255) DEFAULT NULL, CHANGE status status TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE teams CHANGE github_repo github_repo VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE sprints ADD team_id INT NOT NULL, ADD projects_id INT NOT NULL, CHANGE deadline deadline DATETIME DEFAULT NULL, CHANGE points points INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sprints ADD CONSTRAINT FK_4EE46971296CD8AE FOREIGN KEY (team_id) REFERENCES teams (id)');
        $this->addSql('ALTER TABLE sprints ADD CONSTRAINT FK_4EE469711EDE0F55 FOREIGN KEY (projects_id) REFERENCES project_details (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4EE46971296CD8AE ON sprints (team_id)');
        $this->addSql('CREATE INDEX IDX_4EE469711EDE0F55 ON sprints (projects_id)');
        $this->addSql('ALTER TABLE users CHANGE lastname lastname VARCHAR(255) DEFAULT NULL, CHANGE location location VARCHAR(255) DEFAULT NULL, CHANGE github_username github_username VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE project_details CHANGE repository repository VARCHAR(255) DEFAULT NULL, CHANGE created created DATETIME DEFAULT NULL, CHANGE deadline deadline DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE project_details CHANGE repository repository VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE created created DATETIME DEFAULT \'NULL\', CHANGE deadline deadline DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE sprints DROP FOREIGN KEY FK_4EE46971296CD8AE');
        $this->addSql('ALTER TABLE sprints DROP FOREIGN KEY FK_4EE469711EDE0F55');
        $this->addSql('DROP INDEX UNIQ_4EE46971296CD8AE ON sprints');
        $this->addSql('DROP INDEX IDX_4EE469711EDE0F55 ON sprints');
        $this->addSql('ALTER TABLE sprints DROP team_id, DROP projects_id, CHANGE deadline deadline DATETIME DEFAULT \'NULL\', CHANGE points points INT DEFAULT NULL');
        $this->addSql('ALTER TABLE team_points CHANGE points points INT DEFAULT NULL');
        $this->addSql('ALTER TABLE team_tasks CHANGE created_by created_by VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE status status TINYINT(1) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE teams CHANGE github_repo github_repo VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE users CHANGE lastname lastname VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE location location VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE github_username github_username VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
