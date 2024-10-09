<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Users;

class Home extends BaseController
{
    public function index()
    {
        $usersModel = new Users();

        $data = [
            'title' => 'Home',
            'users' => $usersModel->findAll()
        ];
        return view('home', $data);
    }

    public function store()
    {
        $usersModel = new Users();
        $usersModel->insert([
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
        ]);
        session()->setFlashData('success', 'Data berhasil disimpan');
        return redirect()->to(base_url('home'));
    }

    public function update($id)
    {
        $usersModel = new Users();
        $usersModel->update($id, [
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
        ]);
        session()->setFlashData('success', 'Data berhasil diubah');

        return redirect()->to(base_url('home'));
    }   

    public function delete($id) {
        $usersModel = new Users();

        $users = $usersModel->find($id);
        if ($users) {
            $usersModel->delete($id);
            session()->setFlashData('success', 'Data berhasil dihapus');
            return redirect()->to(base_url('home'));
        }
    }
}
