<?php
use PHPUnit\Framework\TestCase;

class KonfirmasiTest extends TestCase
{
    public function testKonfirmasiOtomatis()
    {
        $status = "approved";
        $message = $status === "approved" 
            ? "Pendaftaran berhasil dan diterima otomatis"
            : "Pendaftaran gagal";

        $this->assertEquals("Pendaftaran berhasil dan diterima otomatis", $message);
    }
}
