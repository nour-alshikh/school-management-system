<?php

namespace App\Interfaces;

interface StudentRepositoryInterface
{
    public function index();
    public function create();
    public function edit($id);
    public function update($request);
    public function get_sections($id);
    public function store($request);
}
