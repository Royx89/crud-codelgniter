public function editar($id)
{
    $model = new CatalogoModel();
    $data['producto'] = $model->find($id);

    return view('catalogo/editar', $data);
}

public function actualizar($id)
{
    $validation = \Config\Services::validation();

    $validation->setRules([
        'nombre'      => 'required',
        'descripcion' => 'required',
        'precio'      => 'required|decimal'
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
