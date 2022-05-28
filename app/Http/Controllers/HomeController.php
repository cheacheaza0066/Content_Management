<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\User;
use App\Models\Popup;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

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
        $user = User::all();
        return view('user.home',compact('user'));
    }
// dashbord admin

    public function dashbord_user(){
      
        $user= User::all();
        // $user= User::paginate(1);

        return view('admin.dashbord.user',compact('user'));

    }
    public function dashbord_news(){
      
        $news= News::all();
        // $user= User::paginate(1);

        return view('admin.dashbord.news',compact('news'));

    }
    public function dashbord_popup(){
      
        $popup= Popup::all();
        // $user= User::paginate(1);

        return view('admin.dashbord.popup',compact('popup'));

    }
    public function dashbord_log(){
      
        $activity = Activity::all();

        return view('admin.dashbord.log',compact('activity'));

    }


    public function topic()
    {
        $id = 1;
        $topic = News::where('id',$id)->get();
        return view('admin.home',compact('topic'));

    }

    public function show_admin()
    {
        $dt = Carbon::now();

        // $schedule = Popup::where('startDate', '<=', Carbon::now())
        // ->where('endDate', '>=', Carbon::now())
        // ->get();
        $startDate = Popup::select("startDate")
        ->whereRaw('? between startDate and endDate', [date('Y-m-d')])
        ->get();
        $endDate = Popup::select("endDate")
        ->whereRaw('? between startDate and endDate', [date('Y-m-d')])
        ->get();

        $posts = Popup::whereDate('startDate', Carbon::today())->get();

        return view('admin.home')->with([
            'news' => News::all(),
            'popup' => Popup::all(),
            'dt' => $dt,
            // 'schedule' =>$schedule,
            // 'startDate' => $startDate,
            // 'endDate' => $endDate,
            'posts' => $posts,


        ]);

    }

    public function show_user(){
        $dt = Carbon::now();

        // $schedule = Popup::where('startDate', '<=', Carbon::now())
        // ->where('endDate', '>=', Carbon::now())
        // ->get();
        $startDate = Popup::select("startDate")
        ->whereRaw('? between startDate and endDate', [date('Y-m-d')])
        ->get();
        $endDate = Popup::select("endDate")
        ->whereRaw('? between startDate and endDate', [date('Y-m-d')])
        ->get();

        $posts = Popup::whereDate('startDate', Carbon::today())->get();
        return view('user.home')->with([
            'news' => News::all(),
            'popup' => Popup::all(),
            'dt' => $dt,
            // 'schedule' =>$schedule,
            // 'startDate' => $startDate,
            // 'endDate' => $endDate,
            'posts' => $posts,


        ]);
    }

    public function show_admid_app(){
         $news = News::all();
        return view('admin.layouts.app',compact('news'));

    }

    //backup
    // public function createBackup(){

    //     Artisan::call('backup:run',['--only-db'=>true]);
    //    return redirect()->back();
       
    //    }

}
