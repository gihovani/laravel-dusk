<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

trait CrudControllerTrait
{
    /** @var Model $model */
    protected $model;
    protected $path;
    protected $redirectPath;

    public function index()
    {
        $result = $this->model->paginate();
        return view($this->path . '.index', ['result' => $result]);
    }

    public function create()
    {
        return view($this->path . '.create');
    }

    public function store(Request $request)
    {
        $this->model->create($request->all());
        return redirect($this->redirectPath);
    }

    public function show(Request $request, $id)
    {
        $result = $this->model->with($this->relationships())->findOrFail($id);
        return view($this->path . '.show', ['result' => $result]);
    }

    public function edit(Request $request, $id)
    {
        $result = $this->model->with($this->relationships())->findOrFail($id);
        return view($this->path . '.edit', ['result' => $result]);
    }

    public function update(Request $request, $id)
    {
        $result = $this->model->with($this->relationships())->findOrFail($id);
        $result->update($request->all());
        return redirect($this->redirectPath);
    }

    public function destroy($id)
    {
        $result = $this->model->findOrFail($id);
        $result->delete();
        return redirect($this->redirectPath);
    }

    public function relationships()
    {
        if (isset($this->relationships)) {
            return $this->relationships;
        }
        return [];
    }
}
