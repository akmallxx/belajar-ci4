<?php

namespace App\Controllers;

use App\Models\Users;
use Faker\Provider\Base;

class login extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Login Form'
        ];
        return view('login', $data);
    }

    public function login_action()
    {
        $usersModel = new Users();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $verifyUsername = $usersModel->where('username', $username)->first();

        if ($verifyUsername) {
            $password_db = $verifyUsername['password'];
            $verifyPassword = password_verify($password, $password_db);
            if ($verifyPassword) {
                $session_data = [
                    'username' => $username,
                    'password' => $password,
                    'logged_in' => true
                ];

                session()->set($session_data);
                return redirect()->to(base_url('home'));
            } else {
                session()->setFlashData('message', 'Password salah!');
                return redirect()-> to(base_url('/'));
            }
        } else {
            session()->setFlashData('message', "Username '$username' tidak terdaftar!");
            return redirect()-> to(base_url('/'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }
}
