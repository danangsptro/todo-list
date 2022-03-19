<?php

namespace App\Http\Controllers;

use App\todolist;
use Illuminate\Http\Request;

class todoListController extends Controller
{
    public function index()
    {
        $data = todolist::all();
        return view('todo.index', compact('data'));
    }

    public function create($id = null)
    {
        if ($id) {
            $todo = todolist::find($id);
            return view('todo.create', compact('todo'));
        }
        return view('todo.create');
    }

    public function findByid($id)
    {
        return todolist::find($id);
    }

    public function store(Request $request, $id = null)
    {
        try {
            $todo = $request->all();
            if ($id) {
                $find = $this->findByid($id);
                if (!$find) {
                    return redirect()->back()->with([
                        'message' => 'Data does not exist',
                        'style' => 'danger'
                    ]);
                }
                $find->name = $todo['name'];
                $find->age = $todo['age'];
                $find->gender = $todo['gender'];
                $find->address = $todo['address'];
                $find->save();
                return redirect('todo')->with([
                    'message' => "Data $find->name Successfully edited",
                    'style' => 'success'
                ]);
            }

            $data = new todolist();
            $data->name = $request->name;
            $data->age = $request->age;
            $data->gender = $request->gender;
            $data->address = $request->address;
            $data->save();

            return redirect('todo')->with([
                'message' => "Data $data->name Created Successfully",
                'style' => 'success'
            ]);
        } catch (\Throwable $th) {
            $th->getMessage();
            return redirect()->back()->with([
                'message' => 'Data fail to save',
                'style' => 'danger'
            ]);
        }
    }

    public function delete($id)
    {
        $find = $this->findByid($id);
        if (!$find) {
            return redirect()->back()->with([
                'message' => 'Data does not exist',
                'style' => 'danger'
            ]);
        }
        $find->delete();
        return redirect()->back()->with([
            'message' => "Data $find->name Successfully Deleted",
            'style' => 'success'
        ]);
    }
}
