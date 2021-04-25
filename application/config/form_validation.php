<?php

$config = [
    'masuk/daftar' => [
        [
            'field' => 'jenisdaftar',
            'label' => 'Jenis Pendaftaran',
            'rules' => 'trim|required',
            'errors' => [
                'required' => 'Tidak Boleh Kosong !'
            ]
        ],
        [
            'field' => 'daftarsekolah',
            'label' => '',
            'rules' => 'trim|required',
            'errors' => [
                'required' => 'Tidak Boleh Kosong !'
            ]
        ],
        [
            'field' => 'nama',
            'label' => '',
            'rules' => 'trim|required',
            'errors' => [
                'required' => 'Tidak Boleh Kosong !'
            ]
        ],
        [
            'field' => 'nisn',
            'label' => '',
            'rules' => 'trim|required|integer',
            'errors' => [
                'required' => 'Tidak Boleh Kosong !',
                'integer' => 'Harus berisi nomor !'
            ]
        ],
        [
            'field' => 'asalsekolah',
            'label' => '',
            'rules' => 'trim|trim|required',
            'errors' => [
                'required' => 'Tidak Boleh Kosong !'
            ]
        ],
        [
            'field' => 'tempatlahir',
            'label' => '',
            'rules' => 'trim|required',
            'errors' => [
                'required' => 'Tidak Boleh Kosong !'
            ]
        ],
        [
            'field' => 'tgllahir',
            'label' => '',
            'rules' => 'trim|required',
            'errors' => [
                'required' => 'Tidak Boleh Kosong !'
            ]
        ],
        [
            'field' => 'jeniskelamin',
            'label' => '',
            'rules' => 'trim|required',
            'errors' => [
                'required' => 'Tidak Boleh Kosong !'
            ]
        ],
        [
            'field' => 'agama',
            'label' => '',
            'rules' => 'trim|required',
            'errors' => [
                'required' => 'Tidak Boleh Kosong !'
            ]
        ],
        [
            'field' => 'desa',
            'label' => '',
            'rules' => 'trim|required',
            'errors' => [
                'required' => 'Tidak Boleh Kosong !'
            ]
        ],
        [
            'field' => 'kecamatan',
            'label' => '',
            'rules' => 'trim|trim|required',
            'errors' => [
                'required' => 'Tidak Boleh Kosong !'
            ]
        ],
        [
            'field' => 'kabupaten',
            'label' => '',
            'rules' => 'trim|required',
            'errors' => [
                'required' => 'Tidak Boleh Kosong !'
            ]
        ],
        [
            'field' => 'nohp',
            'label' => '',
            'rules' => 'trim|required',
            'errors' => [
                'required' => 'Tidak Boleh Kosong !'
            ]
        ],
        [
            'field' => 'email',
            'label' => '',
            'rules' => 'trim|required|valid_email|is_unique[user.email]',
            'errors' => [
                'required' => 'Tidak Boleh Kosong !',
                'is_unique' => 'Email ini telah digunakan !'
            ]
        ]

    ],
    'masuk/lupapw' => [
        [
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email',
            'errors' => [
                'required' => 'Tidak Boleh Kosong !'
            ]
        ]
    ],
    'user/akunadmin/pass' => [
        [
            'field' => 'pass0',
            'label' => 'Password',
            'rules' => 'trim|required',
            'errors' => [
                'required' => 'Tidak Boleh Kosong !'
            ]
        ],
        [
            'field' => 'pass1',
            'label' => 'Password',
            'rules' => 'required|trim|min_length[5]',
            'errors' => [
                'required' => 'Tidak Boleh Kosong !',
                'min_length' => 'Terlalu Pendek !'
            ]
        ],
        [
            'field' => 'pass2',
            'label' => 'Password',
            'rules' => 'required|trim|matches[pass1]',
            'errors' => [
                'required' => 'Tidak Boleh Kosong !',
                'matches' => 'Tidak Cocok dengan Password Baru !'
            ]
        ]
    ],
    'user/akunadmin/info' => [
        [
            'field' => 'nama',
            'label' => 'Nama Lengkap',
            'rules' => 'trim|required',
            'errors' => [
                'required' => 'Tidak Boleh Kosong !'
            ]
        ],
        [
            'field' => 'username',
            'label' => 'username',
            'rules' => 'required|trim|alpha_numeric',
            'errors' => [
                'required' => 'Tidak Boleh Kosong !',
                'alpha_numeric' => 'Tidak boleh mengandung spasi !'
            ]
        ],
        [
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|trim|valid_email',
            'errors' => [
                'required' => 'Tidak Boleh Kosong !'
            ]
        ]
    ],
    'super/akunsuper/pass' => [
        [
            'field' => 'pass0',
            'label' => 'Password',
            'rules' => 'trim|required',
            'errors' => [
                'required' => 'Tidak Boleh Kosong !'
            ]
        ],
        [
            'field' => 'pass1',
            'label' => 'Password',
            'rules' => 'required|trim|min_length[5]',
            'errors' => [
                'required' => 'Tidak Boleh Kosong !',
                'min_length' => 'Terlalu Pendek !'
            ]
        ],
        [
            'field' => 'pass2',
            'label' => 'Password',
            'rules' => 'required|trim|matches[pass1]',
            'errors' => [
                'required' => 'Tidak Boleh Kosong !',
                'matches' => 'Tidak Cocok dengan Password Baru !'
            ]
        ]
    ],
    'super/akunsuper/info' => [
        [
            'field' => 'nama',
            'label' => 'Nama Lengkap',
            'rules' => 'trim|required',
            'errors' => [
                'required' => 'Tidak Boleh Kosong !'
            ]
        ],
        [
            'field' => 'username',
            'label' => 'username',
            'rules' => 'required|trim|alpha_numeric',
            'errors' => [
                'required' => 'Tidak Boleh Kosong !',
                'alpha_numeric' => 'Tidak boleh mengandung spasi !'
            ]
        ],
        [
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|trim|valid_email',
            'errors' => [
                'required' => 'Tidak Boleh Kosong !'
            ]
        ]
    ]
];
