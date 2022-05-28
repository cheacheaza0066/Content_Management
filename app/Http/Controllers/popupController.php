<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\Models\Popup;
use Illuminate\Http\Request;

class popupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popup = Popup::all();
        return view('admin.editpopup.index',compact('popup'));
    }

    public function pageAddPopup()
    {
        return view('admin.editpopup.add');
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
            'image' => ['required','mimes:jpg,jpeg,png'],
            'content' => ['required'],
            'startDate' => ['required','date'],
            'endDate' => ['required','date','after:startDate'],

            
        ]);

        //เข้ารหัสรูป
        $image = $request->file('image');

        //ganerate ชื่อภาพ
        $name_gen = hexdec(uniqid());
    
        //ดึงนามสกุลภาพ
        $img_ext = strtolower($image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;

        //อัพโหลด ภาพ 
            $upload_location = 'image/popup/';
            $full_path = $upload_location.$img_name;

            $input =[
                'image' => $full_path,
                'content' => $request->content,
                'created_at' =>Carbon::now(),
                'startDate' => $request->startDate,
                'endDate' => $request->endDate,

            ];

            Popup::create($input);
            $image->move($upload_location,$img_name);


            return redirect()->route('popupall')->with('addpopup',"เพิ่มข้อมูลเรียบร้อย");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    public function show_admin()
    {
        // $dt = now()->toDateString();
        $popup = Popup::all();
        return view('admin.home',compact('popup'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $popup = Popup::find($id);
        return view('admin.editpopup.edit',compact('popup'));
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
        $image = $request->file('image');
        $request->validate([
            
            'startDate' => ['date'],
            'endDate' => ['date','after:startDate'],
              
        ]);


        if($image){
            //ganerate ชื่อภาพ
        $name_gen = hexdec(uniqid());
    
        //ดึงนามสกุลภาพ
        $img_ext = strtolower($image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;

        //อัพโหลด ภาพ 
            $upload_location = 'image/popup/';
            $full_path = $upload_location.$img_name;


            Popup::find($id)->update([
                'image' => $full_path,            
            ]);

            $old_image = $request->old_image;
            unlink($old_image);
            $image->move($upload_location,$img_name);
            return redirect()->route('popupall')->with('update',"อัพเดทข้อมูลเรียบร้อย");

        }
        Popup::find($id)->update([
            'content' => $request->content,
            'startDate' => $request->startDate,
            'endDate' => $request->endDate,

        ]);
        return redirect()->route('popupall')->with('update',"อัพเดทข้อมูลเรียบร้อย");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Popup::find($id)->delete();
        return redirect()->back()->with('delete','ลบข้อมูลเรียบร้อย');
    }
}
