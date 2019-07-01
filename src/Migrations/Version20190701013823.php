<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190701013823 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE adherent ADD compte_rendus_id INT NOT NULL');
        $this->addSql('ALTER TABLE adherent ADD CONSTRAINT FK_90D3F060FA8D690B FOREIGN KEY (compte_rendus_id) REFERENCES compte_rendu (id)');
        $this->addSql('CREATE INDEX IDX_90D3F060FA8D690B ON adherent (compte_rendus_id)');
        $this->addSql('ALTER TABLE compte_rendu DROP FOREIGN KEY FK_D39E69D225F06C53');
        $this->addSql('DROP INDEX IDX_D39E69D225F06C53 ON compte_rendu');
        $this->addSql('ALTER TABLE compte_rendu DROP adherent_id');
        $this->addSql('ALTER TABLE role CHANGE name name VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE adherent DROP FOREIGN KEY FK_90D3F060FA8D690B');
        $this->addSql('DROP INDEX IDX_90D3F060FA8D690B ON adherent');
        $this->addSql('ALTER TABLE adherent DROP compte_rendus_id');
        $this->addSql('ALTER TABLE compte_rendu ADD adherent_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE compte_rendu ADD CONSTRAINT FK_D39E69D225F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id)');
        $this->addSql('CREATE INDEX IDX_D39E69D225F06C53 ON compte_rendu (adherent_id)');
        $this->addSql('ALTER TABLE role CHANGE name name VARCHAR(55) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
