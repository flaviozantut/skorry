<?php
namespace Flaviozantut\Storage\Posts;

interface PostRepositoryInterface
{
    public function all();

    public function find($id);

    public function store($data);

    public function update($id, $data);

    public function destroy($id);

}
