<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class MahasiswaSeeds extends Seeder
{
	public function run()
	{
		$data = [
			[
				'nim'			=>  '18.01.53.2022',
				'nama'			=>  'Jeni',
				'prodi'   	    =>  'Teknik Informatika',
				'email'         =>  'Jeje@gmail.com',
				'alamat'		=>  'Jl. Mawar Putih No. 190, Waru Sidoarjo',
				'created_at'	=> Time::now()
			],
		];
		$this->db->table('Mahasiswa')->insertBatch($data);
	}
}
