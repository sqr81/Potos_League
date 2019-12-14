<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191212130629 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, subject VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_23A0E6612469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE member (id INT AUTO_INCREMENT NOT NULL, nfl_team_id INT NOT NULL, user_group_id INT NOT NULL, first_name VARCHAR(255) NOT NULL, team VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, INDEX IDX_70E4FA78378DECEF (nfl_team_id), INDEX IDX_70E4FA781ED93D47 (user_group_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, user_group_id INT NOT NULL, subject VARCHAR(255) NOT NULL, article LONGTEXT NOT NULL, created_at DATETIME NOT NULL, picture VARCHAR(255) DEFAULT NULL, INDEX IDX_1DD39950A76ED395 (user_id), INDEX IDX_1DD399501ED93D47 (user_group_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nfl_team (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, logo_banner VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE score (id INT AUTO_INCREMENT NOT NULL, season_id INT NOT NULL, home_id INT NOT NULL, away_id INT NOT NULL, week INT NOT NULL, score1 BIGINT NOT NULL, score2 NUMERIC(10, 2) NOT NULL, INDEX IDX_329937514EC001D1 (season_id), INDEX IDX_3299375128CDC89C (home_id), INDEX IDX_329937518DEF089F (away_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE season (id INT AUTO_INCREMENT NOT NULL, start_year INT NOT NULL, end_year INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, pseudo VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D64986CC499D (pseudo), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_group (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_8F02BF9DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_group_has_user (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, user_group_id INT NOT NULL, is_valid TINYINT(1) NOT NULL, INDEX IDX_B27A9E30A76ED395 (user_id), INDEX IDX_B27A9E301ED93D47 (user_group_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6612469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE member ADD CONSTRAINT FK_70E4FA78378DECEF FOREIGN KEY (nfl_team_id) REFERENCES nfl_team (id)');
        $this->addSql('ALTER TABLE member ADD CONSTRAINT FK_70E4FA781ED93D47 FOREIGN KEY (user_group_id) REFERENCES user_group (id)');
        $this->addSql('ALTER TABLE news ADD CONSTRAINT FK_1DD39950A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE news ADD CONSTRAINT FK_1DD399501ED93D47 FOREIGN KEY (user_group_id) REFERENCES user_group (id)');
        $this->addSql('ALTER TABLE score ADD CONSTRAINT FK_329937514EC001D1 FOREIGN KEY (season_id) REFERENCES season (id)');
        $this->addSql('ALTER TABLE score ADD CONSTRAINT FK_3299375128CDC89C FOREIGN KEY (home_id) REFERENCES member (id)');
        $this->addSql('ALTER TABLE score ADD CONSTRAINT FK_329937518DEF089F FOREIGN KEY (away_id) REFERENCES member (id)');
        $this->addSql('ALTER TABLE user_group ADD CONSTRAINT FK_8F02BF9DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_group_has_user ADD CONSTRAINT FK_B27A9E30A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_group_has_user ADD CONSTRAINT FK_B27A9E301ED93D47 FOREIGN KEY (user_group_id) REFERENCES user_group (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E6612469DE2');
        $this->addSql('ALTER TABLE score DROP FOREIGN KEY FK_3299375128CDC89C');
        $this->addSql('ALTER TABLE score DROP FOREIGN KEY FK_329937518DEF089F');
        $this->addSql('ALTER TABLE member DROP FOREIGN KEY FK_70E4FA78378DECEF');
        $this->addSql('ALTER TABLE score DROP FOREIGN KEY FK_329937514EC001D1');
        $this->addSql('ALTER TABLE news DROP FOREIGN KEY FK_1DD39950A76ED395');
        $this->addSql('ALTER TABLE user_group DROP FOREIGN KEY FK_8F02BF9DA76ED395');
        $this->addSql('ALTER TABLE user_group_has_user DROP FOREIGN KEY FK_B27A9E30A76ED395');
        $this->addSql('ALTER TABLE member DROP FOREIGN KEY FK_70E4FA781ED93D47');
        $this->addSql('ALTER TABLE news DROP FOREIGN KEY FK_1DD399501ED93D47');
        $this->addSql('ALTER TABLE user_group_has_user DROP FOREIGN KEY FK_B27A9E301ED93D47');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE member');
        $this->addSql('DROP TABLE news');
        $this->addSql('DROP TABLE nfl_team');
        $this->addSql('DROP TABLE score');
        $this->addSql('DROP TABLE season');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_group');
        $this->addSql('DROP TABLE user_group_has_user');
    }
}
