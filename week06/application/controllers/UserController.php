<?php

class UserController extends Controller
{
    function index()
    {
        $this->view('user/index', [
            'title' => 'All users',
            'users' => $this->model('User')->all(),
        ]);
    }
    
    function create()
    {
        $this->view('user/create', ['title' => 'Create user']);
    }

    function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model('User')->create([
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'role' => $_POST['role'],
            ]);

            header('location: ' . HOST . DS . 'user' . DS .'index');
        } else {
            echo 'Method does not support!';
        }
    }

    function edit($id)
    {
        if ($id == null)
            header('location: ' . HOST . DS . 'user' . DS .'index');
        else
            $this->view('user/edit', [
                'title' => 'Edit user',
                'user' => $this->model('User')->find($id),
            ]);
    }

    function update($id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model('User')->update($id, [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'role' => $_POST['role'],
            ]);

            header('location: ' . HOST . DS . 'user');
        } else {
            echo 'Method does not support!';
        }
    }

    function delete($id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model('User')->delete($id);

            header('location: ' . HOST . DS . 'user');
        } else {
            echo 'Method does not support!';
        }
    }
}
