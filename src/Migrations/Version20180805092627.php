<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180805092627 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE contacts (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE bot_contacts');
        $this->addSql('DROP TABLE bot_forse');
        $this->addSql('DROP TABLE bot_forse_fb');
        $this->addSql('DROP TABLE bot_user_status');
        $this->addSql('DROP TABLE facts_about_beer');
        $this->addSql('DROP TABLE facts_about_beer_fb');
        $this->addSql('DROP TABLE page');
        $this->addSql('DROP TABLE start_info');
        $this->addSql('DROP TABLE users');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE bot_contacts (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL COLLATE utf8_general_ci, description TEXT NOT NULL COLLATE utf8_general_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bot_forse (id INT AUTO_INCREMENT NOT NULL, chat_id INT NOT NULL, quaere_id INT NOT NULL, reply VARCHAR(255) NOT NULL COLLATE utf8_general_ci, date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX chat_id (chat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bot_forse_fb (id INT AUTO_INCREMENT NOT NULL, chat_id INT NOT NULL, quaere_id INT NOT NULL, reply VARCHAR(255) NOT NULL COLLATE utf8_general_ci, date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX chat_id (chat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bot_user_status (chat_id INT AUTO_INCREMENT NOT NULL, status INT NOT NULL, PRIMARY KEY(chat_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facts_about_beer (id INT AUTO_INCREMENT NOT NULL, fact TEXT NOT NULL COLLATE utf8_general_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facts_about_beer_fb (id INT AUTO_INCREMENT NOT NULL, fact TEXT NOT NULL COLLATE utf8_general_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE page (id INT NOT NULL, name VARCHAR(45) DEFAULT NULL COLLATE utf8_general_ci, description VARCHAR(45) DEFAULT NULL COLLATE utf8_general_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE start_info (id INT AUTO_INCREMENT NOT NULL, description TEXT NOT NULL COLLATE utf8_general_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, login VARCHAR(50) NOT NULL COLLATE utf8_general_ci, pwd VARCHAR(255) NOT NULL COLLATE utf8_general_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE contacts');
    }
}
