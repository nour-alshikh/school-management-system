<?php

namespace App\Http\Controllers\Teachers;

use App\Interfaces\TeacherRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\controller;
use App\Http\Requests\StoreTeacherRequest;

class TeacherController extends Controller
{
    protected $teacher;

    public function __construct(TeacherRepositoryInterface $teacher)
    {
        $this->teacher = $teacher;
    }

    public function index()
    {
        $teachers = $this->teacher->getAllTeachers();
        return view('pages.teachers.index', compact('teachers'));
    }
    public function create()
    {
        $specializations = $this->teacher->getSpecializations();
        $genders = $this->teacher->getGenders();
        return view('pages.teachers.create', compact('specializations', 'genders'));
    }
    public function store(StoreTeacherRequest $request)
    {
        return $this->teacher->store($request);
    }
    public function edit($id)
    {
        $teacher = $this->teacher->edit($id);
        $specializations = $this->teacher->getSpecializations();
        $genders = $this->teacher->getGenders();
        return view('pages.teachers.edit', compact('teacher', 'specializations', 'genders'));
    }
    public function update(Request $request)
    {
        return $this->teacher->update($request);
    }
    public function destroy(Request $request)
    {
        return $this->teacher->destroy($request);
    }
}
