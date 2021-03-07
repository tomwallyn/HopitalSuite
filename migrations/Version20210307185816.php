<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210307185816 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE rdv (id INT AUTO_INCREMENT NOT NULL, id_patient_id INT NOT NULL, id_medecin_id INT DEFAULT NULL, date DATETIME DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, INDEX IDX_10C31F86CE0312AE (id_patient_id), INDEX IDX_10C31F86A1799A53 (id_medecin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F86CE0312AE FOREIGN KEY (id_patient_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F86A1799A53 FOREIGN KEY (id_medecin_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE rdv');
    }
}
