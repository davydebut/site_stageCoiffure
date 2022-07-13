<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220713131050 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455B83297E7');
        $this->addSql('DROP INDEX IDX_C7440455B83297E7 ON client');
        $this->addSql('ALTER TABLE client DROP reservation_id');
        $this->addSql('ALTER TABLE prestation DROP FOREIGN KEY FK_51C88FADB83297E7');
        $this->addSql('DROP INDEX IDX_51C88FADB83297E7 ON prestation');
        $this->addSql('ALTER TABLE prestation DROP reservation_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client ADD reservation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('CREATE INDEX IDX_C7440455B83297E7 ON client (reservation_id)');
        $this->addSql('ALTER TABLE prestation ADD reservation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE prestation ADD CONSTRAINT FK_51C88FADB83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('CREATE INDEX IDX_51C88FADB83297E7 ON prestation (reservation_id)');
    }
}
