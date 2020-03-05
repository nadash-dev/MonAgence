<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200302121331 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE proprety ADD surface INT NOT NULL, ADD rooms INT NOT NULL,
                           ADD badrooms INT NOT NULL, ADD price INT NOT NULL, ADD floor INT NOT NULL, 
                           ADD heat INT NOT NULL, ADD city VARCHAR(255) NOT NULL, ADD adresse VARCHAR(255) NOT NULL, 
                           ADD postal_code VARCHAR(255) NOT NULL, ADD sold TINYINT(1) DEFAULT \'0\' NOT NULL, 
                           ADD created_at DATETIME NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE proprety DROP surface, DROP rooms, DROP badrooms, DROP price, DROP floor, DROP heat, DROP city, DROP adresse, DROP postal_code, DROP sold, DROP created_at');
    }
}
