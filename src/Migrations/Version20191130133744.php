<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191130133744 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE sprints DROP FOREIGN KEY FK_4EE469711EDE0F55');
        $this->addSql('ALTER TABLE project_details DROP FOREIGN KEY FK_E43807EF1EDE0F55');
        $this->addSql('ALTER TABLE users_skills DROP FOREIGN KEY FK_DAD698E07FF61858');
        $this->addSql('ALTER TABLE projects DROP FOREIGN KEY FK_5C93B3A4296CD8AE');
        $this->addSql('ALTER TABLE sprints DROP FOREIGN KEY FK_4EE46971296CD8AE');
        $this->addSql('ALTER TABLE team_points DROP FOREIGN KEY FK_51A1C9F0296CD8AE');
        $this->addSql('ALTER TABLE team_tasks DROP FOREIGN KEY FK_975E2CD7296CD8AE');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9296CD8AE');
        $this->addSql('DROP TABLE project_details');
        $this->addSql('DROP TABLE projects');
        $this->addSql('DROP TABLE skills');
        $this->addSql('DROP TABLE sprints');
        $this->addSql('DROP TABLE team_points');
        $this->addSql('DROP TABLE team_tasks');
        $this->addSql('DROP TABLE teams');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE users_skills');
        $this->addSql('DROP INDEX IDX_1483A5E9296CD8AE ON users');
        $this->addSql('ALTER TABLE users DROP team_id, CHANGE lastname lastname VARCHAR(255) NOT NULL, CHANGE location location VARCHAR(255) DEFAULT NULL, CHANGE github_username github_username VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE project_details (id INT AUTO_INCREMENT NOT NULL, projects_id INT DEFAULT NULL, repository VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, created DATETIME DEFAULT \'NULL\', deadline DATETIME DEFAULT \'NULL\', INDEX IDX_E43807EF1EDE0F55 (projects_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE projects (id INT AUTO_INCREMENT NOT NULL, team_id INT NOT NULL, title VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, UNIQUE INDEX UNIQ_5C93B3A4296CD8AE (team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE skills (id INT AUTO_INCREMENT NOT NULL, skills VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE sprints (id INT AUTO_INCREMENT NOT NULL, team_id INT NOT NULL, projects_id INT NOT NULL, start DATETIME NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, deadline DATETIME DEFAULT \'NULL\', points INT DEFAULT NULL, INDEX IDX_4EE469711EDE0F55 (projects_id), UNIQUE INDEX UNIQ_4EE46971296CD8AE (team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE team_points (id INT AUTO_INCREMENT NOT NULL, team_id INT NOT NULL, points INT DEFAULT NULL, INDEX IDX_51A1C9F0296CD8AE (team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE team_tasks (id INT AUTO_INCREMENT NOT NULL, team_id INT NOT NULL, task VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, created_by VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, status TINYINT(1) DEFAULT \'NULL\', INDEX IDX_975E2CD7296CD8AE (team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE teams (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, github_repo VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL COLLATE utf8mb4_unicode_ci, roles LONGTEXT NOT NULL COLLATE utf8mb4_bin, password VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, lastname VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, location VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, short_description LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, github_username VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE users_skills (users_id INT NOT NULL, skills_id INT NOT NULL, INDEX IDX_DAD698E07FF61858 (skills_id), INDEX IDX_DAD698E067B3B43D (users_id), PRIMARY KEY(users_id, skills_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE project_details ADD CONSTRAINT FK_E43807EF1EDE0F55 FOREIGN KEY (projects_id) REFERENCES projects (id)');
        $this->addSql('ALTER TABLE projects ADD CONSTRAINT FK_5C93B3A4296CD8AE FOREIGN KEY (team_id) REFERENCES teams (id)');
        $this->addSql('ALTER TABLE sprints ADD CONSTRAINT FK_4EE469711EDE0F55 FOREIGN KEY (projects_id) REFERENCES project_details (id)');
        $this->addSql('ALTER TABLE sprints ADD CONSTRAINT FK_4EE46971296CD8AE FOREIGN KEY (team_id) REFERENCES teams (id)');
        $this->addSql('ALTER TABLE team_points ADD CONSTRAINT FK_51A1C9F0296CD8AE FOREIGN KEY (team_id) REFERENCES teams (id)');
        $this->addSql('ALTER TABLE team_tasks ADD CONSTRAINT FK_975E2CD7296CD8AE FOREIGN KEY (team_id) REFERENCES teams (id)');
        $this->addSql('ALTER TABLE users_skills ADD CONSTRAINT FK_DAD698E067B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users_skills ADD CONSTRAINT FK_DAD698E07FF61858 FOREIGN KEY (skills_id) REFERENCES skills (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users ADD team_id INT DEFAULT NULL, CHANGE lastname lastname VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE location location VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE github_username github_username VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9296CD8AE FOREIGN KEY (team_id) REFERENCES teams (id)');
        $this->addSql('CREATE INDEX IDX_1483A5E9296CD8AE ON users (team_id)');
    }
}
