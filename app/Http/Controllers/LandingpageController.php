<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Galeri;
use App\Portofolio;
use App\Testimoni;

class LandingpageController extends Controller
{
    //


    public function index(){
        
        $team = Team::orderby('id','DESC')->get();
        $data_galeri = Galeri::orderby('id','DESC')->get();
        $data_portofolio = Portofolio::orderby('id','DESC')->get();
        $testimoni = Testimoni::orderby('id','DESC')->get();


        return view('landingpage.index',compact('team','data_galeri','data_portofolio','testimoni'));
    }
}
