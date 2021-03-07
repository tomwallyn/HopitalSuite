<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201214174311 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sejour (id INT AUTO_INCREMENT NOT NULL, id_patient_id INT NOT NULL, numero_lit_id INT DEFAULT NULL, date_arrive DATETIME NOT NULL, date_sortie DATETIME DEFAULT NULL, INDEX IDX_96F52028CE0312AE (id_patient_id), INDEX IDX_96F520287F4C436D (numero_lit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sejour ADD CONSTRAINT FK_96F52028CE0312AE FOREIGN KEY (id_patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE sejour ADD CONSTRAINT FK_96F520287F4C436D FOREIGN KEY (numero_lit_id) REFERENCES lit (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE sejour');
    }
}
