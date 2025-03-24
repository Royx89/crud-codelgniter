<?php

namespace App\Controllers;

use App\Models\CatalogoModel;
use CodeIgniter\Controller;

class Catalogo extends Controller
{
    public function index()
    {
        $model = new CatalogoModel();
        $data['productos'] = $model->findAll();
        return view('catalogo/index', $data);
    }

    public function formulario()
    {
        helper(['form']);
        return view('catalogo/formulario');
    }

    public function crear()
    {
        helper(['form']);
        $validation = \Config\Services::validation();

        $validation->setRules([
            'nombre'      => 'required',
            'descripcion' => 'required',
            'precio'      => 'required|decimal',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return view('catalogo/formulario', [
                'validation' => $validation,
            ]);
        }

        $model = new CatalogoModel();

        $data = [
            'nombre'      => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio'      => $this->request->getPost('precio'),
        ];

        $model->insert($data);

        return redirect()->to('/catalogo');
    }

    public function eliminar($id)
    {
        $model = new CatalogoModel();
        $model->delete($id);
        return redirect()->to('/catalogo');
    }

    public function editar($id)
{
    $model = new \App\Models\CatalogoModel();
    $producto = $model->find($id);

    // Validar si el producto existe
    if (!$producto) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Producto no encontrado con ID $id");
    }

    return view('catalogo/editar', ['producto' => $producto]);
}

    

    public function actualizar($id)
    {
        helper(['form']);
        $validation = \Config\Services::validation();

        $validation->setRules([
            'nombre'      => 'required',
            'descripcion' => 'required',
            'precio'      => 'required|decimal',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return view('catalogo/editar', [
                'validation' => $validation,
                'producto'   => $this->request->getPost()
            ]);
        }

        $model = new CatalogoModel();

        $data = [
            'nombre'      => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio'      => $this->request->getPost('precio'),
        ];

        $model->update($id, $data);

        return redirect()->to('/catalogo');
    }
}
