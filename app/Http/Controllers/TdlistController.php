<?php

namespace App\Http\Controllers;

use App\Models\tdlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class TdlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //Task is a folder in resources/js/Pages (create new folder)
        //Show.vue is a file in task folder
        return inertia('Task/Show',[
            //lists is a variable that you can put whatever name you want but must follow the convention lah need to have 's'
            //tdlists is a function in User model
            //this line will list out all the task specific to the user that currently log in
            'lists' => auth()->user()->tdlists
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all()); //utk tahu data tu masuk ke tak
        $validated = $request->validate([
            'list' => 'required|min:5',
        ]);

        $user = auth()->user();

        $todo = new tdlist(); //Tdlist is a controller
        $todo->list = $validated['list']; //list is a variable that you declared in TodoForm.vue
                                        // $todo->list is a attribute in table tdlists

        $user->tdlists()->save($todo);

        return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tdlist  $tdlist
     * @return \Illuminate\Http\Response
     */
    public function show(tdlist $tdlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tdlist  $tdlist
     * @return \Illuminate\Http\Response
     */
    public function edit(tdlist $tdlist)
    {
        return inertia('Task/TodoEdit',[
            'list' => $tdlist
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tdlist  $tdlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tdlist $tdlist)
    {
        $tdlist->list = $request->list; //the variable list comes from todoedit.vue
        $tdlist->save();

        return Redirect::route('tdlists.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tdlist  $tdlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(tdlist $tdlist)
    {
        // dd($tdlist);
        $tdlist->delete();

        return redirect()->back();
    }
}
