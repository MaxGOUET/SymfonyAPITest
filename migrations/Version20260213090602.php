<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260213090602 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE computers CHANGE brand brand VARCHAR(255) NOT NULL, CHANGE model model VARCHAR(255) NOT NULL, CHANGE cpu_id cpu_id INT NOT NULL');
        $this->addSql('ALTER TABLE computers ADD CONSTRAINT FK_241951713917014 FOREIGN KEY (cpu_id) REFERENCES cpu (id)');
        $this->addSql('CREATE INDEX IDX_241951713917014 ON computers (cpu_id)');
        $this->addSql('ALTER TABLE cpu CHANGE brand brand VARCHAR(255) NOT NULL, CHANGE model model VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE computers DROP FOREIGN KEY FK_241951713917014');
        $this->addSql('DROP INDEX IDX_241951713917014 ON computers');
        $this->addSql('ALTER TABLE computers CHANGE brand brand VARCHAR(50) NOT NULL, CHANGE model model VARCHAR(100) NOT NULL, CHANGE cpu_id cpu_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cpu CHANGE brand brand VARCHAR(50) NOT NULL, CHANGE model model VARCHAR(100) NOT NULL');
    }
}
