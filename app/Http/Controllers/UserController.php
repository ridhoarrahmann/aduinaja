<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Masyarakat;
use App\Models\Kategori;
use App\Models\Sub_kategori;
use App\Models\Pengaduan;
use App\Models\Petugas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
// use Notification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Notifiable;
use App\Notifications\PengaduanBaruNotification;
 
class UserController extends Controller
{
  use Notifiable;
   public function index(){
    return view('user/dashboard');
    // echo Auth::user()->name;
   // echo  Auth::user()->nik;
   } 
   public function tambah_laporan(){
   	$kategori=Kategori::get();
   	return view('user/form_laporan',['kategori'=>$kategori]);
   }
   public function getSubKategori(Request $request){
        $subKategori = Sub_kategori::where("id_kategori",$request->idKategori)->pluck('nama_sub_kategori','id_sub_kategori');
        return response()->json($subKategori);
        // var_dump($subKategori);
    }
    public function tambah_laporan_action(Request $request){
      $validated_data=$request->validate([
        'kategori'=>'required',
        'subkategori'=>'required',
        'foto'=>'required',
        'isi_pengaduan'=>'required'
      ]);

       $file= $request->file('foto');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public'), $filename);
            $foto= $filename;

      $insert_data=[
        'id_kategori'=>$request->input('kategori'),
        'id_sub_kategori'=>$request->input('subkategori'),
        'tgl_pengaduan'=>date("Y-m-d"),
        'nik'=>Auth::guard('users')->user()->nik,
        'isi_laporan'=>$request->input('isi_pengaduan'),
        'foto'=>$foto,
        'status'=>"0",
      ];  
      Pengaduan::create($insert_data);
      $offerData = [
            'name' => 'BOGO',
            'body' => 'Pengaduan Baru.',
            'thanks' => 'Thank you',
            'offerText' => 'Check out the offer',
            'offerUrl' => url('/'),
            'offer_id' => 007
        ];
        // $userSchema=Masyarakat::get();
        // Notification::send($userSchema,   new PengaduanBaruNotification($offerData));
        // notify(new PengaduanBaruNotification($offerData));
        $user=Masyarakat::where('nik',Auth::guard('users')->user()->nik)->first();
        // $user=[
        //   'id_masyarakat'=>1,
        //   'email'=>'user@gmail.com',
        //   'nama'=>'user'
        // ];
        // $user = Masyarakat::where('nik','1234123412341234')->first();
        // $user=Masyarakat::find(Auth::guard('users')->user()->nik);
          // dd($user);
          $admin = Petugas::get();
          // Auth::guard('admin')->user()->notify(new PengaduanBaruNotification($user));
          $admin->each->notify(new PengaduanBaruNotification($user));
        // var_dump($user);
      return redirect('/laporan-success');
    }
    public function laporan_success(){
      return view('user/laporan_success');
    }
    public function history(Request $request){
      $status = $request->s;
      if($status){
          if($status==1){

              $history= Pengaduan::join('sub_kategori','sub_kategori.id_sub_kategori','=','pengaduan.id_sub_kategori')->where('nik',Auth::guard('users')->user()->nik)->where('status','proses')->get();
              $btn_active= "1";
          }else{
            $history= Pengaduan::join('sub_kategori','sub_kategori.id_sub_kategori','=','pengaduan.id_sub_kategori')->where('nik',Auth::guard('users')->user()->nik)->where('status','selesai')->get();
             $btn_active= "1";
          }
      }else{
         $history= Pengaduan::join('sub_kategori','sub_kategori.id_sub_kategori','=','pengaduan.id_sub_kategori')->where('nik',Auth::guard('users')->user()->nik)->get();
          $btn_active= "1";
      }
     
      return view('user/history',['history'=>$history,'btn_active'=>$btn_active]);
      
    }
    public function history_detail($id_pengaduan){
      $data_pengaduan = DB::table('pengaduan')->join('sub_kategori','sub_kategori.id_sub_kategori','=','pengaduan.id_sub_kategori')->join('kategori','kategori.id_kategori','=','sub_kategori.id_kategori')->leftJoin('tanggapan','tanggapan.id_pengaduan','=','pengaduan.id_pengaduan')-> where('pengaduan.id_pengaduan',$id_pengaduan)->first();
      return view('user/history-detail',['data_pengaduan'=>$data_pengaduan]);
    }


   
}
