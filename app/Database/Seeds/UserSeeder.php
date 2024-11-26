<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\PegawaiModel;
use App\Models\UserModel;
use App\Models\LokasiPresensiModel;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Initialize models
        $pegawaiModel = new PegawaiModel();
        $userModel = new UserModel();
        
        // Example employee data
        $pegawaiData = [
            'nip' => $this->generateNIP(),
            'nama' => 'Elsa',
            'jenis_kelamin' => 'Perempuan',
            'alamat' => 'Jl. Mawar No. 123',
            'no_handphone' => '08123456789',
            'jabatan' => 'Admin',
            'lokasi_presensi' => 1,
            'foto' => '',
        ];

        // Insert into pegawai table
        $pegawaiModel->insert($pegawaiData);
        $id_pegawai = $pegawaiModel->insertID();

        // Example user data linked to the employee
        $userData = [
            'id_pegawai' => $id_pegawai,
            'username' => 'Elsa',
            'password' => password_hash('12345', PASSWORD_DEFAULT),
            'status' => 'Aktif',
            'role' => 'Admin',
        ];

        // Insert into user table
        $userModel->insert($userData);


        $lokasi_presensi = new LokasiPresensiModel();
        $lokasi_presensiData = [
            'nama_lokasi' => 'CV. Soraya World IT Consultant',
            'alamat_lokasi' => 'Timbulharjo, Sewon, Bantul, DI Yogyakarta',
            'tipe_lokasi' => 'Kantor',
            'latitude' => -7.874859177056959,
            'longitude' => 110.35968994553342,
            'radius' => 500,
            'zona_waktu' => 'WIB',
            'jam_masuk' => '09:00:00',
            'jam_pulang' => '16:00:00'
        ];
        $lokasi_presensi->insert($lokasi_presensiData);
    }

    private function generateNIP()
    {
        $pegawaiModel = new PegawaiModel();
        $pegawaiTerakhir = $pegawaiModel->select('nip')->orderBy('id', 'DESC')->first();
        $nipTerakhir = $pegawaiTerakhir ? $pegawaiTerakhir['nip'] : 'PEG-0000';
        $angkaNIP = (int) substr($nipTerakhir, 4);
        $angkaNIP++;
        return 'PEG-' . str_pad($angkaNIP, 4, '0', STR_PAD_LEFT);
    }
}