<?php

namespace App\Interfaces;

interface TeacherRepositoryInterface
{
    public function getAllTeachers();
    public function getSpecializations();
    public function getGenders();
    public function store($request);
    public function edit($id);
    public function update($request);
    public function destroy($request);
}
