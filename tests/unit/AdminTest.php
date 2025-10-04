<?php
use PHPUnit\Framework\TestCase;

class AdminTest extends TestCase
{
    public function testTambahKelas()
    {
        $kelas = [
            'nama' => 'Matematika',
            'kuota' => 30,
            'pengajar' => 'Budi'
        ];

        $this->assertArrayHasKey('nama', $kelas);
        $this->assertArrayHasKey('kuota', $kelas);
        $this->assertArrayHasKey('pengajar', $kelas);
    }

    public function testEditKuota()
    {
        $kuotaLama = 30;
        $kuotaBaru = 40;

        $this->assertTrue($kuotaBaru > $kuotaLama);
    }

    public function testLihatPeserta()
    {
        $peserta = ["Andi", "Siti", "Budi"];

        $this->assertContains("Siti", $peserta);
    }
}
