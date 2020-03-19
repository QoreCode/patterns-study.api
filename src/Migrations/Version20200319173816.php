<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200319173816 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE pattern_diagramm (id INT AUTO_INCREMENT NOT NULL, pattern_id INT NOT NULL, program_language_id INT NOT NULL, image VARCHAR(255) NOT NULL, title VARCHAR(255) DEFAULT NULL, INDEX IDX_FCAA179FF734A20F (pattern_id), INDEX IDX_FCAA179F4EEBF79C (program_language_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE program_language (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, icon VARCHAR(255) NOT NULL, code VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pattern_diagramm ADD CONSTRAINT FK_FCAA179FF734A20F FOREIGN KEY (pattern_id) REFERENCES pattern (id)');
        $this->addSql('ALTER TABLE pattern_diagramm ADD CONSTRAINT FK_FCAA179F4EEBF79C FOREIGN KEY (program_language_id) REFERENCES program_language (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pattern_diagramm DROP FOREIGN KEY FK_FCAA179F4EEBF79C');
        $this->addSql('DROP TABLE pattern_diagramm');
        $this->addSql('DROP TABLE program_language');
    }
}
