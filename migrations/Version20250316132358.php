<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250316132358 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX `primary` ON order_detail');
        $this->addSql('ALTER TABLE order_detail ADD order_id VARCHAR(255) NOT NULL, DROP `order`');
        $this->addSql('ALTER TABLE order_detail ADD PRIMARY KEY (order_id, product_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX `PRIMARY` ON order_detail');
        $this->addSql('ALTER TABLE order_detail ADD `order` INT NOT NULL, DROP order_id');
        $this->addSql('ALTER TABLE order_detail ADD PRIMARY KEY (`order`, product_id)');
    }
}
