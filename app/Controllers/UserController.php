<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        helper(['form', 'url']);
    }

    public function index()
    {
        $model = new UserModel();
        $data['users'] = $model->where('role', 'user')->findAll();

        return view('admin/users', $data);
    }

    public function create()
    {
        return view('admin/add_user');
    }

    public function store()
    {
        $model = new UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => 'user'
        ];

        $model->insert($data);
        return redirect()->to('/admin/users')->with('success', 'User berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $model = new UserModel();
        $data['user'] = $model->find($id);

        return view('admin/edit_user', $data);
    }

    public function update($id)
    {
        $model = new UserModel();
        $data = [
            'username' => $this->request->getPost('username')
        ];

        if ($this->request->getPost('password')) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        $model->update($id, $data);
        return redirect()->to('/admin/users')->with('success', 'User berhasil diperbarui!');
    }

    public function delete($id)
    {
        $model = new UserModel();
        $model->delete($id);

        return redirect()->to('/admin/users')->with('success', 'User berhasil dihapus!');
    }
}
