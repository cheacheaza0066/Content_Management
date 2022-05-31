<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Popup;
use App\Models\User;
use App\Notifications\newsNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
// use Notification;

use Illuminate\Support\Facades\Notification;
// use Illuminate\Notifications\Notification;

class newsController extends Controller
{
    public function index()
    {
        $select = request()->query('select');

        $search = request()->query('search');
        if($search){
            $news = News::where($select, 'LIKE', "%$search%")->paginate(5);
        }else{
            $news = News::sortable()->paginate(5);

        }

        return view('admin.editnews.index',compact('news'));
    }

    public function pageAddNews()
    {
        return view('admin.editnews.add');
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
        $user = User::all();
        $request->validate([
            'title' => ['required'],
            'image' => ['required','mimes:jpg,jpeg,png'],
            'content' => ['required'],
            
        ]);

        //เข้ารหัสรูป
        $image = $request->file('image');

        //ganerate ชื่อภาพ
        $name_gen = hexdec(uniqid());
    
        //ดึงนามสกุลภาพ
        $img_ext = strtolower($image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;

        //อัพโหลด ภาพ 
            $upload_location = 'image/news/';
            $full_path = $upload_location.$img_name;
          
            $input =[
                'title' => $request->title,
                'image' => $full_path,
                'content' => $request->content,
                'created_at' =>Carbon::now()
            ];
            
            News::create($input);
            $image->move($upload_location,$img_name);

            Notification::send($user, new newsNotification($request->title));

            // $user->notify(new newsNotification($request->title));
            
            return redirect()->route('newsall')->with('addnews',"เพิ่มข้อมูลเรียบร้อย");




    }
   
  
    


    //detail Home
    public function detail_admin($id){
        $data = News::find($id);
        return view('admin.detailNews',compact('data'));
    }
    
    public function detail_user($id){
        $data = News::find($id);
        return view('user.detailNews',compact('data'));
    }


    
    public function edit($id)
    {
        $news = News::find($id);
        return view('admin.editnews.edit',compact('news'));
    }

   
    public function update(Request $request, $id)
    {

        $image = $request->file('image');

        if($image){
            //ganerate ชื่อภาพ
        $name_gen = hexdec(uniqid());
    
        //ดึงนามสกุลภาพ
        $img_ext = strtolower($image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;

        //อัพโหลด ภาพ 
            $upload_location = 'image/news/';
            $full_path = $upload_location.$img_name;


            News::find($id)->update([
                'image' => $full_path,
            ]);

            $old_image = $request->old_image;
            unlink($old_image);
            $image->move($upload_location,$img_name);
            return redirect()->route('newsall')->with('update',"อัพเดทข้อมูลเรียบร้อย");

        }
        News::find($id)->update([
            'title' => $request->title,
            'content' => $request->content,
        
        ]);
        return redirect()->route('newsall')->with('update',"อัพเดทข้อมูลเรียบร้อย");


    }

   
    public function destroy($id)
    {
        $delete = News::find($id)->delete();
        return redirect()->back()->with('delete','ลบข้อมูลเรียบร้อย');

    }

    // public function notify(){
    //     $user = User::find(1);
    //     return view('admin.home');
    // }
    
}
