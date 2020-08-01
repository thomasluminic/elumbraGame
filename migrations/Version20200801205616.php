<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200801205616 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE card ADD card_type_id INT NOT NULL, ADD faction_id INT NOT NULL, ADD placement_id INT NOT NULL, ADD rarity_id INT NOT NULL, ADD type_id INT NOT NULL, ADD picture VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE card ADD CONSTRAINT FK_161498D3925606E5 FOREIGN KEY (card_type_id) REFERENCES card_type (id)');
        $this->addSql('ALTER TABLE card ADD CONSTRAINT FK_161498D34448F8DA FOREIGN KEY (faction_id) REFERENCES faction (id)');
        $this->addSql('ALTER TABLE card ADD CONSTRAINT FK_161498D32F966E9D FOREIGN KEY (placement_id) REFERENCES placement (id)');
        $this->addSql('ALTER TABLE card ADD CONSTRAINT FK_161498D3F3747573 FOREIGN KEY (rarity_id) REFERENCES rarity (id)');
        $this->addSql('ALTER TABLE card ADD CONSTRAINT FK_161498D3C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('CREATE INDEX IDX_161498D3925606E5 ON card (card_type_id)');
        $this->addSql('CREATE INDEX IDX_161498D34448F8DA ON card (faction_id)');
        $this->addSql('CREATE INDEX IDX_161498D32F966E9D ON card (placement_id)');
        $this->addSql('CREATE INDEX IDX_161498D3F3747573 ON card (rarity_id)');
        $this->addSql('CREATE INDEX IDX_161498D3C54C8C93 ON card (type_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE card DROP FOREIGN KEY FK_161498D3925606E5');
        $this->addSql('ALTER TABLE card DROP FOREIGN KEY FK_161498D34448F8DA');
        $this->addSql('ALTER TABLE card DROP FOREIGN KEY FK_161498D32F966E9D');
        $this->addSql('ALTER TABLE card DROP FOREIGN KEY FK_161498D3F3747573');
        $this->addSql('ALTER TABLE card DROP FOREIGN KEY FK_161498D3C54C8C93');
        $this->addSql('DROP INDEX IDX_161498D3925606E5 ON card');
        $this->addSql('DROP INDEX IDX_161498D34448F8DA ON card');
        $this->addSql('DROP INDEX IDX_161498D32F966E9D ON card');
        $this->addSql('DROP INDEX IDX_161498D3F3747573 ON card');
        $this->addSql('DROP INDEX IDX_161498D3C54C8C93 ON card');
        $this->addSql('ALTER TABLE card DROP card_type_id, DROP faction_id, DROP placement_id, DROP rarity_id, DROP type_id, DROP picture');
    }
}
