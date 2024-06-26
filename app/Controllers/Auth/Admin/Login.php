<?php

namespace App\Controllers\Auth\Admin;

use App\Controllers\BaseController;
use App\Models\Auth\Admin\LoginModel;

class Login extends BaseController
{
    protected $loginModel;

    public function __construct()
    {
        $this->loginModel = new LoginModel();
    }
    
    public function viewForm()
    {
        $data = [
            'title' => 'Login | ADMIN',
            'validation' => session('validation'),
        ];

        return view('auth/admin/login', $data);
    }

    public function loginToAccount()
    {
        $config = $this->loginModel->validation();

        if (!$this->validate($config)) {
            return redirect()->to(base_url('admin'))->withInput()->with('validation', $this->validator->getErrors());
        }

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $admin = $this->loginModel->where('username', $username)->first();

        if ($admin && password_verify($password, $admin['password'])) {
            $this->setAdminSession($admin);

            if ($this->request->getVar('remember')) {
                $key = 'remember_' . $admin['id'];
                $value = $admin['id'] . ':' . $admin['password'];
                setcookie($key, $value, time() + (86400 * 30), '/');
            }

            return redirect()->to(base_url('admin/dashboard'));
        }

        session()->setFlashdata('error', 'Username atau password salah!');
        return redirect()->to(base_url('admin'))->withInput();
    }


    private function setAdminSession($admin)
    {
        $data = [
            'id' => $admin['id'],
            'fullname' => $admin['fullname'],
            'username' => $admin['username'],
            'email' => $admin['email'],
            'role' => $admin['role'],
            'avatar' => $admin['avatar'],
            'isLoggedIn' => true
        ];

        session()->set($data);
    }
}
