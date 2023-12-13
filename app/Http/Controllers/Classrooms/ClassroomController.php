<?php

namespace App\Http\Controllers\Classrooms;

use App\Http\Controllers\controller;
use App\Http\Requests\StoreClassroomRequest;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $classrooms = Classroom::all();
        $grades = Grade::all();
        return view('pages.classrooms.index', compact('classrooms', 'grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(StoreClassroomRequest $request)
    {

        // $validated = $request->validate();
        try {
            $class_list = $request->classList;
            foreach ($class_list as $class) {
                $classroom = new Classroom();
                $classroom->class_name = ['ar' => $class['name'], 'en' => $class['name_en']];
                $classroom->grade_id = $class['grade_id'];
                $classroom->save();
            }
            toastr()->success(trans('messages.added_message'));
            return redirect()->route('classrooms.index');
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
    public function update(Request $request)
    {
        // $validated = $request->validate();
        // dd($request);
        try {

            $class = Classroom::findOrFail($request->id);
            $class->class_name = ['ar' => $request['name'], 'en' => $request['name_en']];
            $class->grade_id = $request['grade_id'];
            $class->save();
            toastr()->success(trans('messages.edited_message'));
            return redirect()->route('classrooms.index');
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
        Classroom::findOrFail($request->id)->delete();
        toastr()->success(trans('messages.deleted_message'));
        return redirect()->route('classrooms.index');
    }
    public function delete_all(Request $request)
    {
        $delete_all_ids = explode(',', $request->delete_all_ids);
        Classroom::whereIn('id', $delete_all_ids)->delete();
        toastr()->success(trans('messages.deleted_message'));
        return redirect()->route('classrooms.index');
    }

    public function filter_classes(Request $request)
    {
        $grades = Grade::all();
        if ($request->search_id == "all-grades") {
            $filter_result = Classroom::all();
        } else {
            $filter_result = Classroom::where('grade_id', $request->search_id)->get();
        }
        return view('pages.classrooms.index', compact('grades', 'filter_result'));
    }
}
