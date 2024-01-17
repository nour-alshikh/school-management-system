<?php

namespace App\Repository;

use App\Interfaces\StudentRepositoryInterface;
use App\Models\BloodType;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\Guardian;
use App\Models\Image;
use App\Models\Nationality;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentRepository implements StudentRepositoryInterface
{
    public function index()
    {
        $students = Student::all();
        return view('pages.students.index', compact('students'));
    }

    public function create()
    {
        $data['genders'] = Gender::all();
        $data['nationalities'] = Nationality::all();
        $data['blood_types'] = BloodType::all();
        $data['grades'] = Grade::all();
        $data['guardians'] = Guardian::select('id', 'father_name')->get();
        return view('pages.students.create')->with(['data' => $data]);
    }

    public function edit($id)
    {
        $data['genders'] = Gender::all();
        $data['nationalities'] = Nationality::all();
        $data['blood_types'] = BloodType::all();
        $data['grades'] = Grade::all();
        $data['guardians'] = Guardian::select('id', 'father_name')->get();
        $student = Student::findOrFail($id);
        return view('pages.students.edit')->with(['data' => $data, 'student' => $student]);
    }

    public function update($request)
    {
        try {
            $student = Student::findOrFail($request->id);

            $student->email = $request->email;
            $student->password = Hash::make($request->password);
            $student->name = ['ar' => $request->name, 'en' => $request->name_en];
            $student->birth_date = $request->birth_date;
            $student->gender_id = $request->gender;
            $student->nationality_id = $request->nationality;
            $student->blood_type_id = $request->blood_type;
            $student->grade_id = $request->grade;
            $student->classroom_id = $request->classroom;
            $student->section_id = $request->section;
            $student->guardian_id = $request->guardian;
            $student->academic_year = $request->academic_year;
            $student->save();
            toastr()->success(trans('messages.edited_message'));
            return redirect()->route('students.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function store($request)
    {
        try {
            DB::beginTransaction();
            $student = new Student();
            $student->email = $request->email;
            $student->password = Hash::make($request->password);
            $student->name = ['ar' => $request->name, 'en' => $request->name_en];
            $student->birth_date = $request->birth_date;
            $student->gender_id = $request->gender;
            $student->nationality_id = $request->nationality;
            $student->blood_type_id = $request->blood_type;
            $student->grade_id = $request->grade;
            $student->classroom_id = $request->classroom;
            $student->section_id = $request->section;
            $student->guardian_id = $request->guardian;
            $student->academic_year = $request->academic_year;
            $student->save();

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $name = $image->getClientOriginalName();
                    $image->storeAs('attachments/students/' . $request->name_en, $name, 'attachments');

                    $file = new Image();
                    $file->file_name = $name;
                    $file->imageable_id =  $student->id;
                    $file->imageable_type = 'App\Models\Student';
                    $file->save();
                }
            }

            DB::commit();
            toastr()->success(trans('messages.added_message'));
            return redirect()->route('students.create');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function get_sections($id)
    {
        $sections_list = Section::where('classroom_id', $id)->pluck('name', 'id');
        return $sections_list;
    }
    public function delete($request)
    {
        $student = Student::findOrFail($request->id);
        $student->delete();
        toastr()->success(trans('messages.deleted_message'));
        return redirect()->route('students.index');
    }
}
