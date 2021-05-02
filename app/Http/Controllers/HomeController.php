<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function createPost(Request $request){
        $request->validate(['body' => 'required|min:6']);

        auth()->user()->posts()->create(['body' => $request->body]);

        return redirect(route('home'));
    }

    public function showProfile(){
        return view('userProfile');
    }

    public function deletepicture(){
        if(file_exists (public_path('users/'.auth()->user()->id.'.jpg'))){
            unlink(public_path('users/'.auth()->user()->id.'.jpg'));
            $status = 'suppression effectuer';
        }
        else{
            $status = 'suppression echouer';
        }

        return redirect('/user')->with('status', $status);
    }

    public function modifyProfile(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if (isset($_FILES['picture'])){
            if ($_FILES['picture']['error'] == 0){
                $image_name = auth()->user()->id.'.jpg';
                $path = public_path().'/users/';
                $request->picture->move($path, $image_name);
            }
        }

        DB::table('users')->where('id', auth()->user()->id)->update(['name' => $request->name, 'email' => $request->email, 'password' => Hash::make($request->password)]);


        return redirect('/user')->with('status', 'Modification reussi');

    }
}
