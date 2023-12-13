<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\controller;
use App\Http\Requests\StoreGradeRequest;
use App\Http\Requests\UpdateGradeRequest;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $grades = Grade::all();
        return view('pages.grades.index', compact('grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(StoreGradeRequest $request)
    {
        // if (Grade::where('name->ar', $request->name)->orWhere('name->en', $request->name_en)->exists()) {

        //     return redirect()->back()->with(['error' => trans('validation.unique')]);
        // }

        try {
            $request->validated();
            $grade = new Grade();
            $grade->name = ['ar' => $request->name, 'en' => $request->name_en];
            $grade->notes = $request->notes;
            $grade->save();
            toastr()->success(trans('messages.added_message'));
            return redirect()->route('grades.index');
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
    public function update(UpdateGradeRequest $request)
    {
        try {
            $request->validated();

            $grade = Grade::findOrFail($request->id);
            $grade->name = ['ar' => $request->name, 'en' => $request->name_en];
            $grade->notes = $request->notes;
            $grade->save();
            toastr()->success(trans('messages.edited_message'));
            return redirect()->route('grades.index');
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
        try {

            $grade = Grade::findOrFail($request->id);
            // $classes = Classroom::where('grade_id', $request->id)->pluck('grade_id', 'class_name');

            $classes = $grade->classrooms;
            if ($classes->count() !== 0) {
                toastr()->error(trans('messages.classes_exist'));
                return redirect()->route('grades.index');
            }

            $grade->delete();
            toastr()->success(trans('messages.deleted_message'));
            return redirect()->route('grades.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
