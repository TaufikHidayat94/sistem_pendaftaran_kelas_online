<?php
use PHPUnit\Framework\TestCase;

class KelasTest extends TestCase
{
    public function testSisaKuota()
    {
        $kapasitas = 40;
        $terdaftar = 10;
        $sisa = $kapasitas - $terdaftar;

        $this->assertEquals(30, $sisa);
    }

    public function testKuotaHabis()
    {
        $kapasitas = 20;
        $terdaftar = 20;

        $this->assertEquals(0, $kapasitas - $terdaftar);
    }
}
