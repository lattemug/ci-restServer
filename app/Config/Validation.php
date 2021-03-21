<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

public $Mahasiswa = [
    'nim'         => 'required',
    'nama'       => 'required',
	'prodi'       => 'required',
	'email'       => 'required',
	'alamat'       => 'required'
];
 
public $Mahasiswa_errors = [
    'nim'=> [
        'required'  => 'Nim wajib diisi.'
    ],
    'nama'=> [
        'required'  => 'Nama wajib diisi.'
    ],
	'prodi'=> [
        'required'  => 'Prodi wajib diisi.'
    ],
	'email'=> [
        'required'  => 'Email wajib diisi.'
    ],
	'alamat'=> [
        'required'  => 'Alamat wajib diisi.'
    ]
];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
}
