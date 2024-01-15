<?php

namespace App\Http\Controllers\sections;

use Illuminate\Http\Request;
use App\Http\Controllers\controller;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;

class SectionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $grades = Grade::with(['sections'])->get();
        $grades_list = Grade::all();
        $teachers = Teacher::all();
        return view('pages.sections.index', compact('grades', 'grades_list', 'teachers'));
    }

    public function get_classes($id)
    {
        $classes_list = Classroom::where('grade_id', $id)->pluck('class_name', 'id');
        return $classes_list;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(StoreSectionRequest $request)
    {
        // if (Grade::where('name->ar', $request->name)->orWhere('name->en', $request->name_en)->exists()) {

        //     return redirect()->back()->with(['error' => trans('validation.unique')]);
        // }

        try {
            $request->validated();
            $section = new Section();
            $section->name = ['ar' => $request->name, 'en' => $request->name_en];
            $section->grade_id = $request->grade_id;
            $section->classroom_id = $request->class_id;
            $section->save();
            $section->teachers()->sync($request->teacher_id);
            toastr()->success(trans('messages.added_message'));
            return redirect()->route('sections.index');
        } catch (\Exception $e) {

            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(UpdateSectionRequest $request)
    {
        try {
            $request->validated();
            $section = Section::findOrFail($request->id);
            $section->name = ['ar' => $request->name, 'en' => $request->name_en];
            $section->grade_id = $request->grade_id;
            $section->classroom_id = $request->class_id;


            $section->teachers()->sync($request->teacher_id);
            $section->save();
            // if (isset($request->teacher_id)) {
            //     $section->teachers->sync($request->teacher_id);
            // } else {
            //     $section->teachers->sync(array());
            // }
            toastr()->success(trans('messages.edited_message'));
            return redirect()->route('sections.index');
        } catch (\Exception $e) {

            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request)
    {
        $section = Section::findOrFail($request->id);
        $section->teachers()->detach();
        $section->delete();

        toastr()->success(trans('messages.deleted_message'));
        return redirect()->route('sections.index');
    }
}
