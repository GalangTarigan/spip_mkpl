<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Model\Laporan_Instalasi;
use App\Pkl\Traits\LaporanInstalasi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Pkl\Traits\Convert;
class HomeController extends Controller
{
    use LaporanInstalasi;
    use Convert;
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
        $userProjects = $this->getUserProjects(Auth::user()->id);
        $totalUserProjects = $this->getTotalUserProject(Auth::user()->id);
        $onProgress = $this->getTotalUserOnProgressProject(Auth::user()->id);
        $finishedProject = $this->getTotalUserFinishedProject(Auth::user()->id);
        return view('pages.users.dashboard', ['total'=> $totalUserProjects, 'onProgress'=>$onProgress, 'finished'=>$finishedProject]);
    }
    public function indexOfAdmin(Request $request)
    {
        $chartData =$this->getAllData($request);
        $totalProjects = $this->getTotalProject();
        $onProgress = $this->getTotalOnProgressProject();
        $finishedProject = $this->getTotalFinishedProject();
        $complaintProject = $this->getTotalComplaintProject(); 
        $datas = $this->timelineOnProgress();
        return view('pages.admin.dashboardAdmin', compact('datas'),['total'=> $totalProjects, 'onProgress'=>$onProgress, 'finished'=>$finishedProject,'keluhan'=>$complaintProject,'data'=>$chartData, 'year'=>$request->tahun ]);
    }
    public function getAllData(Request $request){
        if (isset($request->tahun)) {
            $tahun=$request->tahun;
        }
        else {
            $tahun=date('Y');
        }
        $year = Carbon::createFromFormat('Y-m-d H:i:s', $this->convertToTimeStamps($request->date_start), 'Asia/Jakarta');
        $data= Laporan_Instalasi::where('waktu_selesai','like',$tahun.'%')->get();
        $bulan=['January'=>0,'February'=>0,'March'=>0,'April'=>0,'May'=>0,'June'=>0,'July'=>0,'August'=>0
                ,'September'=>0,'October'=>0,'November'=>0,'December'=>0,];
        foreach ($data as $item) {
            $tempBulan=date('F', strtotime($item->waktu_selesai));
            $bulan[$tempBulan]=$bulan[$tempBulan]+1;
        }
        
        return ($bulan);
    }
    
    public function timelineOnProgress(){
        $data=Laporan_Instalasi::join('instansi','instansi.id_instansi','=','laporan_instalasi.instansi_id')
             ->where('status','=','Dalam Pengerjaan')->select('waktu_mulai','user_nama','nama_instansi','uuid')->get();
        
        return $data;
      }
    }
   
    
    

