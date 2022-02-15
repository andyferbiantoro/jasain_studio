@extends('layouts.app-master')

@section('title')
Layanan 
@endsection

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Layanan</h1>
</div>

      @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
      @endif
      @if (session('error'))
      <div class="alert alert-danger">
        {{ session('error') }}
      </div>
      @endif

<!-- Content Row -->

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Layanan</h6>

            <div class="text-right">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalTambah">
                  Tambah Data
              </button>

          </div>

      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="chart-area">
         <div class="table-responsive">
            <table id="dataTable" class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Judul Layanan</th>
                  <th scope="col">Deskripsi Layanan</th>
                  
                  <th scope="col">Aksi</th>
                  <th style="display: none;">hidden</th>
              </tr>
          </thead>
          <tbody>
            @php $no=1 @endphp
            @foreach($layanan as $data)
            <tr>
              <td>{{$no++}}</td>
              <td>{{$data->judul}}</td>
              <td>{{$data->deskripsi}}</td>
              <td>
               <button class="btn btn-info btn-sm fa fa-edit edit" data-toggle="modal" data-target="#updateModal" title="Edit"></button>
               <a href="#" data-toggle="modal" onclick="deleteData({{$data->id}})" data-target="#DeleteModal">
                <button class="fa fa-trash btn-danger btn-sm " title="Hapus"></button>
              </a>
            </td>
            <td style="display: none;">{{$data->id}}</td>
           </tr>
           @endforeach

      </tbody>
  </table>
</div>
</div>
</div>
</div>
</div>
</div>


<!-- modal -->
<div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Layanan</h5>
        
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('admin_layanan_add')}}" enctype="multipart/form-data">

          {{csrf_field()}}
          <div class="form-group">
            <label for="judul">Judul Layanan</label>
            <input type="text" class="form-control" id="judul" name="judul" required="" />
          </div>


          <div class="form-group">
            <label for="deskripsi">Deskripsi Layanan</label>
            <input type="text" class="form-control" id="deskripsi" name="deskripsi" required="" />
          </div>

         

         
          <button class="btn btn-primary" type="Submit">Simpan</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>

      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <div class="modal-body text-center">
        <img src="" id="img01" style="width: 450px; height: auto;" >
      </div>
    </div>
  </div>
</div>






  <div id="updateModal" class="modal fade" role="dialog">
    <div class="modal-dialog ">
      <!--Modal content-->
      <form action="" id="updateModalform" method="post" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Anda yakin ingin memperbarui Data ini ?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            {{ csrf_field() }}
            {{ method_field('POST') }}

            <div class="form-group">
              <label for="judul">Judul Layanan</label>
              <input type="text" class="form-control" id="judul_update" name="judul" required="" />
            </div>


            <div class="form-group">
              <label for="deskripsi">Deskripsi Layanan</label>
              <input type="text" class="form-control" id="deskripsi_update" name="deskripsi" required="" />
            </div>

           
            <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary float-right mr-2">Perbarui</button>
          </div>
        </div>
      </form>
    </div>
  </div>


<div id="DeleteModal" class="modal fade" role="dialog">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <form action="" id="deleteForm" method="post">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus data ini?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}
                    <p>Apakah anda yakin ingin Menghapus data ini ?</p>
                    <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Batal</button>
                    <button type="submit" name="" class="btn btn-danger float-right mr-2" data-dismiss="modal" onclick="formSubmit()">Hapus</button>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection

@section('js')
<script type="text/javascript">
  function deleteData(id) {
    var id = id;
    var url = '{{route("admin_layanan_delete", ":id") }}';
    url = url.replace(':id', id);
    $("#deleteForm").attr('action', url);
  }

  function formSubmit() {
    $("#deleteForm").submit();
  }
</script>


<script>
  $(document).ready(function() {
    var table = $('#dataTable').DataTable();
    table.on('click', '.edit', function() {
      $tr = $(this).closest('tr');
      if ($($tr).hasClass('child')) {
        $tr = $tr.prev('.parent');
      }
      var data = table.row($tr).data();
      console.log(data);
      $('#judul_update').val(data[1]);
      $('#deskripsi_update').val(data[2]);
      $('#updateModalform').attr('action','admin_layanan_update/'+ data[4]);
      $('#updateModal').modal('show');
    });
  });
</script>
@endsection