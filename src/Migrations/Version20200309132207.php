<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200309132207 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE task (id INT AUTO_INCREMENT NOT NULL, pattern_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, link_on_task_files VARCHAR(255) NOT NULL, link_to_solution_files VARCHAR(255) NOT NULL, help LONGTEXT NOT NULL, INDEX IDX_527EDB25F734A20F (pattern_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_role (id INT AUTO_INCREMENT NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB25F734A20F FOREIGN KEY (pattern_id) REFERENCES pattern (id)');
        $this->addSql('ALTER TABLE pattern CHANGE category_id category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE progress CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE test_pattern DROP FOREIGN KEY FK_7FFD28461E5D0459');
        $this->addSql('ALTER TABLE test_pattern DROP FOREIGN KEY FK_7FFD2846F734A20F');
        $this->addSql('ALTER TABLE test_pattern ADD CONSTRAINT FK_7FFD28461E5D0459 FOREIGN KEY (test_id) REFERENCES test (id)');
        $this->addSql('ALTER TABLE test_pattern ADD CONSTRAINT FK_7FFD2846F734A20F FOREIGN KEY (pattern_id) REFERENCES pattern (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE task');
        $this->addSql('DROP TABLE user_role');
        $this->addSql('ALTER TABLE pattern CHANGE category_id category_id INT NOT NULL');
        $this->addSql('ALTER TABLE progress CHANGE user_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE test_pattern DROP FOREIGN KEY FK_7FFD28461E5D0459');
        $this->addSql('ALTER TABLE test_pattern DROP FOREIGN KEY FK_7FFD2846F734A20F');
        $this->addSql('ALTER TABLE test_pattern ADD CONSTRAINT FK_7FFD28461E5D0459 FOREIGN KEY (test_id) REFERENCES test (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE test_pattern ADD CONSTRAINT FK_7FFD2846F734A20F FOREIGN KEY (pattern_id) REFERENCES pattern (id) ON UPDATE NO ACTION ON DELETE CASCADE');
    }
}
