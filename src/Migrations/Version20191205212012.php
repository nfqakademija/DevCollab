<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191205212012 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE team_points (id INT AUTO_INCREMENT NOT NULL, team_id INT DEFAULT NULL, points INT NOT NULL, INDEX IDX_51A1C9F0296CD8AE (team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(255) DEFAULT NULL, lastname VARCHAR(255) DEFAULT NULL, location VARCHAR(255) DEFAULT NULL, short_description LONGTEXT DEFAULT NULL, github_username VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE teams (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, github_repo VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skills (id INT AUTO_INCREMENT NOT NULL, skill VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, team_id INT DEFAULT NULL, skills_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, lastname VARCHAR(255) DEFAULT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, location VARCHAR(255) DEFAULT NULL, github_username VARCHAR(255) DEFAULT NULL, short_description LONGTEXT DEFAULT NULL, roles LONGTEXT DEFAULT NULL, username VARCHAR(255) DEFAULT NULL, INDEX IDX_1483A5E9296CD8AE (team_id), INDEX IDX_1483A5E97FF61858 (skills_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projects (id INT AUTO_INCREMENT NOT NULL, team_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, repository VARCHAR(255) DEFAULT NULL, created DATETIME DEFAULT NULL, deadline DATETIME DEFAULT NULL, INDEX IDX_5C93B3A4296CD8AE (team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team_tasks (id INT AUTO_INCREMENT NOT NULL, team_id INT NOT NULL, task VARCHAR(255) NOT NULL, status TINYINT(1) DEFAULT NULL, deadline DATETIME DEFAULT NULL, INDEX IDX_975E2CD7296CD8AE (team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE team_points ADD CONSTRAINT FK_51A1C9F0296CD8AE FOREIGN KEY (team_id) REFERENCES teams (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9296CD8AE FOREIGN KEY (team_id) REFERENCES teams (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E97FF61858 FOREIGN KEY (skills_id) REFERENCES skills (id)');
        $this->addSql('ALTER TABLE projects ADD CONSTRAINT FK_5C93B3A4296CD8AE FOREIGN KEY (team_id) REFERENCES teams (id)');
        $this->addSql('ALTER TABLE team_tasks ADD CONSTRAINT FK_975E2CD7296CD8AE FOREIGN KEY (team_id) REFERENCES teams (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE team_points DROP FOREIGN KEY FK_51A1C9F0296CD8AE');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9296CD8AE');
        $this->addSql('ALTER TABLE projects DROP FOREIGN KEY FK_5C93B3A4296CD8AE');
        $this->addSql('ALTER TABLE team_tasks DROP FOREIGN KEY FK_975E2CD7296CD8AE');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E97FF61858');
        $this->addSql('DROP TABLE team_points');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE teams');
        $this->addSql('DROP TABLE skills');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE projects');
        $this->addSql('DROP TABLE team_tasks');
    }
}
