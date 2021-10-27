@extends('layouts.adm') 
@section('content')

<link href="{{ URL::asset('adm/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
@if (Auth::User()->level_id=='1')

<h1 class="h3 mb-2 text-gray-800">Pertemuan <a href="{{ url('pertemuan/create') }}" class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#add">Tambah Pertemuan</a>
</h1>
@else 
@endif
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    @if (Auth::User()->level_id=='2')

    <h6 class="m-0 font-weight-bold text-primary">Pertemuan     <a class="btn btn-sm btn-primary" type="submit" href="rekap/{{Auth::User()->id}}">Rekap </a>
    </h6>
    @else 
    <h6 class="m-0 font-weight-bold text-primary">Pertemuan </h6>

@endif
  </div>
  <div class="card-body">
    @if (Auth::User()->level_id=='1')

    @if(count($errors) > 0)
    <div class="alert alert-danger">
      @foreach ($errors->all() as $error)
      {{ $error }} <br/>
      @endforeach
    </div>
    @endif

    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

        <thead style="">
          <tr>
            <th>Nama</th>
            <th>Dokumen</th>
            <th>Video</th>
            <th>Action</th>

          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Nama</th>
            <th>Dokumen</th>
            <th>Video</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody>
         
       @foreach($data as $key => $items)
             <td>{{ $items->meetingname->name }} </td>
             <td>
              <a href="{{ url('data_file') }}/{{ $items->doc }}"
              download="{{ $items->doc }}">
              <button type="button" class="btn btn-primary">
               <i class="glyphicon glyphicon-download">
                Download
                </i>
              </button>
              </a>
              </td>
              <td>
                <a href="{{ url('data_file') }}/{{ $items->file }}"
                download="{{ $items->file }}">
                <button type="button" class="btn btn-primary">
                 <i class="glyphicon glyphicon-download">
                  Download
                  </i>
                </button>
                </a>
                </td>
                <td>
                <form action="{{ route('pertemuan.destroy', $items->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    {{-- <a href="{{ route('pertemuan.show',$items->id) }}">Show</a> --}}
                    <a class="btn btn-sm btn-primary" type="submit" href="detail/{{$items->id}}"><i class="fas fa-eye"></i> Lihat Detail</a>
                    <button type="button" onclick="showEdit({{$items->id}})" class="btn btn-sm btn-success" >Edit</a>
                   
                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                </form>
                </td>
            </tr>
            
            @endforeach
        </tbody>
    </table>
  </div>
  @else
  @if(count($errors) > 0)
  <div class="alert alert-danger">
    @foreach ($errors->all() as $error)
    {{ $error }} <br/>
    @endforeach
  </div>
  @endif

  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

      <thead style="">
        <tr>
          <th>Nama</th>
          <th>Dokumen</th>
          <th>Video</th>
          <th>Action</th>

        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>Nama</th>
          <th>Dokumen</th>
          <th>Video</th>
          <th>Action</th>
        </tr>
      </tfoot>
      <tbody>
       
     @foreach($students as $key => $items)
            <td>{{ $items->meetingname->name }} </td>
            <td>
            <a href="{{ url('data_file') }}/{{ $items->doc }}"
            download="{{ $items->doc }}">
            <button type="button" class="btn btn-primary">
             <i class="glyphicon glyphicon-download">
              Download
              </i>
            </button>
            </a>
            </td>
            <td>
              <a href="{{ url('data_file') }}/{{ $items->file }}"
              download="{{ $items->file }}">
              <button type="button" class="btn btn-primary">
               <i class="glyphicon glyphicon-download">
                Download
                </i>
              </button>
              </a>
              </td>
           
            <td>
              <form action="{{ route('pertemuan.destroy', $items->id) }}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  {{-- <a href="{{ route('pertemuan.show',$items->id) }}">Show</a> --}}
                  <a class="btn btn-sm btn-primary" type="submit" href="detail/{{$items->id}}"><i class="fas fa-eye"></i> Lihat Detail</a>
              </form>
              </td>
          </tr>
          
          @endforeach
      </tbody>
  </table>
</div>
@endif
    		</div>
    	</div>
    </section>
</main>

<!-- Add -->
<div  class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" >
    <div class="modal-content" style="border:1px solid black;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="upload-image-form" class="form-horizontal" action="{{ route('pertemuan.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-body">
        
          
          <div class="form-group row"><label class="col-lg-3 form-control-label">Kelas</label>



            <div class="col-lg-9">
            <select name="class_id" id="class_id" class="form-control{{ $errors->has('class_id') ? ' is-invalid' : '' }}">
                <option value="0">-- Pilih Kelas --</option>
                @foreach($kelas as $class)
                <option value="{{ $class->id }}"> {{ $class->name }}</option>
                @endforeach
               
              </select>

              @if ($errors->has('class_id'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('class_id') }}</strong>
                  </span>
              @endif
            </div>
        </div> 

          <div class="form-group row"><label class="col-lg-3 form-control-label">Pertemuan</label>

            <div class="col-lg-9">
            <select name="meetingname_id" id="meetingname" class="form-control select" required>
            <option value="0">-- Pilih Pertemuan --</option>
            @foreach($pertemuans as $pertemuan)
            <option value="{{ $pertemuan->id }}"> {{ $pertemuan->name }}</option>
          @endforeach
            
            </select>
            </div>
            </div>

           

          <div class="form-group row"><label class="col-lg-3 form-control-label">Deskripsi</label>

            <div class="col-lg-9">
            <textarea  name="description" placeholder="Deskripsi" class="form-control" > </textarea>
            </div>
          </div>
          <div class="form-group row"><label class="col-lg-3 form-control-label">Dokumen </label>
            <div class="col-lg-9">
              <input type="file" name="doc">
            </div>
          </div>
          <div class="form-group row"><label class="col-lg-3 form-control-label">Video </label>
            <div class="col-lg-9">
              <input type="file" name="file">
            </div>
          </div>
          <p>

<div class="row">
  <div class="col">
    <div>
        <div class="form-group row"><label class="col-lg-3 form-control-label">Nama Tugas</label>

          <div class="col-lg-9">
          <input type="text" name="assignment" placeholder="Nama Tugas" class="form-control"> 
          </div>
        </div>

        <div class="form-group row"><label class="col-lg-3 form-control-label">Deskripsi</label>

          <div class="col-lg-9">
          <textarea  name="desc" placeholder="Deskripsi tugas" class="form-control" > </textarea>
          </div>
        </div>


      
      <div class="form-group row"><label class="col-lg-3 form-control-label">Deadline</label>

          <div class="col-lg-9">
          <input type="datetime-local" name="deadline" placeholder="tanggal" class="form-control" > 
          </div>
        </div>

      </div>
    </div>
  </div>
 
        </div>
       
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-default" style="border:1px solid black;">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div  class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" >
    <div class="modal-content" style="border:1px solid black;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-edit" class="form-horizontal" method="post" enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
        <input type="hidden" name="id" >
        <div class="modal-body">
          
       


          
          <div class="form-group row"><label class="col-lg-3 form-control-label">Pertemuan</label>
            <div class="col-lg-9">
              <select name="meetingname_id" id="meetingname" class="form-control select" required>
              <option value="0">-- Pilih Pertemuan --</option>
              @foreach($pertemuanss as $pertemuan)
              <option value="{{ $pertemuan->id }}"> {{ $pertemuan->name }}</option>
               @endforeach
              </select>
              </div>
              </div>
              <div class="form-group row"><label class="col-lg-3 form-control-label">Deskripsi</label>
                <div class="col-lg-9">
                  <input type="text" name="description" placeholder="Deskripsi" class="form-control"> 
                </div>
              </div>
              <div class="form-group row"><label class="col-lg-3 form-control-label">Kelas</label>

                
          <div class="col-lg-9">
            <select name="class_id" id="class_id" class="form-control select" required>
              <option>-- Pilih Kelas --</option>

              @foreach($kelas as $class)
                <option value="{{ $class->id }}"> {{ $class->name }}</option>
              @endforeach
            </select>

            @if ($errors->has('class_id'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('class_id') }}</strong>
                </span>
            @endif
            </select>
            </div>
            </div>
            <div class="form-group row"><label class="col-lg-3 form-control-label">Dokumen</label>
              <div class="col-lg-9">
                <input type="file" name="docs" ><br/>
                File sebelumnya: <span id="current_filez"></span>
              </div>
            </div>
            <div class="form-group row"><label class="col-lg-3 form-control-label">Video</label>
              <div class="col-lg-9">
                <input type="file" name="files" ><br/>
                File sebelumnya: <span id="current_file"></span>
              </div>
            </div>


<div class="row">
  <div class="col">
    <div >
      <div class="card card-body">

            <div class="form-group row"><label class="col-lg-3 form-control-label">Tugas</label>
              <div class="col-lg-9">
                <input type="text" name="assignment" placeholder="Tugas" class="form-control"> 
              </div>
            </div>
            <div class="form-group row"><label class="col-lg-3 form-control-label">Deskripsi</label>
              <div class="col-lg-9">
                <input type="text" name="desc" placeholder="Deskripsi" class="form-control"> 
              </div>
            </div>
            <div class="form-group row"><label class="col-lg-3 form-control-label">Deadline</label>
              <div class="col-lg-9">
                <input type="datetime-local" name="deadline" placeholder="tanggal" class="form-control"> 
              </div>
            </div>
         
          <input type="hidden" name="file" class="form-control"> 
          <input type="hidden" name="doc" class="form-control"> 

          </div>
        </div>
      </div>
      </div>
        </div>
        <div class="modal-footer">
          <button type="button" style="border:1px solid black;" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" style="border:1px solid black;" class="btn btn-default">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div>
             <label>Name : </label>
             <input type="text" class="form-control">
        </div>
        
        <div>
             <label>Description : </label>
             <textarea class="form-control"></textarea>
        </div>
        
        <div>
             <label>Unit : </label>
             <input type="text" class="form-control">
        </div>
        
        <div>
             <label>Qty : </label>
             <input type="number" class="form-control">
        </div>
        
        <div>
             <label>From : </label>
             <input type="text" class="form-control">
        </div>
        
        <div>
             <label>Photos : </label>
             <input type="file" class="form-control">
        </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection

<script>
  $(document).ready(function() {
      $('#example').DataTable();
      $('#myModal').on('shown.bs.modal', function () {
          $('#myInput').trigger('focus')
      });
      
  } );
  function showEdit(id){
    $.ajax({
      url:"{{url('pertemuan')}}/"+id+"/edit",
      success:function(res){
        $("#form-edit [name='id']").val(id);
        $("#form-edit [name='meetingname_id']").val(res.data.meetingname_id);
        $("#form-edit [name='class_id']").val(res.data.class_id);
        $("#form-edit [name='assignment']").val(res.data.assignment);
        $("#form-edit [name='desc']").val(res.data.desc);
        $("#form-edit [name='description']").val(res.data.description);
        $("#form-edit [name='deadline']").val(res.data.deadline);
        $("#form-edit [name='doc']").val(res.data.doc);
        $("#current_filez").html(res.data.doc);
        $("#form-edit [name='file']").val(res.data.file);
        $("#current_file").html(res.data.file);
        $('#form-edit').attr('action',"./pertemuan/"+id);
        $("#edit").modal('show');
      }
    })
  }
  $(document).ready(function() {
       var span = 1;
       var prevTD = "";
       var prevTDVal = "";
       $("#myTable tr td:first-child").each(function() { //for each first td in every tr
          var $this = $(this);
          if ($this.text() == prevTDVal) { // check value of previous td text
             span++;
             if (prevTD != "") {
                prevTD.attr("rowspan", span); // add attribute to previous td
                $this.remove(); // remove current td
             }
          } else {
             prevTD     = $this; // store current td 
             prevTDVal  = $this.text();
             span       = 1;
          }
       });
    });
</script>


