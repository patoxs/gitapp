<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180706014206 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('DROP SEQUENCE role_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE user_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE merge_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE incidence_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE team_user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE status_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE public.Role_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE tasktype_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE file_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE public.user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE type_branch_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE public.team_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE commit_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE priority_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE task_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE project_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE branch_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE merge (id INT NOT NULL, id_branch_merge_id INT DEFAULT NULL, id_branch_task_id INT DEFAULT NULL, id_project_id INT DEFAULT NULL, id_user_id INT DEFAULT NULL, id_type_branch_id INT DEFAULT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_EB6997591BF0F8E ON merge (id_branch_merge_id)');
        $this->addSql('CREATE INDEX IDX_EB699759AB24788E ON merge (id_branch_task_id)');
        $this->addSql('CREATE INDEX IDX_EB699759B3E79F4B ON merge (id_project_id)');
        $this->addSql('CREATE INDEX IDX_EB69975979F37AE5 ON merge (id_user_id)');
        $this->addSql('CREATE INDEX IDX_EB6997595576305F ON merge (id_type_branch_id)');
        $this->addSql('CREATE TABLE incidence (id INT NOT NULL, name VARCHAR(255) NOT NULL, icon VARCHAR(50) NOT NULL, color VARCHAR(15) NOT NULL, active BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE team_user (id INT NOT NULL, id_user_id INT DEFAULT NULL, id_role_id INT DEFAULT NULL, id_team_id INT DEFAULT NULL, date_create TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, date_end TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5C72223279F37AE5 ON team_user (id_user_id)');
        $this->addSql('CREATE INDEX IDX_5C72223289E8BDC ON team_user (id_role_id)');
        $this->addSql('CREATE INDEX IDX_5C722232F7F171DE ON team_user (id_team_id)');
        $this->addSql('CREATE TABLE status (id INT NOT NULL, name VARCHAR(255) NOT NULL, icon VARCHAR(50) NOT NULL, color VARCHAR(15) NOT NULL, active BOOLEAN NOT NULL, is_end BOOLEAN NOT NULL, is_start BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE public.Role (id INT NOT NULL, name VARCHAR(100) NOT NULL, icon VARCHAR(50) NOT NULL, color VARCHAR(15) NOT NULL, active BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE tasktype (id INT NOT NULL, name VARCHAR(255) NOT NULL, icon VARCHAR(50) NOT NULL, color VARCHAR(15) NOT NULL, active BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE file (id INT NOT NULL, id_task_id INT DEFAULT NULL, id_project_id INT DEFAULT NULL, nombre VARCHAR(255) NOT NULL, path VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8C9F3610532BA8F6 ON file (id_task_id)');
        $this->addSql('CREATE INDEX IDX_8C9F3610B3E79F4B ON file (id_project_id)');
        $this->addSql('CREATE TABLE public."user" (id INT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, date_create TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, gravatar VARCHAR(150) NOT NULL, active BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE type_branch (id INT NOT NULL, type_branch VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE public.team (id INT NOT NULL, name VARCHAR(255) NOT NULL, icon VARCHAR(50) NOT NULL, color VARCHAR(15) NOT NULL, active BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE commit (id INT NOT NULL, id_user_id INT NOT NULL, commit_hash VARCHAR(255) NOT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, commit VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_4ED42EAD79F37AE5 ON commit (id_user_id)');
        $this->addSql('CREATE TABLE priority (id INT NOT NULL, name VARCHAR(255) NOT NULL, icon VARCHAR(50) NOT NULL, color VARCHAR(15) NOT NULL, active BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE task (id INT NOT NULL, id_incidence_id INT DEFAULT NULL, id_tasktype_id INT DEFAULT NULL, id_priority_id INT DEFAULT NULL, id_project_id INT DEFAULT NULL, id_user_creator_id INT DEFAULT NULL, id_status_id INT DEFAULT NULL, id_branch_id INT DEFAULT NULL, id_task_father_id INT DEFAULT NULL, id_commit_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description TEXT NOT NULL, date_create TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, date_start TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, date_end TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, estimated_hours INT NOT NULL, email_notify_user BOOLEAN NOT NULL, email_notify_team BOOLEAN NOT NULL, icon VARCHAR(50) NOT NULL, color VARCHAR(15) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_527EDB25D1E66591 ON task (id_incidence_id)');
        $this->addSql('CREATE INDEX IDX_527EDB251FC42234 ON task (id_tasktype_id)');
        $this->addSql('CREATE INDEX IDX_527EDB255169D40E ON task (id_priority_id)');
        $this->addSql('CREATE INDEX IDX_527EDB25B3E79F4B ON task (id_project_id)');
        $this->addSql('CREATE INDEX IDX_527EDB252F1B0BC2 ON task (id_user_creator_id)');
        $this->addSql('CREATE INDEX IDX_527EDB25EBC2BC9A ON task (id_status_id)');
        $this->addSql('CREATE INDEX IDX_527EDB255CE3706E ON task (id_branch_id)');
        $this->addSql('CREATE INDEX IDX_527EDB256219C9F5 ON task (id_task_father_id)');
        $this->addSql('CREATE INDEX IDX_527EDB25BD6DA88B ON task (id_commit_id)');
        $this->addSql('CREATE TABLE task_user (task_id INT NOT NULL, user_id INT NOT NULL, PRIMARY KEY(task_id, user_id))');
        $this->addSql('CREATE INDEX IDX_FE2042328DB60186 ON task_user (task_id)');
        $this->addSql('CREATE INDEX IDX_FE204232A76ED395 ON task_user (user_id)');
        $this->addSql('CREATE TABLE project (id INT NOT NULL, id_branch_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, short_name VARCHAR(100) NOT NULL, description TEXT NOT NULL, email VARCHAR(255) NOT NULL, icon VARCHAR(50) NOT NULL, color VARCHAR(15) NOT NULL, active BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_2FB3D0EE5CE3706E ON project (id_branch_id)');
        $this->addSql('CREATE TABLE project_team (project_id INT NOT NULL, team_id INT NOT NULL, PRIMARY KEY(project_id, team_id))');
        $this->addSql('CREATE INDEX IDX_FD716E07166D1F9C ON project_team (project_id)');
        $this->addSql('CREATE INDEX IDX_FD716E07296CD8AE ON project_team (team_id)');
        $this->addSql('CREATE TABLE branch (id INT NOT NULL, id_type_branch_id INT NOT NULL, name VARCHAR(255) NOT NULL, icon VARCHAR(50) NOT NULL, color VARCHAR(15) NOT NULL, active BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_BB861B1F5576305F ON branch (id_type_branch_id)');
        $this->addSql('CREATE TABLE branch_user (branch_id INT NOT NULL, user_id INT NOT NULL, PRIMARY KEY(branch_id, user_id))');
        $this->addSql('CREATE INDEX IDX_579766DEDCD6CC49 ON branch_user (branch_id)');
        $this->addSql('CREATE INDEX IDX_579766DEA76ED395 ON branch_user (user_id)');
        $this->addSql('ALTER TABLE merge ADD CONSTRAINT FK_EB6997591BF0F8E FOREIGN KEY (id_branch_merge_id) REFERENCES branch (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE merge ADD CONSTRAINT FK_EB699759AB24788E FOREIGN KEY (id_branch_task_id) REFERENCES branch (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE merge ADD CONSTRAINT FK_EB699759B3E79F4B FOREIGN KEY (id_project_id) REFERENCES project (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE merge ADD CONSTRAINT FK_EB69975979F37AE5 FOREIGN KEY (id_user_id) REFERENCES public."user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE merge ADD CONSTRAINT FK_EB6997595576305F FOREIGN KEY (id_type_branch_id) REFERENCES type_branch (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE team_user ADD CONSTRAINT FK_5C72223279F37AE5 FOREIGN KEY (id_user_id) REFERENCES public."user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE team_user ADD CONSTRAINT FK_5C72223289E8BDC FOREIGN KEY (id_role_id) REFERENCES public.Role (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE team_user ADD CONSTRAINT FK_5C722232F7F171DE FOREIGN KEY (id_team_id) REFERENCES public.team (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE file ADD CONSTRAINT FK_8C9F3610532BA8F6 FOREIGN KEY (id_task_id) REFERENCES task (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE file ADD CONSTRAINT FK_8C9F3610B3E79F4B FOREIGN KEY (id_project_id) REFERENCES project (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE commit ADD CONSTRAINT FK_4ED42EAD79F37AE5 FOREIGN KEY (id_user_id) REFERENCES public."user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB25D1E66591 FOREIGN KEY (id_incidence_id) REFERENCES incidence (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB251FC42234 FOREIGN KEY (id_tasktype_id) REFERENCES tasktype (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB255169D40E FOREIGN KEY (id_priority_id) REFERENCES priority (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB25B3E79F4B FOREIGN KEY (id_project_id) REFERENCES project (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB252F1B0BC2 FOREIGN KEY (id_user_creator_id) REFERENCES public."user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB25EBC2BC9A FOREIGN KEY (id_status_id) REFERENCES status (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB255CE3706E FOREIGN KEY (id_branch_id) REFERENCES branch (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB256219C9F5 FOREIGN KEY (id_task_father_id) REFERENCES task (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB25BD6DA88B FOREIGN KEY (id_commit_id) REFERENCES commit (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE task_user ADD CONSTRAINT FK_FE2042328DB60186 FOREIGN KEY (task_id) REFERENCES task (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE task_user ADD CONSTRAINT FK_FE204232A76ED395 FOREIGN KEY (user_id) REFERENCES public."user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE5CE3706E FOREIGN KEY (id_branch_id) REFERENCES branch (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE project_team ADD CONSTRAINT FK_FD716E07166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE project_team ADD CONSTRAINT FK_FD716E07296CD8AE FOREIGN KEY (team_id) REFERENCES public.team (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE branch ADD CONSTRAINT FK_BB861B1F5576305F FOREIGN KEY (id_type_branch_id) REFERENCES type_branch (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE branch_user ADD CONSTRAINT FK_579766DEDCD6CC49 FOREIGN KEY (branch_id) REFERENCES branch (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE branch_user ADD CONSTRAINT FK_579766DEA76ED395 FOREIGN KEY (user_id) REFERENCES public."user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE task DROP CONSTRAINT FK_527EDB25D1E66591');
        $this->addSql('ALTER TABLE task DROP CONSTRAINT FK_527EDB25EBC2BC9A');
        $this->addSql('ALTER TABLE team_user DROP CONSTRAINT FK_5C72223289E8BDC');
        $this->addSql('ALTER TABLE task DROP CONSTRAINT FK_527EDB251FC42234');
        $this->addSql('ALTER TABLE merge DROP CONSTRAINT FK_EB69975979F37AE5');
        $this->addSql('ALTER TABLE team_user DROP CONSTRAINT FK_5C72223279F37AE5');
        $this->addSql('ALTER TABLE commit DROP CONSTRAINT FK_4ED42EAD79F37AE5');
        $this->addSql('ALTER TABLE task DROP CONSTRAINT FK_527EDB252F1B0BC2');
        $this->addSql('ALTER TABLE task_user DROP CONSTRAINT FK_FE204232A76ED395');
        $this->addSql('ALTER TABLE branch_user DROP CONSTRAINT FK_579766DEA76ED395');
        $this->addSql('ALTER TABLE merge DROP CONSTRAINT FK_EB6997595576305F');
        $this->addSql('ALTER TABLE branch DROP CONSTRAINT FK_BB861B1F5576305F');
        $this->addSql('ALTER TABLE team_user DROP CONSTRAINT FK_5C722232F7F171DE');
        $this->addSql('ALTER TABLE project_team DROP CONSTRAINT FK_FD716E07296CD8AE');
        $this->addSql('ALTER TABLE task DROP CONSTRAINT FK_527EDB25BD6DA88B');
        $this->addSql('ALTER TABLE task DROP CONSTRAINT FK_527EDB255169D40E');
        $this->addSql('ALTER TABLE file DROP CONSTRAINT FK_8C9F3610532BA8F6');
        $this->addSql('ALTER TABLE task DROP CONSTRAINT FK_527EDB256219C9F5');
        $this->addSql('ALTER TABLE task_user DROP CONSTRAINT FK_FE2042328DB60186');
        $this->addSql('ALTER TABLE merge DROP CONSTRAINT FK_EB699759B3E79F4B');
        $this->addSql('ALTER TABLE file DROP CONSTRAINT FK_8C9F3610B3E79F4B');
        $this->addSql('ALTER TABLE task DROP CONSTRAINT FK_527EDB25B3E79F4B');
        $this->addSql('ALTER TABLE project_team DROP CONSTRAINT FK_FD716E07166D1F9C');
        $this->addSql('ALTER TABLE merge DROP CONSTRAINT FK_EB6997591BF0F8E');
        $this->addSql('ALTER TABLE merge DROP CONSTRAINT FK_EB699759AB24788E');
        $this->addSql('ALTER TABLE task DROP CONSTRAINT FK_527EDB255CE3706E');
        $this->addSql('ALTER TABLE project DROP CONSTRAINT FK_2FB3D0EE5CE3706E');
        $this->addSql('ALTER TABLE branch_user DROP CONSTRAINT FK_579766DEDCD6CC49');
        $this->addSql('DROP SEQUENCE merge_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE incidence_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE team_user_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE status_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE public.Role_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE tasktype_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE file_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE public.user_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE type_branch_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE public.team_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE commit_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE priority_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE task_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE project_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE branch_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE role_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('DROP TABLE merge');
        $this->addSql('DROP TABLE incidence');
        $this->addSql('DROP TABLE team_user');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE public.Role');
        $this->addSql('DROP TABLE tasktype');
        $this->addSql('DROP TABLE file');
        $this->addSql('DROP TABLE public."user"');
        $this->addSql('DROP TABLE type_branch');
        $this->addSql('DROP TABLE public.team');
        $this->addSql('DROP TABLE commit');
        $this->addSql('DROP TABLE priority');
        $this->addSql('DROP TABLE task');
        $this->addSql('DROP TABLE task_user');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE project_team');
        $this->addSql('DROP TABLE branch');
        $this->addSql('DROP TABLE branch_user');
    }
}
