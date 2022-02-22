<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Galeri;
use App\Portofolio;
use App\Testimoni;
use App\Kontak;
use App\VisiMisi;

class LandingpageController extends Controller
{
    //


    public function index(Request $request){
        
        $filter_portofolio = portofolio::all();
    

       if ($request->filter == Null) {
           $request->filter = "";
       }

       $port = $request->filter;
      
        $kontak = Kontak::orderby('id','DESC')->get();
        $visi_misi = VisiMisi::orderby('id','DESC')->get();
        $team = Team::orderby('id','DESC')->get();
        $data_galeri = Galeri::orderby('id','DESC')->get();
        $testimoni = Testimoni::orderby('id','DESC')->get();
        $data_portofolio = Portofolio::orderby('id','DESC')
         ->where('jenis_project', 'like','%'. $request->filter. '%')->get();

        
        return view('landingpage.index',compact('team','data_galeri','data_portofolio','testimoni','filter_portofolio','port','kontak','visi_misi'));


    }
}
