<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210518085250 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE livre_domaine (livre_id INT NOT NULL, domaine_id INT NOT NULL, INDEX IDX_B5DC4E9837D925CB (livre_id), INDEX IDX_B5DC4E984272FC9F (domaine_id), PRIMARY KEY(livre_id, domaine_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE livre_domaine ADD CONSTRAINT FK_B5DC4E9837D925CB FOREIGN KEY (livre_id) REFERENCES livre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livre_domaine ADD CONSTRAINT FK_B5DC4E984272FC9F FOREIGN KEY (domaine_id) REFERENCES domaine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livre ADD id_auteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F99E08ED3C1 FOREIGN KEY (id_auteur_id) REFERENCES auteur (id)');
        $this->addSql('CREATE INDEX IDX_AC634F99E08ED3C1 ON livre (id_auteur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE livre_domaine');
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F99E08ED3C1');
        $this->addSql('DROP INDEX IDX_AC634F99E08ED3C1 ON livre');
        $this->addSql('ALTER TABLE livre DROP id_auteur_id');
    }
}
