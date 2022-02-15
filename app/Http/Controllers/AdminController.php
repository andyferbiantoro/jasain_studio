<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portofolio;
use App\Layanan;
use App\Team;
use App\Galeri;
use App\Testimoni;
use Auth;
use DB;
use File;

class AdminController extends Controller
{

   public function index(){


     return view('admin.dashboard.index');
  }


  public function admin_portofolio(){

   $portofolio = Portofolio::orderby('id','DESC')->get();

   return view('admin.portofolio',compact('portofolio'));
}

public function admin_portofolio_add(Request $request){

   $data_add = new Portofolio();

   $data_add->judul = $request->input('judul');
   $data_add->jenis_project = $request->input('jenis_project');
   $data_add->deskripsi = $request->input('deskripsi');
  

   if ($request->hasFile('image')) {
       $file = $request->file('image');
       $extension = $file->getClientOriginalExtension();
       $filename = $file->getClientOriginalName();
       $path = $file->store('public/uploads/portofolio/');
       $file->move('uploads/portofolio/', $filename);
       $data_add->image = $filename;
       $data_add->path = $path;
   } else {
       echo "Gagal upload gambar";
   }


  $data_add->save();

   return redirect('/admin_portofolio')->with('success', 'Data Portofo Baru Berhasil Ditambahkan');
}

public function admin_portofolio_update(Request $request, $id)
{

  $data_update = Portofolio::where('id', $id)->first();


  $input = [
     'judul' => $request->judul,
     'jenis_project' => $request->jenis_project,
     'deskripsi' => $request->deskripsi,


 ];


  if ($file = $request->file('image')) {
     if ($data_update->image) {
        File::delete('public/uploads/portofolio/' . $data_update->image);
    }
    $nama_file = $file->getClientOriginalName();
    $path = $file->store('public/uploads/portofolio');
    $file->move(public_path() . '/uploads/portofolio/', $nama_file);
    $input['image'] = $nama_file;
}


 $data_update->update($input);

  return redirect('/admin_portofolio')->with('success', 'Data Portofo Baru Berhasil Diupdate');
}

public function admin_portofolio_delete($id)
{
  $delete = Portofolio::findOrFail($id);
   File::delete('public/uploads/portofolio/' . $delete->image);
  $delete->delete();

  return redirect('/admin_portofolio')->with('success', 'Data Portofo Baru Berhasil Dihapus');
}


//==========================================================================================================================
 public function admin_layanan(){

   $layanan = Layanan::orderby('id','DESC')->get();

   return view('admin.layanan',compact('layanan'));
}


public function admin_layanan_add(Request $request){

   $data_add = new layanan();

   $data_add->judul = $request->input('judul');
   $data_add->deskripsi = $request->input('deskripsi');
  

  $data_add->save();

   return redirect('/admin_layanan')->with('success', 'Data Layanan Baru Berhasil Ditambahkan');
}

public function admin_layanan_update(Request $request, $id)
{

  $data_update = layanan::where('id', $id)->first();


  $input = [
     'judul' => $request->judul,
     'deskripsi' => $request->deskripsi,

 ];


 $data_update->update($input);

  return redirect('/admin_layanan')->with('success', 'Data Layanan Baru Berhasil Diupdate');
}

public function admin_layanan_delete($id)
{
  $delete = layanan::findOrFail($id);
  $delete->delete();

  return redirect('/admin_layanan')->with('success', 'Data Layanan Baru Berhasil Dihapus');
}

//========================================================================================================================

 public function admin_team(){

   $team = Team::orderby('id','DESC')->get();

   return view('admin.team',compact('team'));
}


public function admin_team_add(Request $request){

   $data_add = new Team();

   $data_add->nama = $request->input('nama');
   $data_add->posisi_team = $request->input('posisi_team');
  
   if ($request->hasFile('image')) {
       $file = $request->file('image');
       $extension = $file->getClientOriginalExtension();
       $filename = $file->getClientOriginalName();
       $path = $file->store('public/uploads/foto_tim/');
       $file->move('uploads/foto_tim/', $filename);
       $data_add->image = $filename;
       $data_add->path = $path;
   } else {
       echo "Gagal upload gambar";
   }


  $data_add->save();

   return redirect('/admin_team')->with('success', 'Data team Baru Berhasil Ditambahkan');
}


public function admin_team_update(Request $request, $id)
{

  $data_update = Team::where('id', $id)->first();

  $input = [
     'nama' => $request->nama,
     'posisi_team' => $request->posisi_team,
 ];

  if ($file = $request->file('image')) {
     if ($data_update->image) {
        File::delete('public/uploads/foto_tim/' . $data_update->image);
    }
    $nama_file = $file->getClientOriginalName();
    $path = $file->store('public/uploads/foto_tim');
    $file->move(public_path() . '/uploads/foto_tim/', $nama_file);
    $input['image'] = $nama_file;
}

 $data_update->update($input);

  return redirect('/admin_team')->with('success', 'Data team Baru Berhasil Diupdate');
}


public function admin_team_delete($id)
{
  $delete = Team::findOrFail($id);
  $delete->delete();

  return redirect('/admin_team')->with('success', 'Data team Baru Berhasil Dihapus');
}


//==========================================================================================================================

 public function admin_galeri(){

   $galeri = Galeri::orderby('id','DESC')->get();

   return view('admin.galeri',compact('galeri'));
}


public function admin_galeri_add(Request $request){

   $data_add = new Galeri();

   
   $data_add->judul = $request->input('judul');

   if ($request->hasFile('image')) {
       $file = $request->file('image');
       $extension = $file->getClientOriginalExtension();
       $filename = $file->getClientOriginalName();
       $path = $file->store('public/uploads/galeri/');
       $file->move('uploads/galeri/', $filename);
       $data_add->image = $filename;
       $data_add->path = $path;
   } else {
       echo "Gagal upload gambar";
   }


  $data_add->save();

   return redirect('/admin_galeri')->with('success', 'Data galeri Baru Berhasil Ditambahkan');
}


public function admin_galeri_update(Request $request, $id)
{

  $data_update = Galeri::where('id', $id)->first();


  $input = [
     'judul' => $request->judul,
    


 ];


  if ($file = $request->file('image')) {
     if ($data_update->image) {
        File::delete('public/uploads/galeri/' . $data_update->image);
    }
    $nama_file = $file->getClientOriginalName();
    $path = $file->store('public/uploads/galeri');
    $file->move(public_path() . '/uploads/galeri/', $nama_file);
    $input['image'] = $nama_file;
}


 $data_update->update($input);

  return redirect('/admin_galeri')->with('success', 'Data Portofo Baru Berhasil Diupdate');
}



public function admin_galeri_delete($id)
{
  $delete = Galeri::findOrFail($id);
  $delete->delete();

  return redirect('/admin_galeri')->with('success', 'Data galeri Baru Berhasil Dihapus');
}


//=========================================================================================================================

 public function admin_testimoni(){

   $testimoni = Testimoni::orderby('id','DESC')->get();

   return view('admin.testimoni',compact('testimoni'));
}


public function admin_testimoni_add(Request $request){

   $data_add = new Testimoni();

   $data_add->nama = $request->input('nama');
   $data_add->isi = $request->input('isi');
  
   if ($request->hasFile('image')) {
       $file = $request->file('image');
       $extension = $file->getClientOriginalExtension();
       $filename = $file->getClientOriginalName();
       $path = $file->store('public/uploads/testimoni/');
       $file->move('uploads/testimoni/', $filename);
       $data_add->image = $filename;
       $data_add->path = $path;
   } else {
       echo "Gagal upload gambar";
   }


  $data_add->save();

   return redirect('/admin_testimoni')->with('success', 'Data testimoni Baru Berhasil Ditambahkan');
}


public function admin_testimoni_update(Request $request, $id)
{

  $data_update = Testimoni::where('id', $id)->first();

  $input = [
     'nama' => $request->nama,
     'isi' => $request->isi,
 ];

  if ($file = $request->file('image')) {
     if ($data_update->image) {
        File::delete('public/uploads/testimoni/' . $data_update->image);
    }
    $nama_file = $file->getClientOriginalName();
    $path = $file->store('public/uploads/testimoni');
    $file->move(public_path() . '/uploads/testimoni/', $nama_file);
    $input['image'] = $nama_file;
}

 $data_update->update($input);

  return redirect('/admin_testimoni')->with('success', 'Data testimoni Baru Berhasil Diupdate');
}


public function admin_testimoni_delete($id)
{
  $delete = Testimoni::findOrFail($id);
  $delete->delete();

  return redirect('/admin_testimoni')->with('success', 'Data testimoni Baru Berhasil Dihapus');
}

}
