<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::with('role')
            ->orderBy('id', 'desc')
            ->get();

        return view('backend.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =  $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role_id' => 'required|not_in:0',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $data['password'] = Hash::make($request->password);

        User::create($data);

        return redirect('user')->with('success', 'Berhasil menambahkan data user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (Auth::user()->role_id == 2) {

            $provinces = Province::all();
            return view('frondend.edit_user', compact('user', 'provinces'));
        }
        return view('backend.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        if (Auth::user()->role_id == 2) {
            $data = $request->validate([
                'no_hp' => 'required',
                'province' => 'required',
                'city' => 'required',
                'full_address' => 'required',
            ]);

            User::where('id', $user->id)
                ->update();

            return redirect('/')->with('message', 'Berhasil edit profil');
        }

        $data =  $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role_id' => 'required|not_in:0',

        ]);

        if ($request->password !=  null) {
            $data['password'] = Hash::make($request->password);
        }


        User::where('id', $user->id)
            ->update($data);

        return redirect('user')->with('success', 'Berhasil mengubah data user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::where('id', $user->id)
            ->delete();

        return redirect('user')->with('success', 'Berhasil menghapus data user');
    }
}
