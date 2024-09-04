<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\admin;
use App\Models\Person;
use App\Models\Doctor;
use App\Models\Material;
use App\Models\Invoice;
use Dflydev\DotAccessData\Data;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $people = Person::all();
        return view('admin.user.index', compact('users', 'people'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        // dd($request->all());
        // dd('5');
        $user = new User;
        $mPerson = Person::create([
            'name' => $request->name,
            'last_name' => $request->last_name
        ]);
        $mUser = User::create([
            'email' => $request->email,
            'password' => $request->password,
            'person_id' => $mPerson->id
        ]);
        // dd($model->id);
        // dd($mPerson->id);
        return redirect()->route('admin.user.index')
            ->with('Se ha creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Person  $people
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Person $people)
    {
        // dd($user->all());
        $mUser = User::all();
        $mPerson = Person::all();
        return view('admin.user.info', compact('user', 'people'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // dd($user);

        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @param  \App\Models\Person  $people
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, Person $people,)
    {
        // dd($request->all());
        $datauser = [];
        $datapeople = [];
        $datapeople['name'] = $request->name;
        $datapeople['last_name'] = $request->last_name;
        $datauser['email'] = $request->email;
        if ($request->password != null) {
            $datauser['password'] = $request->password;
        }

        $user->person->update($datapeople);
        $user->update($datauser);
        // $user->update($datauser);
        return redirect()->route('admin.user.index')
            ->with('Se creo correctamente');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Person  $people
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Person $people)
    {
        $user->person->delete();
        $user->delete();
        return redirect()->route('admin.user.index')
            ->with('eliminar', 'ok');
    }
}
