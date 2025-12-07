<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191126014815 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE deputado (id INT AUTO_INCREMENT NOT NULL, tag_localizacao_id INT DEFAULT NULL, nome VARCHAR(255) NOT NULL, partido VARCHAR(255) NOT NULL, id_api INT NOT NULL, INDEX IDX_A3C934A2F531650A (tag_localizacao_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag_localizacao (id INT AUTO_INCREMENT NOT NULL, tipo_tag_id INT DEFAULT NULL, descricao VARCHAR(255) NOT NULL, assinatura_boletim VARCHAR(255) NOT NULL, assinatura_rss VARCHAR(255) NOT NULL, id_api INT NOT NULL, INDEX IDX_CCACCE172F6B9509 (tipo_tag_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipo_despesa (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, id_api INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipo_tag (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, id_api INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE verbas_indenizatorias (id INT AUTO_INCREMENT NOT NULL, deputado_id INT DEFAULT NULL, tipo_despesa_id INT DEFAULT NULL, nome_emitente VARCHAR(255) NOT NULL, desc_documento VARCHAR(255) DEFAULT NULL, valor_despesa DOUBLE PRECISION NOT NULL, cpf_cnpj VARCHAR(255) NOT NULL, valor_reembolsado DOUBLE PRECISION NOT NULL, data_referencia DATE NOT NULL, data_emissao DATE NOT NULL, id_api INT NOT NULL, INDEX IDX_E61E6DBBE52FC57E (deputado_id), INDEX IDX_E61E6DBB8E92C455 (tipo_despesa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE deputado ADD CONSTRAINT FK_A3C934A2F531650A FOREIGN KEY (tag_localizacao_id) REFERENCES tag_localizacao (id)');
        $this->addSql('ALTER TABLE tag_localizacao ADD CONSTRAINT FK_CCACCE172F6B9509 FOREIGN KEY (tipo_tag_id) REFERENCES tipo_tag (id)');
        $this->addSql('ALTER TABLE verbas_indenizatorias ADD CONSTRAINT FK_E61E6DBBE52FC57E FOREIGN KEY (deputado_id) REFERENCES deputado (id)');
        $this->addSql('ALTER TABLE verbas_indenizatorias ADD CONSTRAINT FK_E61E6DBB8E92C455 FOREIGN KEY (tipo_despesa_id) REFERENCES tipo_despesa (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE verbas_indenizatorias DROP FOREIGN KEY FK_E61E6DBBE52FC57E');
        $this->addSql('ALTER TABLE deputado DROP FOREIGN KEY FK_A3C934A2F531650A');
        $this->addSql('ALTER TABLE verbas_indenizatorias DROP FOREIGN KEY FK_E61E6DBB8E92C455');
        $this->addSql('ALTER TABLE tag_localizacao DROP FOREIGN KEY FK_CCACCE172F6B9509');
        $this->addSql('DROP TABLE deputado');
        $this->addSql('DROP TABLE tag_localizacao');
        $this->addSql('DROP TABLE tipo_despesa');
        $this->addSql('DROP TABLE tipo_tag');
        $this->addSql('DROP TABLE verbas_indenizatorias');
    }
}
