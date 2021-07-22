<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210721223511 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE link DROP media_type');
        $this->addSql("INSERT INTO link(title, url, description) VALUES('📡DJ SISU | VOLUMEN 15 | Makina Actual 🦅', 'https://www.youtube.com/embed/09PkPBcpWPo', '10 ans plus tard... le tant attendu VOLUME 15 de DJ SISU arrive ! 🔴 Profitez d\'1 heure pleine de makina actuelle mixée avec toute la passion et la qualité du résident de Pont Aeri. 🔥')");
        $this->addSql("INSERT INTO link(title, url, description) VALUES(
            '📡 RULY Y TRAKA \"Makina Session 2021\" (Millennium)',
            'https://www.youtube.com/embed/UgrkSIH6GeI',
            'TRACKLIST:
                1- Ruly y Traka - News 2021 (Las Gaitas)
                2- Martin Garrix & Dua Lipa - Scared To Be Lonely (PJ Makina Bootleg)
                3- Dj T-ty - Crazy Scratch
                4- Dj Contra vs Dj Gino & Victor Ronda - Nostalgic Melo-D
                5- Dj Contra vs Dj Gino & Victor Ronda - Control Activation
                6- Obsys - Spektrum
                7- Dj Depath & Dj Contra - Depators
                8- Danger Level - Dreaming A History
                9- Dogmatic Angels - Yellow Spot
                10- Obsys - Illusion Remix ...')");
        $this->addSql("INSERT INTO link(title, url, description) VALUES('PASTIS & BUENRI LIVE AT XQUE 2004', 'https://www.youtube.com/embed/jm12nNwdcPg', 'Live Pastis & Buenri dans la discothèque Xque')");
        $this->addSql("INSERT INTO link(title, url, description) VALUES('Kontrol Mataro : live @ Kontrol', 'https://www.youtube.com/embed/-7HLE0itRtw', 'Live dans une des plus grandes discothèques du style')");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE link ADD media_type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
