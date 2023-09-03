<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230903112202 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, pizza_id INT DEFAULT NULL, promo_id INT DEFAULT NULL, boisson_id INT DEFAULT NULL, canette_id INT DEFAULT NULL, dessert_id INT DEFAULT NULL, extra_id INT DEFAULT NULL, prix DOUBLE PRECISION NOT NULL, quantity INT NOT NULL, INDEX IDX_23A0E66D41D1D42 (pizza_id), INDEX IDX_23A0E66D0C07AFF (promo_id), INDEX IDX_23A0E66734B8089 (boisson_id), INDEX IDX_23A0E6687B481E2 (canette_id), INDEX IDX_23A0E66745B52FD (dessert_id), INDEX IDX_23A0E662B959FC6 (extra_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66D41D1D42 FOREIGN KEY (pizza_id) REFERENCES pizza (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66D0C07AFF FOREIGN KEY (promo_id) REFERENCES promo (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66734B8089 FOREIGN KEY (boisson_id) REFERENCES boisson (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6687B481E2 FOREIGN KEY (canette_id) REFERENCES canette (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66745B52FD FOREIGN KEY (dessert_id) REFERENCES dessert (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E662B959FC6 FOREIGN KEY (extra_id) REFERENCES extra (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66D41D1D42');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66D0C07AFF');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66734B8089');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E6687B481E2');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66745B52FD');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E662B959FC6');
        $this->addSql('DROP TABLE article');
    }
}
