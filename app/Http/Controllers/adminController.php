<?php

namespace App\Http\Controllers;

use App\func;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class adminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ADMINS=User::all();
        $ADMINSONLINE=User::whereOnline(true)->count();
        return view('gestionadmin',compact('ADMINS','ADMINSONLINE'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ADMIN=null;
        return view('ajoutadmin',compact('ADMIN'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);



        User::create([
            'name' => $request->name,
            'slug' => func::random(15),
            'surname' => $request->surname,
            'email' => $request->email,
            'description' => $request->description,
            'image'=>$request->image,
            'phone'=>$request->phone,
            'password' => Hash::make($request['password']),
        ]);


        return redirect()->route('admin.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ADMIN=User::find($id);
        return view('profiladmin',compact('ADMIN'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ADMIN=User::find($id);
        return view('ajoutadmin',compact('ADMIN'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', "unique:users,email,$id,id"],

            //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->password!=null)
         $this->validate($request,[
             'password' => ['string', 'min:8', 'confirmed']
         ]);


        $ADMIN=User::find($id);
        $ADMIN->name=$request->name;
        $ADMIN->surname=$request->surname;
        $ADMIN->email=$request->email;
        $ADMIN->phone=$request->phone;
        $ADMIN->password=$request->password!=null?Hash::make($request->password):$ADMIN->password;

        $ADMIN->save();
        return redirect()->route('admin.show',[$ADMIN]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ADMIN=User::find($id);
        $ADMIN->delete();
        return redirect()->route('admin.index');

    }



}
