<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220712134904 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation ADD pro_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955C3B7E4BA FOREIGN KEY (pro_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_42C84955C3B7E4BA ON reservation (pro_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955C3B7E4BA');
        $this->addSql('DROP INDEX IDX_42C84955C3B7E4BA ON reservation');
        $this->addSql('ALTER TABLE reservation DROP pro_id');
    }
}
