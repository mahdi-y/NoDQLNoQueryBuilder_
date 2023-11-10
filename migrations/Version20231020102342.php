<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231020102342 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE player (id INT AUTO_INCREMENT NOT NULL, stade_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, INDEX IDX_98197A656538AB43 (stade_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stade (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, created_at VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_98197A656538AB43 FOREIGN KEY (stade_id) REFERENCES stade (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE player DROP FOREIGN KEY FK_98197A656538AB43');
        $this->addSql('DROP TABLE player');
        $this->addSql('DROP TABLE stade');
    }
}
