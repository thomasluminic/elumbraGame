<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200801213012 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE card_keyword (card_id INT NOT NULL, keyword_id INT NOT NULL, INDEX IDX_D89FB4D4ACC9A20 (card_id), INDEX IDX_D89FB4D115D4552 (keyword_id), PRIMARY KEY(card_id, keyword_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE keyword (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE card_keyword ADD CONSTRAINT FK_D89FB4D4ACC9A20 FOREIGN KEY (card_id) REFERENCES card (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE card_keyword ADD CONSTRAINT FK_D89FB4D115D4552 FOREIGN KEY (keyword_id) REFERENCES keyword (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE card_keyword DROP FOREIGN KEY FK_D89FB4D115D4552');
        $this->addSql('DROP TABLE card_keyword');
        $this->addSql('DROP TABLE keyword');
    }
}
