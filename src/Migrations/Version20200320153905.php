<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200320153905 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE pattern (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, icon VARCHAR(255) DEFAULT NULL, problem LONGTEXT NOT NULL, solution LONGTEXT NOT NULL, INDEX IDX_A3BCFC8E12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pattern_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pattern_class (id INT AUTO_INCREMENT NOT NULL, pattern_id INT NOT NULL, program_language_id INT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, code LONGTEXT NOT NULL, INDEX IDX_42972FECF734A20F (pattern_id), INDEX IDX_42972FEC4EEBF79C (program_language_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pattern_diagram (id INT AUTO_INCREMENT NOT NULL, pattern_id INT NOT NULL, title VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1CF59310F734A20F (pattern_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE program_language (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, icon VARCHAR(255) NOT NULL, code VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE progress (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, pattern_id INT DEFAULT NULL, percent INT DEFAULT NULL, INDEX IDX_2201F246A76ED395 (user_id), INDEX IDX_2201F246F734A20F (pattern_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE task (id INT AUTO_INCREMENT NOT NULL, pattern_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, link_to_task_files VARCHAR(255) NOT NULL, link_to_solution_files VARCHAR(255) NOT NULL, help LONGTEXT NOT NULL, INDEX IDX_527EDB25F734A20F (pattern_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, question LONGTEXT NOT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test_pattern (test_id INT NOT NULL, pattern_id INT NOT NULL, INDEX IDX_7FFD28461E5D0459 (test_id), INDEX IDX_7FFD2846F734A20F (pattern_id), PRIMARY KEY(test_id, pattern_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test_answer (id INT AUTO_INCREMENT NOT NULL, test_id INT DEFAULT NULL, answer LONGTEXT NOT NULL, correct TINYINT(1) NOT NULL, INDEX IDX_4D044D0B1E5D0459 (test_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, login VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, birthday DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_role (id INT AUTO_INCREMENT NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pattern ADD CONSTRAINT FK_A3BCFC8E12469DE2 FOREIGN KEY (category_id) REFERENCES pattern_category (id)');
        $this->addSql('ALTER TABLE pattern_class ADD CONSTRAINT FK_42972FECF734A20F FOREIGN KEY (pattern_id) REFERENCES pattern (id)');
        $this->addSql('ALTER TABLE pattern_class ADD CONSTRAINT FK_42972FEC4EEBF79C FOREIGN KEY (program_language_id) REFERENCES program_language (id)');
        $this->addSql('ALTER TABLE pattern_diagram ADD CONSTRAINT FK_1CF59310F734A20F FOREIGN KEY (pattern_id) REFERENCES pattern (id)');
        $this->addSql('ALTER TABLE progress ADD CONSTRAINT FK_2201F246A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE progress ADD CONSTRAINT FK_2201F246F734A20F FOREIGN KEY (pattern_id) REFERENCES pattern (id)');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB25F734A20F FOREIGN KEY (pattern_id) REFERENCES pattern (id)');
        $this->addSql('ALTER TABLE test_pattern ADD CONSTRAINT FK_7FFD28461E5D0459 FOREIGN KEY (test_id) REFERENCES test (id)');
        $this->addSql('ALTER TABLE test_pattern ADD CONSTRAINT FK_7FFD2846F734A20F FOREIGN KEY (pattern_id) REFERENCES pattern (id)');
        $this->addSql('ALTER TABLE test_answer ADD CONSTRAINT FK_4D044D0B1E5D0459 FOREIGN KEY (test_id) REFERENCES test (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pattern_class DROP FOREIGN KEY FK_42972FECF734A20F');
        $this->addSql('ALTER TABLE pattern_diagram DROP FOREIGN KEY FK_1CF59310F734A20F');
        $this->addSql('ALTER TABLE progress DROP FOREIGN KEY FK_2201F246F734A20F');
        $this->addSql('ALTER TABLE task DROP FOREIGN KEY FK_527EDB25F734A20F');
        $this->addSql('ALTER TABLE test_pattern DROP FOREIGN KEY FK_7FFD2846F734A20F');
        $this->addSql('ALTER TABLE pattern DROP FOREIGN KEY FK_A3BCFC8E12469DE2');
        $this->addSql('ALTER TABLE pattern_class DROP FOREIGN KEY FK_42972FEC4EEBF79C');
        $this->addSql('ALTER TABLE test_pattern DROP FOREIGN KEY FK_7FFD28461E5D0459');
        $this->addSql('ALTER TABLE test_answer DROP FOREIGN KEY FK_4D044D0B1E5D0459');
        $this->addSql('ALTER TABLE progress DROP FOREIGN KEY FK_2201F246A76ED395');
        $this->addSql('DROP TABLE pattern');
        $this->addSql('DROP TABLE pattern_category');
        $this->addSql('DROP TABLE pattern_class');
        $this->addSql('DROP TABLE pattern_diagram');
        $this->addSql('DROP TABLE program_language');
        $this->addSql('DROP TABLE progress');
        $this->addSql('DROP TABLE task');
        $this->addSql('DROP TABLE test');
        $this->addSql('DROP TABLE test_pattern');
        $this->addSql('DROP TABLE test_answer');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_role');
    }
}
