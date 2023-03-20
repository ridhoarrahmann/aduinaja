<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use App\Models\Petugas;
use App\Models\Sub_Kategori;
use App\Models\Tanggapan;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use PDF;
class AdminController extends Controller
{
    public function index(){
        $jumlah_pengaduan = Pengaduan::count();
        $jumlah_belum_ditanggapi = Pengaduan::where('status',"0")->count();
        $jumlah_proses=Pengaduan::where('status','proses')->count();
        $jumlah_selesai=Pengaduan::where('status','selesai')->count();
        $data_pengaduan=DB::table('pengaduan')->join('kategori','kategori.id_kategori','=','pengaduan.id_kategori')->take(3)->get();
        $pengguna_terbaru = Masyarakat::take(3)->get();
        return view('admin/dashboard',['jumlah_pengaduan'=>$jumlah_pengaduan,'jumlah_belum_ditanggapi'=>$jumlah_belum_ditanggapi,'jumlah_proses'=>$jumlah_proses,'jumlah_selesai'=>$jumlah_selesai,'pengaduan_terbaru'=>$data_pengaduan,'pengguna_terbaru'=>$pengguna_terbaru]);
    }
    public function data_petugas(Request $request){
    	$search = $request->query('cari');
    	// jika tidak kosong
    	if(!empty($search)){
    		if($search=='admin'){
$data_petugas=Petugas::where('level','admin')->paginate(10);
    		}else{
$data_petugas=Petugas::where('level','petugas')->paginate(10);
    		}
    	}else{
    		$data_petugas=Petugas::paginate(10);
    	}
        
        return view('admin/data-petugas',['data_petugas'=>$data_petugas]);

     }

    public function tambah_petugas(){
    	return view('admin/tambah-petugas');

    }
    public function tambah_petugas_action(Request $request){

    	 $validatedData=$request->validate([
            'nama_petugas'=>'required',
            'username'=>'required|unique:petugas',
            'password'=>'required',
            'telp'=>'required',
            'level'=>'required'
        ]);
        Petugas::create([
            'nama_petugas'=>$request->input('nama_petugas'),
            'username'=>$request->input('username'),
            'password'=>Hash::make($request->input('password')),
            'telp'=>$request->input('telp'),
            'level'=>$request->input('level'),

        ]);
        return redirect('data-petugas');
    }
    public function data_masyarakat(){
    	$data_user=Masyarakat::paginate(10);
    	return view('admin/data-user',['data_user'=>$data_user]);
    }
    public function kategori(){
        $data_kategori=Kategori::get();
        $data_sub_kategori=DB::table('sub_kategori')->join('kategori','kategori.id_kategori','=','sub_kategori.id_kategori')->get();
        return view('admin/kategori',['data_kategori'=>$data_kategori,'data_sub_kategori'=>$data_sub_kategori]);
        // var_dump($data_sub_kategori);
    }
    public function tambah_kategori(Request $request){
        $validated_data=$request->validate([
                'nama_kategori'=>'required',
        ]);
        Kategori::create([
                'nama_kategori'=>$request->input('nama_kategori'),
        ]);
        return redirect('/kategori');
    } 
    public function tambah_sub_kategori(Request $request){
        $validated_data=$request->validate([
                'nama_sub_kategori'=>'required',
        ]);
        Sub_Kategori::create([
                'nama_sub_kategori'=>$request->input('nama_sub_kategori'),
                'id_kategori'=>$request->input('id_kategori'),
        ]);
        return redirect('/kategori');
    }
    public function kategori_edit(Request $request, $id_kategori){
        $validated_data=$request->validate([
            'nama_kategori'=>'required'
        ]);
        $update_data=[
            'nama_kategori'=>$request->input('nama_kategori'),
        ];
        Kategori::where('id_kategori',$id_kategori)->update($update_data);
        return redirect('/kategori');
    }
    public function sub_kategori_edit(Request $request,$id_sub_kategori){
        $validated_data=$request->validate([
            'nama_kategori'=>'required',
            'nama_sub_kategori'=>'required'
        ]);
        $update_data=[
            'id_kategori'=>$request->input('nama_kategori'),
            'nama_sub_kategori'=>$request->input('nama_sub_kategori')

        ];
    
        Sub_kategori::where('id_sub_kategori',$id_sub_kategori)->update($update_data);
        return redirect('/kategori');
    }
    public function kategori_hapus($id){
        Kategori::where('id_kategori',$id)->delete();
        return redirect('/kategori');
    }
    public function data_laporan(Request $request){
        $status=$request->s;
        if($status){
        if($status==3){
              $data_pengaduan=DB::table('pengaduan')->join('kategori','kategori.id_kategori','=','pengaduan.id_kategori')->join('sub_kategori','sub_kategori.id_sub_kategori','=','pengaduan.id_sub_kategori')->join('masyarakat','masyarakat.nik','=','pengaduan.nik')->where('status',"0")->get();
          }elseif($status==1){
             $data_pengaduan=DB::table('pengaduan')->join('kategori','kategori.id_kategori','=','pengaduan.id_kategori')->join('sub_kategori','sub_kategori.id_sub_kategori','=','pengaduan.id_sub_kategori')->join('masyarakat','masyarakat.nik','=','pengaduan.nik')->where('status','proses')->get();
          }elseif($status==2){
             $data_pengaduan=DB::table('pengaduan')->join('kategori','kategori.id_kategori','=','pengaduan.id_kategori')->join('sub_kategori','sub_kategori.id_sub_kategori','=','pengaduan.id_sub_kategori')->join('masyarakat','masyarakat.nik','=','pengaduan.nik')->where('status','selesai')->get();
          }else{
            $data_pengaduan=DB::table('pengaduan')->join('kategori','kategori.id_kategori','=','pengaduan.id_kategori')->join('sub_kategori','sub_kategori.id_sub_kategori','=','pengaduan.id_sub_kategori')->join('masyarakat','masyarakat.nik','=','pengaduan.nik')->get();
          }
        }else{
         $data_pengaduan=DB::table('pengaduan')->join('kategori','kategori.id_kategori','=','pengaduan.id_kategori')->join('sub_kategori','sub_kategori.id_sub_kategori','=','pengaduan.id_sub_kategori')->join('masyarakat','masyarakat.nik','=','pengaduan.nik')->get();
        }
        if($status){
            return view('/admin/data-pengaduan',['data_pengaduan'=>$data_pengaduan,'s'=>$status]);
        }else{
            return view('/admin/data-pengaduan',['data_pengaduan'=>$data_pengaduan]);
        }
      
       
    }
    public function detail_pengaduan($id_pengaduan){
        // $data_pengaduan=DB::table('pengaduan')->join('kategori','kategori.id_kategori','=','pengaduan.id_kategori')->join('sub_kategori','sub_kategori.id_sub_kategori','=','pengaduan.id_sub_kategori')->join('masyarakat','masyarakat.nik','=','pengaduan.nik')->join('tanggapan','tanggapan.id_pengaduan','=','pengaduan.id_pengaduan')->where('pengaduan.id_pengaduan',$id_pengaduan)->first();
              $data_pengaduan=DB::table('pengaduan')->join('kategori','kategori.id_kategori','=','pengaduan.id_kategori')->join('sub_kategori','sub_kategori.id_sub_kategori','=','pengaduan.id_sub_kategori')->join('masyarakat','masyarakat.nik','=','pengaduan.nik')->leftJoin('tanggapan','tanggapan.tanggapan_id_pengaduan','=','pengaduan.id_pengaduan')->where('pengaduan.id_pengaduan',$id_pengaduan)->first();
       return view('/admin/detail-pengaduan',['data_pengaduan'=>$data_pengaduan]);
    }
    public function tanggapan_pengaduan($id_pengaduan){
       $data_pengaduan=DB::table('pengaduan')->join('kategori','kategori.id_kategori','=','pengaduan.id_kategori')->join('sub_kategori','sub_kategori.id_sub_kategori','=','pengaduan.id_sub_kategori')->join('masyarakat','masyarakat.nik','=','pengaduan.nik')->leftJoin('tanggapan','tanggapan.tanggapan_id_pengaduan','=','pengaduan.id_pengaduan')->where('pengaduan.id_pengaduan',$id_pengaduan)->first();
       return view('/admin/tanggapan-pengaduan',['data_pengaduan'=>$data_pengaduan]);
    }
    public function tanggapan_pengaduan_tambah(Request $request,$id_pengaduan){
        $validated_data=$request->validate([
                'tanggapan'=>'required'
        ]);
        $id=$id_pengaduan;
        $insert_data=[
            'tanggapan_id_pengaduan'=>$id,
            'tgl_tanggapan'=>date("Y-m-d"),
            'id_petugas'=>Auth::guard('admin')->user()->id_petugas,
            'tanggapan'=>$request->input('tanggapan'),

        ];
        Tanggapan::create($insert_data);
        $update_status=[
                'status'=>'proses'
        ];
        Pengaduan::where('id_pengaduan',$id_pengaduan)->update($update_status);
        return redirect('detail-pengaduan/'.$id_pengaduan);
    }
    // pdf
    public function laporan_detail_pdf($id_pengaduan){
        $data_pengaduan=DB::table('pengaduan')->join('kategori','kategori.id_kategori','=','pengaduan.id_kategori')->join('sub_kategori','sub_kategori.id_sub_kategori','=','pengaduan.id_sub_kategori')->join('masyarakat','masyarakat.nik','=','pengaduan.nik')->join('tanggapan','tanggapan.tanggapan_id_pengaduan','=','pengaduan.id_pengaduan')->where('pengaduan.id_pengaduan',$id_pengaduan)->first();
       // return view('/admin/detail-pengaduan',['data_pengaduan'=>$data_pengaduan]);

       $pdf = PDF::loadview('/admin/laporan-detail-pdf',['data_pengaduan'=>$data_pengaduan]);
        return $pdf->download('laporan-pengaduan-pdf');

    }
    public function data_pengaduan_pdf( Request $request){

       
        $status=$request->s;
        if($status){
            if($status==1){
                $data_pengaduan=DB::table('pengaduan')->join('kategori','kategori.id_kategori','=','pengaduan.id_kategori')->join('sub_kategori','sub_kategori.id_sub_kategori','=','pengaduan.id_sub_kategori')->join('masyarakat','masyarakat.nik','=','pengaduan.nik')->where('status','proses')->get();
            }elseif($status==2){
                $data_pengaduan=DB::table('pengaduan')->join('kategori','kategori.id_kategori','=','pengaduan.id_kategori')->join('sub_kategori','sub_kategori.id_sub_kategori','=','pengaduan.id_sub_kategori')->join('masyarakat','masyarakat.nik','=','pengaduan.nik')->where('status','selesai')->get();
            }elseif($status==4){
                  $data_pengaduan=DB::table('pengaduan')->join('kategori','kategori.id_kategori','=','pengaduan.id_kategori')->join('sub_kategori','sub_kategori.id_sub_kategori','=','pengaduan.id_sub_kategori')->join('masyarakat','masyarakat.nik','=','pengaduan.nik')->get();
            }
            else{
                $data_pengaduan=DB::table('pengaduan')->join('kategori','kategori.id_kategori','=','pengaduan.id_kategori')->join('sub_kategori','sub_kategori.id_sub_kategori','=','pengaduan.id_sub_kategori')->join('masyarakat','masyarakat.nik','=','pengaduan.nik')->where('status','0')->get();
            }

        }else{
            $data_pengaduan=DB::table('pengaduan')->join('kategori','kategori.id_kategori','=','pengaduan.id_kategori')->join('sub_kategori','sub_kategori.id_sub_kategori','=','pengaduan.id_sub_kategori')->join('masyarakat','masyarakat.nik','=','pengaduan.nik')->get();
        }


       
        // return view('/admin/detail-pengaduan',['data_pengaduan'=>$data_pengaduan]);
        if($status){
            $pdf = PDF::loadview('/admin/data-pengaduan-pdf',['data_pengaduan'=>$data_pengaduan,'status'=>$status]);
        }else{
            $pdf = PDF::loadview('/admin/data-pengaduan-pdf',['data_pengaduan'=>$data_pengaduan]);
        }
     
         return $pdf->download('data-pengaduan-pdf');
    }
    public function pengaduan_update_selesai($id_pengaduan){
        $update_data=[
            'status'=>'selesai'
        ];
        Pengaduan::where('id_pengaduan',$id_pengaduan)->update($update_data);
        return redirect('/data-laporan?s=2');
    }
    public function ban_user($id_masyarakat){
        $update_data=[
            'active'=>'banned'
        ];
        Masyarakat::where('id_masyarakat',$id_masyarakat)->update($update_data);
        return redirect('admin-data-masyarakat');
    }
     public function activate_user($id_masyarakat){
        $update_data=[
            'active'=>'active'
        ];
        Masyarakat::where('id_masyarakat',$id_masyarakat)->update($update_data);
        return redirect('admin-data-masyarakat');
    }
    public function ban_petugas($id_petugas){
         $update_data=[
            'active'=>'banned'
        ];
        Petugas::where('id_petugas',$id_petugas)->update($update_data);
        return redirect('data-petugas');
    }
     public function activate_petugas($id_petugas){
         $update_data=[
            'active'=>'active'
        ];
        Petugas::where('id_petugas',$id_petugas)->update($update_data);
        return redirect('data-petugas');
    }
}
