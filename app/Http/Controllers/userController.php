<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user= User::all();
        $select = request()->query('select');

        $search = request()->query('search');
        if($search){
            $user = User::where($select, 'LIKE', "%$search%")->paginate(7);
        }else{
            $user = User::sortable()->paginate(7);

        }
        

        return view('admin.edituser.index')
        ->with('user',$user);

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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'is_admin' => ['required'],
            'isban' => ['required'],
            'password' => ['required','confirmed','string',Password::min(8)->mixedCase()->letters()->numbers()->symbols()],
        ]);
        $user = new User;
        $user -> name = $request->name;
        $user -> username = $request->username;
        $user -> email = $request->email;
        $user -> is_admin = $request->is_admin;
        $user -> isban = $request->isban;

        $user -> password = Hash::make($request->password);
        $user->save();
        return redirect()->back()->with('adduser','เพิ่มข้อมูลเรียบร้อย');



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
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.edituser.edit',compact('user'));
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
        $request->validate([
            'name' => ['string', 'max:255'],
            'username' => ['string', 'max:20'],
            'email' => ['string', 'email', 'max:255'],
            'is_admin' => ['required'],
            'isban' => ['required'],
            // 'password' => ['nullable',Password::min(8)->mixedCase()->letters()->numbers()->symbols()],
        ]);
        $update = User::find($id)->update([
            'name' => $request->name,
            'username' => $request->username, 
            'email' => $request->email,
            'is_admin' => $request->is_admin,
            'isban' => $request->isban,
            // 'password' => Hash::make($request->password),
        ]);
        return redirect()->route('userall')->with('update',"อัพเดทข้อมูลเรียบร้อย");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = User::find($id)->delete();
        return redirect()->back()->with('delete','ลบข้อมูลเรียบร้อย');

    }

    public function changePassword($id)
    {
        $user = User::find($id);
        return view('admin.edituser.editpassword',compact('user'));

      

    }

    
    public function updatePassword(Request $request ,$id)
    {
            
            $request->validate([
                'password' => ['required','confirmed','string',Password::min(8)->mixedCase()->letters()->numbers()->symbols()],
            ]);
    
            $update = User::find($id)->update([
                'password' => Hash::make($request->password),
            ]);
    
            return redirect()->route('admin.dashbord.user')->with('password',"อัพเดทข้อมูลเรียบร้อย");
        }


        
        
    
    
}
