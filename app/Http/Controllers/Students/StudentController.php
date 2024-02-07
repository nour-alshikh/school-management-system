<?php

namespace App\Http\Controllers\Students;

use App\Models\Student;
use App\Http\Controllers\controller;
use App\Http\Requests\StoreStudentRequest;
use App\Interfaces\StudentRepositoryInterface;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    protected $student;

    public function __construct(StudentRepositoryInterface $student)
    {
        $this->student = $student;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->student->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->student->create();
    }

    public function get_sections($id)
    {
        return $this->student->get_sections($id);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        return $this->student->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->student->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return $this->student->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreStudentRequest $request)
    {
        return $this->student->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

        return $this->student->delete($request);
    }
    public function upload_attachments(Request $request)
    {

        return $this->student->upload_attachments($request);
    }
    public function download_attachment($student_name, $file_name)
    {
        return $this->student->download_attachment($student_name, $file_name);
    }
    public function delete_attachment(Request $request)
    {
        return $this->student->delete_attachment($request);
    }
}
