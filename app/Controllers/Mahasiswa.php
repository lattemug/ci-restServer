<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Mahasiswa extends ResourceController
{
    protected $format       = 'json';
    protected $modelName    = 'App\Models\Mahasiswa_Model';
    protected $request;

    public function index()
    {
        return $this->respond($this->model->findAll(), 200);
    }

    public function create()
    {
        $validation =  \Config\Services::validation();

        $nim   = $this->request->getPost('nim');
        $nama = $this->request->getPost('nama');
        $prodi = $this->request->getPost('prodi');
        $email = $this->request->getPost('email');
        $alamat = $this->request->getPost('alamat');

        $data = [
            'nim' => $nim,
            'nama' => $nama,
            'prodi' => $prodi,
            'email' => $email,
            'alamat' => $alamat
        ];

        if ($validation->run($data, 'Mahasiswa') == FALSE) {
            $response = [
                'status' => 500,
                'error' => true,
                'data' => $validation->getErrors(),
            ];
            return $this->respond($response, 500);
        } else {
            $simpan = $this->model->insertMahasiswa($data);
            if ($simpan) {
                $msg = ['message' => 'Created Mahasiswa successfully'];
                $response = [
                    'status' => 200,
                    'error' => false,
                    'data' => $msg,
                ];
                return $this->respond($response, 200);
            }
        }
    }

    public function show($id = NULL)
    {
        $get = $this->model->getMahasiswa($id);
        if ($get) {
            $code = 200;
            $response = [
                'status' => $code,
                'error' => false,
                'data' => $get,
            ];
        } else {
            $code = 401;
            $msg = ['message' => 'Not Found'];
            $response = [
                'status' => $code,
                'error' => true,
                'data' => $msg,
            ];
        }
        return $this->respond($response, $code);
    }

    public function edit($id = NULL)
    {
        $get = $this->model->getMahasiswa($id);
        if ($get) {
            $code = 200;
            $response = [
                'status' => $code,
                'error' => false,
                'data' => $get,
            ];
        } else {
            $code = 401;
            $msg = ['message' => 'Not Found'];
            $response = [
                'status' => $code,
                'error' => true,
                'data' => $msg,
            ];
        }
        return $this->respond($response, $code);
    }

    public function update($id = NULL)
    {
        $validation =  \Config\Services::validation();

        $nim   = $this->request->getRawInput('nim');
        $nama = $this->request->getRawInput('nama');
        $prodi = $this->request->getRawInput('prodi');
        $email = $this->request->getRawInput('email');
        $alamat = $this->request->getRawInput('alamat');

        $data = [
            'nim' => $nim,
            'nama' => $nama,
            'prodi' => $prodi,
            'email' => $email,
            'alamat' => $alamat
        ];

        if ($validation->run($data, 'Mahasiswa') == FALSE) {

            $response = [
                'status' => 500,
                'error' => true,
                'data' => $validation->getErrors(),
            ];
            return $this->respond($response, 500);
        } else {

            $simpan = $this->model->updateMahasiswa($data, $id);
            if ($simpan) {
                $msg = ['message' => 'Updated Mahasiswa successfully'];
                $response = [
                    'status' => 200,
                    'error' => false,
                    'data' => $msg,
                ];
                return $this->respond($response, 200);
            }
        }
    }

    public function delete($id = NULL)
    {
        $hapus = $this->model->deleteMahasiswa($id);
        if ($hapus) {
            $code = 200;
            $msg = ['message' => 'Deleted Mahasiswa successfully'];
            $response = [
                'status' => $code,
                'error' => false,
                'data' => $msg,
            ];
        } else {
            $code = 401;
            $msg = ['message' => 'Not Found'];
            $response = [
                'status' => $code,
                'error' => true,
                'data' => $msg,
            ];
        }
        return $this->respond($response, $code);
    }
}
