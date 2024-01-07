<?php

namespace App\Repository;

use App\Interfaces\TeacherRepositoryInterface;
use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;

class TeacherRepository implements TeacherRepositoryInterface
{
    public function getAllTeachers()
    {
        return Teacher::all();
    }
    public function getSpecializations()
    {
        return Specialization::all();
    }
    public function getGenders()
    {
        return Gender::all();
    }
    public function store($request)
    {
        try {

            $teacher = new Teacher();
            $teacher->email = $request->email;
            $teacher->password = Hash::make($request->password);
            $teacher->name = ['ar' => $request->name, 'en' => $request->name_en];
            $teacher->join_date = $request->join_date;
            $teacher->specialization_id = $request->specialization_id;
            $teacher->gender_id = $request->gender_id;
            $teacher->address = $request->address;
            $teacher->save();
            toastr()->success(trans('messages.added_message'));
            return redirect()->route('teachers.index');
        } catch (\Exception $e) {

            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function edit($id)
    {
        return Teacher::findOrFail($id);
    }
    public function update($request)
    {
        try {

            $teacher = Teacher::findOrFail($request->id);
            $teacher->email = $request->email;
            $teacher->password = Hash::make($request->password);
            $teacher->name = ['ar' => $request->name, 'en' => $request->name_en];
            $teacher->join_date = $request->join_date;
            $teacher->specialization_id = $request->specialization_id;
            $teacher->gender_id = $request->gender_id;
            $teacher->address = $request->address;
            $teacher->save();
            toastr()->success(trans('messages.edited_message'));
            return redirect()->route('teachers.index');
        } catch (\Exception $e) {

            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function destroy($request)
    {
        Teacher::findOrFail($request->id)->delete();
        toastr()->success(trans('messages.deleted_message'));
        return redirect()->route('teachers.index');
    }
}
