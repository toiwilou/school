<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230118232110 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE course (id INT AUTO_INCREMENT NOT NULL, teacher_id INT NOT NULL, module_id INT NOT NULL, time_slot_id INT NOT NULL, room_id INT NOT NULL, INDEX IDX_169E6FB941807E1D (teacher_id), INDEX IDX_169E6FB9AFC2B591 (module_id), INDEX IDX_169E6FB9D62B0FA (time_slot_id), INDEX IDX_169E6FB954177093 (room_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE department (id INT AUTO_INCREMENT NOT NULL, faculty_id INT NOT NULL, head_department_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_CD1DE18A680CAB68 (faculty_id), UNIQUE INDEX UNIQ_CD1DE18A9FCAE233 (head_department_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE discipline (id INT AUTO_INCREMENT NOT NULL, department_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_75BEEE3FAE80F5DF (department_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE faculty (id INT AUTO_INCREMENT NOT NULL, dean_id INT NOT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_179660435C07EB8E (dean_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE level_class (id INT AUTO_INCREMENT NOT NULL, discipline_id INT NOT NULL, level VARCHAR(255) NOT NULL, INDEX IDX_87921C96A5522701 (discipline_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE level_class_user (level_class_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_1E6AFED767A9AEC0 (level_class_id), INDEX IDX_1E6AFED7A76ED395 (user_id), PRIMARY KEY(level_class_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, subject VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(20) DEFAULT NULL, content LONGTEXT NOT NULL, call_possibility TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE module (id INT AUTO_INCREMENT NOT NULL, level_class_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_C24262867A9AEC0 (level_class_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE module_user (module_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_37AF9345AFC2B591 (module_id), INDEX IDX_37AF9345A76ED395 (user_id), PRIMARY KEY(module_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE room (id INT AUTO_INCREMENT NOT NULL, wording VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE time_slot (id INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL, start_time TIME NOT NULL, end_time TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, registration_number VARCHAR(10) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, phone VARCHAR(20) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB941807E1D FOREIGN KEY (teacher_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB9AFC2B591 FOREIGN KEY (module_id) REFERENCES module (id)');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB9D62B0FA FOREIGN KEY (time_slot_id) REFERENCES time_slot (id)');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB954177093 FOREIGN KEY (room_id) REFERENCES room (id)');
        $this->addSql('ALTER TABLE department ADD CONSTRAINT FK_CD1DE18A680CAB68 FOREIGN KEY (faculty_id) REFERENCES faculty (id)');
        $this->addSql('ALTER TABLE department ADD CONSTRAINT FK_CD1DE18A9FCAE233 FOREIGN KEY (head_department_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE discipline ADD CONSTRAINT FK_75BEEE3FAE80F5DF FOREIGN KEY (department_id) REFERENCES department (id)');
        $this->addSql('ALTER TABLE faculty ADD CONSTRAINT FK_179660435C07EB8E FOREIGN KEY (dean_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE level_class ADD CONSTRAINT FK_87921C96A5522701 FOREIGN KEY (discipline_id) REFERENCES discipline (id)');
        $this->addSql('ALTER TABLE level_class_user ADD CONSTRAINT FK_1E6AFED767A9AEC0 FOREIGN KEY (level_class_id) REFERENCES level_class (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE level_class_user ADD CONSTRAINT FK_1E6AFED7A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE module ADD CONSTRAINT FK_C24262867A9AEC0 FOREIGN KEY (level_class_id) REFERENCES level_class (id)');
        $this->addSql('ALTER TABLE module_user ADD CONSTRAINT FK_37AF9345AFC2B591 FOREIGN KEY (module_id) REFERENCES module (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE module_user ADD CONSTRAINT FK_37AF9345A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB941807E1D');
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB9AFC2B591');
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB9D62B0FA');
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB954177093');
        $this->addSql('ALTER TABLE department DROP FOREIGN KEY FK_CD1DE18A680CAB68');
        $this->addSql('ALTER TABLE department DROP FOREIGN KEY FK_CD1DE18A9FCAE233');
        $this->addSql('ALTER TABLE discipline DROP FOREIGN KEY FK_75BEEE3FAE80F5DF');
        $this->addSql('ALTER TABLE faculty DROP FOREIGN KEY FK_179660435C07EB8E');
        $this->addSql('ALTER TABLE level_class DROP FOREIGN KEY FK_87921C96A5522701');
        $this->addSql('ALTER TABLE level_class_user DROP FOREIGN KEY FK_1E6AFED767A9AEC0');
        $this->addSql('ALTER TABLE level_class_user DROP FOREIGN KEY FK_1E6AFED7A76ED395');
        $this->addSql('ALTER TABLE module DROP FOREIGN KEY FK_C24262867A9AEC0');
        $this->addSql('ALTER TABLE module_user DROP FOREIGN KEY FK_37AF9345AFC2B591');
        $this->addSql('ALTER TABLE module_user DROP FOREIGN KEY FK_37AF9345A76ED395');
        $this->addSql('DROP TABLE course');
        $this->addSql('DROP TABLE department');
        $this->addSql('DROP TABLE discipline');
        $this->addSql('DROP TABLE faculty');
        $this->addSql('DROP TABLE level_class');
        $this->addSql('DROP TABLE level_class_user');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE module');
        $this->addSql('DROP TABLE module_user');
        $this->addSql('DROP TABLE room');
        $this->addSql('DROP TABLE time_slot');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
