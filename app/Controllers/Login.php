<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\LoginModel;

class Login extends BaseController
{
    public function index()
    {
        $data = [
            'validation' => service('validation')
        ];
        return view('login', $data);
    }

    public function login_action()
    {
       $rules = [
        'username' => 'required',
        'password' => 'required'
       ];

       if (!$this->validate($rules)) {   
           $data['validation'] = $this->validator;   
           return view('login', $data);
       }else{
           $session = session();
           $loginModel = new LoginModel;

           $username = $this->request->getVar('username');
           $password = $this->request->getVar('password');
           $cekusername = $loginModel->where('username', $username)->first();

        
         
           if ($cekusername) {
               $password_db = $cekusername['password'];
               $cek_password = password_verify($password, $password_db);
               if($cek_password) {


                    $session_data = [
                        'username'  => $cekusername['username'],
                        'logged_in' => TRUE,
                        'role_id'   => $cekusername['role'],
                        'id_pegawai' => $cekusername['id']
                    ];
                    $session ->set($session_data);
                  switch ($cekusername['role']) {
                    case "Admin":
                        return redirect()->to('admin/home');
                    case "Pegawai":
                        return redirect()->to('pegawai/home');
                    default:
                        $session->setFlashdata('pesan', 'Akun anda belum terdaftar');
                        return redirect()->to('/');
                    }

               } else {
                $session->setFlashdata('pesan', 'Password salah,silahkan coba lagi');
                return redirect()->to('/');
               }
           } else {
                $session->setFlashdata('pesan', 'Username salah,silahkan coba lagi');
                return redirect()->to('/');
           }
       }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
