<?php

declare(strict_types=1);

namespace App\Repositories;

abstract class AbstractRepository
{
  protected $model;

  public function __construct() {
    $this->model = $this->resolveModel();
  }

  public function find(int $id)
  {
    return $this->model::find($id);
  }

  public function all()
  {
    return $this->model->all();
  }

  public function store(array $data){
    return $this->model->create($data);
  }

  public function save(int $id, array $data){
    return $this->model::where('id',$id)->update($data);
  }

  public function destroy(int $id){
    return $this->model::where('id',$id)->delete();
  }

  protected function resolveModel() {
    return app($this->model);
  }
}
