<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240209102159 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE alumnos (nif VARCHAR(9) NOT NULL, nombre VARCHAR(50) NOT NULL, fechanac DATE NOT NULL, pagado TINYINT(1) NOT NULL, importe NUMERIC(6, 2) NOT NULL, docentes_nif VARCHAR(9) NOT NULL, INDEX IDX_5EC5A6AB454D2764 (docentes_nif), PRIMARY KEY(nif)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE docentes (nif VARCHAR(9) NOT NULL, nombre VARCHAR(50) NOT NULL, edad SMALLINT DEFAULT NULL, PRIMARY KEY(nif)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE alumnos ADD CONSTRAINT FK_5EC5A6AB454D2764 FOREIGN KEY (docentes_nif) REFERENCES docentes (nif)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alumnos DROP FOREIGN KEY FK_5EC5A6AB454D2764');
        $this->addSql('DROP TABLE alumnos');
        $this->addSql('DROP TABLE docentes');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
