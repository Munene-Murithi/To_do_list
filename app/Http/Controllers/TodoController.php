<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;


class TodoController extends Controller
{
   
    public function index(Request $request)
{
    $sort = $request->input('sort');

    // Fetch todos based on the sorting parameter
    if ($sort === 'name') {
        $todos = Todo::orderBy('name')->get();
    } elseif ($sort === 'description') {
        $todos = Todo::orderBy('description')->get();
    } elseif ($sort === 'created_at') {
        $todos = Todo::orderBy('created_at')->get();
    } else {
        $todos = Todo::all();
    }

    return view('main')->with('todos', $todos);
}
     
    
    
    public function create(){
        return view('create');
    }




    
    public function edit(Todo $todo)
{
    return view('edit')->with('todo', $todo);
}






    public function update(Todo $todo){

        try {
            $this->validate(request(), [
                'name' => ['required'],
                'description' => ['required'],
           
            ]);
        } catch (ValidationException $e) {
        }

        $data = request()->all();

       
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->save();

        session()->flash('success', 'Todo updated successfully');

        return redirect('/main');

    }





    public function delete(Todo $todo){

        $todo->delete();

        return redirect('/main');

    }






    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => ['required'],
                'description' => ['required']
            ]);
        } catch (ValidationException $e) {
            // Handle validation exception if needed
        }
    
        $data = $request->all();
    
        $todo = Todo::create([
            'name' => $data['name'],
            'description' => $data['description']
        ]);
    
        session()->flash('success', 'Todo created successfully');
    
        return redirect('/main');
    }
    
}
