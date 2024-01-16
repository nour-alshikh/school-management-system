<?php

namespace App\Interfaces;

interface StudentRepositoryInterface
{
    public function create();
    public function get_sections($id);
    public function store($request);
}
