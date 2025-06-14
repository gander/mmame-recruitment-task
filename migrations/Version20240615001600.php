<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240615001600 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Insert sample data into contracts table';
    }

    public function up(Schema $schema): void
    {
        // Using execute instead of addSql to bypass schema validation
        $this->connection->executeStatement("
            INSERT INTO contracts (column1, nazwa_przedsiebiorcy, column3, nip, column5, column6, column7, column8, column9, kwota) VALUES
            ('REF001', 'ABC Sp. z o.o.', 'Typ A', '1234567890', 'Aktywny', 'Warszawa', '2024-01-15', 'Jan Kowalski', 'Podpisana', 15000.50),
            ('REF002', 'XYZ S.A.', 'Typ B', '2345678901', 'Oczekujący', 'Kraków', '2024-01-20', 'Anna Nowak', 'W trakcie', 25000.75),
            ('REF003', 'DEF Przedsiębiorstwo', 'Typ C', '3456789012', 'Zakończony', 'Gdańsk', '2024-02-01', 'Piotr Wiśniewski', 'Zamknięta', 8500.00),
            ('REF004', 'GHI Trading', 'Typ A', '4567890123', 'Aktywny', 'Wrocław', '2024-02-10', 'Maria Dąbrowska', 'Podpisana', 32000.25),
            ('REF005', 'JKL Consulting', 'Typ D', '5678901234', 'Anulowany', 'Poznań', '2024-02-15', 'Tomasz Lewandowski', 'Anulowana', 12000.00),
            ('REF006', 'MNO Services', 'Typ B', '6789012345', 'Aktywny', 'Szczecin', '2024-03-01', 'Katarzyna Zielińska', 'Podpisana', 18500.80),
            ('REF007', 'PQR Systems', 'Typ A', '7890123456', 'W trakcie', 'Lublin', '2024-03-05', 'Michał Szymański', 'Negocjacje', 42000.90),
            ('REF008', 'STU Solutions', 'Typ C', '8901234567', 'Oczekujący', 'Bydgoszcz', '2024-03-12', 'Agnieszka Wozniak', 'W trakcie', 9750.30),
            ('REF009', 'VWX Corporation', 'Typ E', '9012345678', 'Aktywny', 'Katowice', '2024-03-18', 'Robert Kozłowski', 'Podpisana', 28000.65),
            ('REF010', 'YZA Industries', 'Typ B', '0123456789', 'Zakończony', 'Białystok', '2024-04-02', 'Małgorzata Jankowska', 'Zamknięta', 16500.40)
        ");

        // Add more batches of data as needed
        $this->connection->executeStatement("
            INSERT INTO contracts (column1, nazwa_przedsiebiorcy, column3, nip, column5, column6, column7, column8, column9, kwota) VALUES
            ('REF011', 'BCD Logistics', 'Typ A', '1357924680', 'Aktywny', 'Olsztyn', '2024-04-08', 'Paweł Mazur', 'Podpisana', 21000.15),
            ('REF012', 'EFG Manufacturing', 'Typ D', '2468135790', 'Anulowany', 'Rzeszów', '2024-04-15', 'Joanna Krawczyk', 'Anulowana', 35000.85),
            ('REF013', 'HIJ Technology', 'Typ C', '3579148260', 'W trakcie', 'Kielce', '2024-04-22', 'Grzegorz Piotrowski', 'Negocjacje', 13750.55),
            ('REF014', 'KLM Ventures', 'Typ B', '4681379250', 'Oczekujący', 'Toruń', '2024-05-01', 'Beata Grabowska', 'W trakcie', 19250.70),
            ('REF015', 'NOP Holdings', 'Typ A', '5792468130', 'Aktywny', 'Radom', '2024-05-08', 'Dariusz Pawłowski', 'Podpisana', 27500.95),
            ('REF016', 'QRS Energy', 'Typ E', '6813579240', 'Zakończony', 'Płock', '2024-05-15', 'Ewa Michalska', 'Zamknięta', 45000.20),
            ('REF017', 'TUV Finance', 'Typ C', '7924681350', 'Aktywny', 'Elbląg', '2024-05-22', 'Łukasz Adamski', 'Podpisana', 11500.45),
            ('REF018', 'WXY Construction', 'Typ B', '8035792461', 'Anulowany', 'Tarnów', '2024-06-01', 'Monika Nowakowska', 'Anulowana', 38000.10),
            ('REF019', 'ZAB Retail', 'Typ A', '9146803572', 'W trakcie', 'Zabrze', '2024-06-08', 'Krzysztof Wójcik', 'Negocjacje', 22500.35),
            ('REF020', 'CDE Healthcare', 'Typ D', '0257914683', 'Oczekujący', 'Bytom', '2024-06-15', 'Aleksandra Kowalczyk', 'W trakcie', 31000.60)
        ");

    }

    public function down(Schema $schema): void
    {
        // Remove all data from the contracts table
        $this->connection->executeStatement('TRUNCATE TABLE contracts');
    }
}
