<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191217110634 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE team_points (id INT AUTO_INCREMENT NOT NULL, team_id INT NOT NULL, points INT NOT NULL, INDEX IDX_51A1C9F0296CD8AE (team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team_tasks (id INT AUTO_INCREMENT NOT NULL, team_id INT NOT NULL, task VARCHAR(255) NOT NULL, status TINYINT(1) DEFAULT NULL, deadline DATETIME DEFAULT NULL, INDEX IDX_975E2CD7296CD8AE (team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE teams (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, github_repo VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skills (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, skill VARCHAR(255) NOT NULL, INDEX IDX_D5311670A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, team_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, lastname VARCHAR(255) DEFAULT NULL, username VARCHAR(255) DEFAULT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, location VARCHAR(255) DEFAULT NULL, github_username VARCHAR(255) DEFAULT NULL, short_description LONGTEXT DEFAULT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json_array)\', INDEX IDX_8D93D649296CD8AE (team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projects (id INT AUTO_INCREMENT NOT NULL, team_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, repository VARCHAR(255) DEFAULT NULL, created DATETIME DEFAULT NULL, deadline DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_5C93B3A4296CD8AE (team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE team_points ADD CONSTRAINT FK_51A1C9F0296CD8AE FOREIGN KEY (team_id) REFERENCES teams (id)');
        $this->addSql('ALTER TABLE team_tasks ADD CONSTRAINT FK_975E2CD7296CD8AE FOREIGN KEY (team_id) REFERENCES teams (id)');
        $this->addSql('ALTER TABLE skills ADD CONSTRAINT FK_D5311670A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649296CD8AE FOREIGN KEY (team_id) REFERENCES teams (id)');
        $this->addSql('ALTER TABLE projects ADD CONSTRAINT FK_5C93B3A4296CD8AE FOREIGN KEY (team_id) REFERENCES teams (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE team_points DROP FOREIGN KEY FK_51A1C9F0296CD8AE');
        $this->addSql('ALTER TABLE team_tasks DROP FOREIGN KEY FK_975E2CD7296CD8AE');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649296CD8AE');
        $this->addSql('ALTER TABLE projects DROP FOREIGN KEY FK_5C93B3A4296CD8AE');
        $this->addSql('ALTER TABLE skills DROP FOREIGN KEY FK_D5311670A76ED395');
        $this->addSql('DROP TABLE team_points');
        $this->addSql('DROP TABLE team_tasks');
        $this->addSql('DROP TABLE teams');
        $this->addSql('DROP TABLE skills');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE projects');
    }
}
