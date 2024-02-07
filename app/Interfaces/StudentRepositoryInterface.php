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
    public function delete($request);
    public function show($id);
    public function upload_attachments($request);
    public function download_attachment($student_name, $file_name);
    public function delete_attachment($request);
}
