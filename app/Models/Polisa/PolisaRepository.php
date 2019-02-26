<?php
/**
 * Created by PhpStorm.
 * User: vedran.bojicic
 * Date: 18.07.2018
 * Time: 12:17 PM
 */

namespace App\Models\Polisa;


interface PolisaRepository
{
    public function create($data);

    public function update($data, $id);

    public function save($object);

    public function delete($object);

    public function find($id);

    public function findAll();
}