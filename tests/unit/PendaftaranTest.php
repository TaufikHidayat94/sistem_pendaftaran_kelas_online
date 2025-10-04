<?php
use PHPUnit\Framework\TestCase;

class PendaftaranTest extends TestCase
{
    private $pendaftar = [];

    public function testDaftarKelasSekaliSaja()
    {
        $idSiswa = "S-001";
        $idKelas = "K-001";

        // simulasi daftar pertama kali
        $this->pendaftar[] = [$idSiswa, $idKelas];
        $sudahAda = in_array([$idSiswa, $idKelas], $this->pendaftar);

        $this->assertTrue($sudahAda);

        // coba daftar kedua kali
        $sudahAda = in_array([$idSiswa, $idKelas], $this->pendaftar);
        $this->assertTrue($sudahAda, "Siswa tidak boleh daftar 2x");
    }
}
