<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200303080206 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE pattern_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE progress (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, pattern_id INT DEFAULT NULL, percent INT DEFAULT NULL, INDEX IDX_2201F246A76ED395 (user_id), INDEX IDX_2201F246F734A20F (pattern_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test_pattern (test_id INT NOT NULL, pattern_id INT NOT NULL, INDEX IDX_7FFD28461E5D0459 (test_id), INDEX IDX_7FFD2846F734A20F (pattern_id), PRIMARY KEY(test_id, pattern_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test_answer (id INT AUTO_INCREMENT NOT NULL, test_id INT DEFAULT NULL, answer LONGTEXT NOT NULL, correct TINYINT(1) NOT NULL, INDEX IDX_4D044D0B1E5D0459 (test_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE progress ADD CONSTRAINT FK_2201F246A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE progress ADD CONSTRAINT FK_2201F246F734A20F FOREIGN KEY (pattern_id) REFERENCES pattern (id)');
        $this->addSql('ALTER TABLE test_pattern ADD CONSTRAINT FK_7FFD28461E5D0459 FOREIGN KEY (test_id) REFERENCES test (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE test_pattern ADD CONSTRAINT FK_7FFD2846F734A20F FOREIGN KEY (pattern_id) REFERENCES pattern (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE test_answer ADD CONSTRAINT FK_4D044D0B1E5D0459 FOREIGN KEY (test_id) REFERENCES test (id)');
        $this->addSql('ALTER TABLE pattern ADD category_id INT NOT NULL');
        $this->addSql('ALTER TABLE pattern ADD CONSTRAINT FK_A3BCFC8E12469DE2 FOREIGN KEY (category_id) REFERENCES pattern_category (id)');
        $this->addSql('CREATE INDEX IDX_A3BCFC8E12469DE2 ON pattern (category_id)');
        $this->addSql('ALTER TABLE test ADD question LONGTEXT NOT NULL, ADD image VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pattern DROP FOREIGN KEY FK_A3BCFC8E12469DE2');
        $this->addSql('DROP TABLE pattern_category');
        $this->addSql('DROP TABLE progress');
        $this->addSql('DROP TABLE test_pattern');
        $this->addSql('DROP TABLE test_answer');
        $this->addSql('DROP INDEX IDX_A3BCFC8E12469DE2 ON pattern');
        $this->addSql('ALTER TABLE pattern DROP category_id');
        $this->addSql('ALTER TABLE test DROP question, DROP image');
    }
}
