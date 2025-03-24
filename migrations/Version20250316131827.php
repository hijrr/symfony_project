<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250316131827 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie DROP FOREIGN KEY FK_497DD634B3750AF4');
        $this->addSql('DROP INDEX IDX_497DD634B3750AF4 ON categorie');
        $this->addSql('ALTER TABLE categorie CHANGE parent_id_id parent_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE categorie ADD CONSTRAINT FK_497DD634727ACA70 FOREIGN KEY (parent_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_497DD634727ACA70 ON categorie (parent_id)');
        $this->addSql('ALTER TABLE coupon DROP FOREIGN KEY FK_64BF3F0210EB28A1');
        $this->addSql('DROP INDEX IDX_64BF3F0210EB28A1 ON coupon');
        $this->addSql('ALTER TABLE coupon CHANGE coupon_type_id_id coupon_type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE coupon ADD CONSTRAINT FK_64BF3F022A24CF05 FOREIGN KEY (coupon_type_id) REFERENCES coupon_type (id)');
        $this->addSql('CREATE INDEX IDX_64BF3F022A24CF05 ON coupon (coupon_type_id)');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FDE18E50B');
        $this->addSql('DROP INDEX IDX_C53D045FDE18E50B ON image');
        $this->addSql('ALTER TABLE image CHANGE product_id_id product_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_C53D045F4584665A ON image (product_id)');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398910AC1A7');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993989D86650F');
        $this->addSql('DROP INDEX IDX_F52993989D86650F ON `order`');
        $this->addSql('DROP INDEX IDX_F5299398910AC1A7 ON `order`');
        $this->addSql('ALTER TABLE `order` ADD coupon_id INT DEFAULT NULL, ADD user_id INT DEFAULT NULL, DROP coupon_id_id, DROP user_id_id');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F529939866C5951B FOREIGN KEY (coupon_id) REFERENCES coupon (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_F529939866C5951B ON `order` (coupon_id)');
        $this->addSql('CREATE INDEX IDX_F5299398A76ED395 ON `order` (user_id)');
        $this->addSql('ALTER TABLE order_detail DROP FOREIGN KEY FK_ED896F46DE18E50B');
        $this->addSql('DROP INDEX IDX_ED896F46DE18E50B ON order_detail');
        $this->addSql('DROP INDEX `primary` ON order_detail');
        $this->addSql('ALTER TABLE order_detail CHANGE order_id `order` VARCHAR(255) NOT NULL, CHANGE product_id_id product_id INT NOT NULL');
        $this->addSql('ALTER TABLE order_detail ADD CONSTRAINT FK_ED896F464584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_ED896F464584665A ON order_detail (product_id)');
        $this->addSql('ALTER TABLE order_detail ADD PRIMARY KEY (`order`, product_id)');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD8A3C7387');
        $this->addSql('DROP INDEX IDX_D34A04AD8A3C7387 ON product');
        $this->addSql('ALTER TABLE product CHANGE categorie_id_id categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_D34A04ADBCF5E72D ON product (categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie DROP FOREIGN KEY FK_497DD634727ACA70');
        $this->addSql('DROP INDEX IDX_497DD634727ACA70 ON categorie');
        $this->addSql('ALTER TABLE categorie CHANGE parent_id parent_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE categorie ADD CONSTRAINT FK_497DD634B3750AF4 FOREIGN KEY (parent_id_id) REFERENCES categorie (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_497DD634B3750AF4 ON categorie (parent_id_id)');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F529939866C5951B');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398A76ED395');
        $this->addSql('DROP INDEX IDX_F529939866C5951B ON `order`');
        $this->addSql('DROP INDEX IDX_F5299398A76ED395 ON `order`');
        $this->addSql('ALTER TABLE `order` ADD coupon_id_id INT DEFAULT NULL, ADD user_id_id INT DEFAULT NULL, DROP coupon_id, DROP user_id');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398910AC1A7 FOREIGN KEY (coupon_id_id) REFERENCES coupon (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993989D86650F FOREIGN KEY (user_id_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_F52993989D86650F ON `order` (user_id_id)');
        $this->addSql('CREATE INDEX IDX_F5299398910AC1A7 ON `order` (coupon_id_id)');
        $this->addSql('ALTER TABLE order_detail DROP FOREIGN KEY FK_ED896F464584665A');
        $this->addSql('DROP INDEX IDX_ED896F464584665A ON order_detail');
        $this->addSql('DROP INDEX `PRIMARY` ON order_detail');
        $this->addSql('ALTER TABLE order_detail CHANGE `order` order_id VARCHAR(255) NOT NULL, CHANGE product_id product_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE order_detail ADD CONSTRAINT FK_ED896F46DE18E50B FOREIGN KEY (product_id_id) REFERENCES product (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_ED896F46DE18E50B ON order_detail (product_id_id)');
        $this->addSql('ALTER TABLE order_detail ADD PRIMARY KEY (order_id, product_id_id)');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F4584665A');
        $this->addSql('DROP INDEX IDX_C53D045F4584665A ON image');
        $this->addSql('ALTER TABLE image CHANGE product_id product_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FDE18E50B FOREIGN KEY (product_id_id) REFERENCES product (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_C53D045FDE18E50B ON image (product_id_id)');
        $this->addSql('ALTER TABLE coupon DROP FOREIGN KEY FK_64BF3F022A24CF05');
        $this->addSql('DROP INDEX IDX_64BF3F022A24CF05 ON coupon');
        $this->addSql('ALTER TABLE coupon CHANGE coupon_type_id coupon_type_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE coupon ADD CONSTRAINT FK_64BF3F0210EB28A1 FOREIGN KEY (coupon_type_id_id) REFERENCES coupon_type (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_64BF3F0210EB28A1 ON coupon (coupon_type_id_id)');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADBCF5E72D');
        $this->addSql('DROP INDEX IDX_D34A04ADBCF5E72D ON product');
        $this->addSql('ALTER TABLE product CHANGE categorie_id categorie_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD8A3C7387 FOREIGN KEY (categorie_id_id) REFERENCES categorie (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_D34A04AD8A3C7387 ON product (categorie_id_id)');
    }
}
