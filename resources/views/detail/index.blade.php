@extends('layouts.adm') 
@section('content')

<link href="{{ URL::asset('adm/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<!-- <h1 class="h3 mb-2 text-gray-800">Pertemuan <a href="{{ url('pertemuan/create') }}" class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#add">Tambah Pertemuan</a> -->
</h1>
<!-- DataTales Example -->
<div class="card" style="background-color:f8f9fc;border-color:f8f9fc;">
  

    @if(count($errors) > 0)
    <div class="alert alert-danger">
      @foreach ($errors->all() as $error)
      {{ $error }} <br/>
      @endforeach
    </div>
    @endif

   <svg display="none" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<defs>
<symbol id="icon-bubble" viewBox="0 0 1024 1024">
  <title>bubble</title>
  <path class="path1" d="M512 224c8.832 0 16 7.168 16 16s-7.2 16-16 16c-170.464 0-320 89.728-320 192 0 8.832-7.168 16-16 16s-16-7.168-16-16c0-121.408 161.184-224 352-224zM512 64c-282.784 0-512 171.936-512 384 0 132.064 88.928 248.512 224.256 317.632 0 0.864-0.256 1.44-0.256 2.368 0 57.376-42.848 119.136-61.696 151.552 0.032 0 0.064 0 0.064 0-1.504 3.52-2.368 7.392-2.368 11.456 0 16 12.96 28.992 28.992 28.992 3.008 0 8.288-0.8 8.16-0.448 100-16.384 194.208-108.256 216.096-134.88 31.968 4.704 64.928 7.328 98.752 7.328 282.72 0 512-171.936 512-384s-229.248-384-512-384zM512 768c-29.344 0-59.456-2.24-89.472-6.624-3.104-0.512-6.208-0.672-9.28-0.672-19.008 0-37.216 8.448-49.472 23.36-13.696 16.672-52.672 53.888-98.72 81.248 12.48-28.64 22.24-60.736 22.912-93.824 0.192-2.048 0.288-4.128 0.288-5.888 0-24.064-13.472-46.048-34.88-56.992-118.592-60.544-189.376-157.984-189.376-260.608 0-176.448 200.96-320 448-320 246.976 0 448 143.552 448 320s-200.992 320-448 320z"></path>
</symbol>
<symbol id="icon-star" viewBox="0 0 1024 1024">
  <title>star</title>
  <path class="path1" d="M1020.192 401.824c-8.864-25.568-31.616-44.288-59.008-48.352l-266.432-39.616-115.808-240.448c-12.192-25.248-38.272-41.408-66.944-41.408s-54.752 16.16-66.944 41.408l-115.808 240.448-266.464 39.616c-27.36 4.064-50.112 22.784-58.944 48.352-8.8 25.632-2.144 53.856 17.184 73.12l195.264 194.944-45.28 270.432c-4.608 27.232 7.2 54.56 30.336 70.496 12.704 8.736 27.648 13.184 42.592 13.184 12.288 0 24.608-3.008 35.776-8.992l232.288-125.056 232.32 125.056c11.168 5.984 23.488 8.992 35.744 8.992 14.944 0 29.888-4.448 42.624-13.184 23.136-15.936 34.88-43.264 30.304-70.496l-45.312-270.432 195.328-194.944c19.296-19.296 25.92-47.52 17.184-73.12zM754.816 619.616c-16.384 16.32-23.808 39.328-20.064 61.888l45.312 270.432-232.32-124.992c-11.136-6.016-23.424-8.992-35.776-8.992-12.288 0-24.608 3.008-35.744 8.992l-232.32 124.992 45.312-270.432c3.776-22.56-3.648-45.568-20.032-61.888l-195.264-194.944 266.432-39.68c24.352-3.616 45.312-18.848 55.776-40.576l115.872-240.384 115.84 240.416c10.496 21.728 31.424 36.928 55.744 40.576l266.496 39.68-195.264 194.912z"></path>
</symbol>
</defs>
</svg>

<div class="blog-container">
  
  <div class="blog-header">
    <div class="blog-cover">
      <div class="blog-author">
        <h3>E-Learning</h3>
        <ol class="breadcrumb float-left float-md-right">
          <li class="breadcrumb-item"><a href="{{ url()->previous() }}">BACK <i class="fa fa-arrow-left"></i></a></li>
      
      </ol>
      </div>
    </div>
  </div>

  <div class="blog-body">
    <div class="blog-title">
      <h1><a href="#">{{$data->name}} </a></h1>
    </div>
    <div class="blog-summary">
      <p>Waktu pertemuan: {{$data->created_at->format('Y-m-d')}}</p>
      <p>Deskripsi : {{$data->description}}</p>
    </div>
  <div class="blog-body">

       @if ($mime == "mp4" || $mime == "mkv" || $mime == "avi" || $mime == "mov" || $mime == "flv")
      <video class="video-body" controls poster="https://internet-flash.net/wp-content/uploads/2018/03/5bbc49ebe02ba5bd1dcfa428e8cf610f.gif" id="bgvid">
        <source src="{{URL::asset("/data_file/$data->file")}}" type="video/mp4">
      </video>
<hr>

@else
@endif
</div>
    <div class="blog-tags">
      <ul>
        @if ($mime == "mp4" || $mime == "mkv" || $mime == "avi" || $mime == "mov" || $mime == "flv")

        <li><a href="{{ url('data_file') }}/{{ $data->file }}"
              download="{{ $data->file }}">
             
               <i class="glyphicon glyphicon-download">
                Download Video
                </i>
              
              </a></li>
        @else
        <li><a href="{{ url('data_file') }}/{{ $data->file }}"
              download="{{ $data->file }}">
             
               <i class="glyphicon glyphicon-download">
                Download File
                </i>
             
              </a></li>
              
        @endif
      </ul>
    </div>
  </div>
  
  <div class="blog-footer">
    <ul>
      
    </ul>
  </div>

</div>
@if (Auth::User()->level_id=='1')
@if($data->assignment === null)
@else
<div class="blog-container">
  
  <div class="blog-header">
      <div class="blog-author">
        <h3>E-Learning</h3>
      </div>
  </div>

  <div class="blog-body">
    <div class="blog-title">
      <h1><a href="#">Kehadiran</a></h1>
    </div>
    <div class="blog-summary">
     
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  
          <thead style="">
            <tr>
              <th>Nama</th>
              <th>Kelas</th>
              <th>Status</th>
  
            </tr>
          </thead>
          
          <tbody>
           
         @foreach($kehadiran as $key => $items)
                <td>{{ $items->user->name }} </td>
                <td>{{$items->user->class->name}}</td>
                @if($items->status == 0)
                <td>
                  
                  <button type="button" class="btn btn-danger">
                   <i class="glyphicon glyphicon-download">
                    Tidak Hadir
                    </i>
                  </button>
             
                  </td>

                @else
                <td>
                  
                  <button type="button" class="btn btn-success">
                   <i class="glyphicon glyphicon-download">
                    Hadir
                    </i>
                  </button>
             
                  </td>
              
               
                  @endif

               

               
              </tr>
              
              @endforeach
          </tbody>
      </table>
    </div>
    </div>
  <div class="blog-body">
    
       
</div>
    <div class="blog-tags">
      <ul>

        <li></li>
      </ul>
    </div>
  </div>
  
  <div class="blog-footer">
    <ul>
      
    </ul>
  </div>

</div>
<div class="blog-container">
  
  <div class="blog-header">
      <div class="blog-author">
        <h3>E-Learning</h3>
      </div>
  </div>

  <div class="blog-body">
    <div class="blog-title">
      <h1><a href="#">{{$data->assignment}}</a></h1>
    </div>
    <div class="blog-summary">
      <p>{{$data->desc}}</p>
     
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTablee" width="100%" cellspacing="0">
  
          <thead style="">
            <tr>
              <th>Nama</th>
              <th>Kelas</th>
              <th>Status</th>
              <th>File</th>
  
            </tr>
          </thead>
          
          <tbody>
           
         @foreach($tugas as $key => $items)
                <td>{{ $items->user->name }} </td>
                <td>{{$items->user->class->name}}</td>
                @if($items->status == 0)
                <td>
                  
                  <button type="button" class="btn btn-primary">
                   <i class="glyphicon glyphicon-download">
                    Belum Input
                    </i>
                  </button>
             
                  </td>

                @elseif($items->status == 1)
                <td>
                  
                  <button type="button" class="btn btn-success">
                   <i class="glyphicon glyphicon-download">
                    Tepat Waktu
                    </i>
                  </button>
             
                  </td>
              
                @else
                <td>
                  
                  <button type="button" class="btn btn-danger">
                   <i class="glyphicon glyphicon-download">
                    Terlambat
                    </i>
                  </button>
             
                  </td>
                  @endif

                @if($items->file == null)
                <td> - </td>
                @else
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
                @endif

               
              </tr>
              
              @endforeach
          </tbody>
      </table>
    </div>
    </div>
  <div class="blog-body">
    
       
</div>
    <div class="blog-tags">
      <ul>

        <li></li>
      </ul>
    </div>
  </div>
  
  <div class="blog-footer">
    <ul>
      
    </ul>
  </div>

</div>
@endif
@else
@if($data->assignment === null)
@else
<div class="blog-container">
  
  <div class="blog-header">
      <div class="blog-author">
        <h3>E-Learning</h3>
      </div>
  </div>

  <div class="blog-body">
    <div class="blog-title">
      <h1><a href="#">Kehadiran</a></h1>
    </div>
    <div class="blog-summary">
      <p style="color:red">Waktu terakhir absen : {{$data->tommorow}}</p>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  
          <thead style="">
            <tr>
              <th>Nama</th>
              <th>Kelas</th>
              <th>Status</th>
  
            </tr>
          </thead>
          
          <tbody>
            <?php
            date_default_timezone_set("Asia/Makassar");
            $ffdate = date("Y-m-d h:i:sa");
            $ttdate = $data->tommorow;
           
            $datetime1 = new DateTime($ffdate);
            $datetime2 = new DateTime($ttdate);
            $absen = $datetime2->getTimestamp() - $datetime1->getTimestamp();
            
          
            ?>
         @foreach($kehadiran as $key => $items)
                <td>{{ $items->user->name }} </td>
                <td>{{$items->user->class->name}}</td>
                @if($items->status == 0 and $items->user_id == Auth::User()->id and $absen > 0)
                <td>
                  
                  <div class="btn-group">
                    {{-- <a href="editrequesta/{{ $row->id }}" type="button" class="btn btn-default"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> --}}
                    <a style="color:white!important" href="kehadiran/{{ $items->id }}" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Isi Kehadiran</a>
                  </div>
             
                  </td>
                @elseif($items->status == 0 and $items->user_id == Auth::User()->id and $absen < 0)
                <td>
                  
                  <button type="button" class="btn btn-danger">
                   <i class="glyphicon glyphicon-download">
                    Tidak Hadir
                    </i>
                  </button>
             
                  </td>
                @elseif($items->status == 0 )
                <td>
                  
                  <button type="button" class="btn btn-danger">
                   <i class="glyphicon glyphicon-download">
                    Tidak Hadir
                    </i>
                  </button>
             
                  </td>
                @else
                <td>
                  
                  <button type="button" class="btn btn-success">
                   <i class="glyphicon glyphicon-download">
                    Hadir
                    </i>
                  </button>
             
                  </td>
              
               
                  @endif

               

               
              </tr>
              
              @endforeach
          </tbody>
      </table>
    </div>
    </div>
    
       
</div>
    <div class="blog-tags">
      <ul>

        <li></li>
      </ul>
    </div>
  </div>
  
 
  
<div class="blog-container">
  
  <div class="blog-header">
      <div class="blog-author">
        <h3>E-Learning</h3>
      </div>
  </div>

  <div class="blog-body">
    <div class="blog-title">
      <h1><a href="#">{{$data->assignment}}</a></h1>
    </div>
    <div class="blog-summary">
      <p>{{$data->desc}}</p>
      <p style="color:red">Waktu terakhir upload tugas : {{$data->deadline}}</p>

      <?php
      date_default_timezone_set("Asia/Makassar");
      $fdate = date("Y-m-d h:i:sa");
      $tdate = $data->deadline;
     
      $datetime1 = new DateTime($fdate);
      $datetime2 = new DateTime($tdate);
      $diff = $datetime2->getTimestamp() - $datetime1->getTimestamp();
      
    
      ?>

      @if($selesai->status == 0 and $diff < 0)
      <div class="centerx">
        <a style="color:white" href="" class="btn btn-lg btn-info"  data-toggle="modal" data-target="#addlate">UPLOAD TUGAS</a>
        </div>
      <div id="clockdiv" style="width:100%;height:230px;background-color:white;padding:70px;font-size:70px">

        <div><span id="day"></span><div class="smalltext">Hari</div></div>
        <div><span id="hour"></span><div class="smalltext">Jam</div></div>
        <div><span id="minute"></span><div class="smalltext">Menit</div></div>
        <div><span id="second"></span><div class="smalltext">Detik</div></div>
      </div>
      @elseif($selesai->status == 0 and $diff > 0)
      <div class="centerx">
      <a style="color:white" href="" class="btn btn-lg btn-info"  data-toggle="modal" data-target="#add">UPLOAD TUGAS</a>
      </div>

      <div id="clockdiv" style="width:100%;height:230px;background-color:white;padding:70px;font-size:70px">

        <div><span id="day"></span><div class="smalltext">Hari</div></div>
        <div><span id="hour"></span><div class="smalltext">Jam</div></div>
        <div><span id="minute"></span><div class="smalltext">Menit</div></div>
        <div><span id="second"></span><div class="smalltext">Detik</div></div>
      </div>
      @elseif($selesai->status == 1 or  $selesai->status == 2)
      <div class="centerx">
        <a style="color:white"  class="btn btn-lg btn-info" >TUGAS SELESAI</a>
        </div>
     
        @endif
     
      
      

    </div>
  <div class="blog-body">
    
       
</div>
    <div class="blog-tags">
      <ul>

        <li></li>
      </ul>
    </div>
  </div>
  
  <div class="blog-footer">
    <ul>
      
    </ul>
  </div>

</div>

@endif
@endif



<script type="text/javascript" src="//use.typekit.net/wtt0gtr.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

    
  
  </div>
    		
    </section>
</main>

<!-- Add -->
<div  class="modal fade" id="addlate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" >
    <div class="modal-content" style="border:1px solid black;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Tugas Terlambat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="upload-image-form" class="form-horizontal" action=""  method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-body">
           
         
          <input type="hidden" name="status" value="2" class="form-control"> 


          <div class="form-group row"><label class="col-lg-3 form-control-label">File Pembelajaran </label>
            <div class="col-lg-9">
              <input type="file" name="file">
            </div>
          </div>
          <p>
  
 
        </div>
       
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" onclick="return confirm('Apakah data sudah benar?');" class="btn btn-default" style="border:1px solid black;">Save changes</button>

        </div>
      </form>
    </div>
  </div>
</div>

<div  class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" >
    <div class="modal-content" style="border:1px solid black;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Tugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="upload-image-form" class="form-horizontal" action=""  method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-body">

      
          <input type="hidden" name="status" value="1" class="form-control"> 


          <div class="form-group row"><label class="col-lg-3 form-control-label">File </label>
            <div class="col-lg-9">
              <input type="file" name="file">
            </div>
          </div>
          <p>
  
 
        </div>
       
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" onclick="return confirm('Apakah data sudah benar?');" class="btn btn-default" style="border:1px solid black;">Save changes</button>

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
          
       


          <div class="form-group row"><label class="col-lg-2 form-control-label">Date</label>
            <div class="col-lg-10">
              <input type="date" name="tanggal" placeholder="tanggal" class="form-control" required> 
            </div>
          </div>
          <div class="form-group row"><label class="col-lg-2 form-control-label">Keterangan</label>
            <div class="col-lg-10">
              <input type="text" name="name" placeholder="Keterangan" class="form-control" required> 
            </div>
          </div>
          <div class="form-group row"><label class="col-lg-2 form-control-label">Debit</label>
            <div class="col-lg-10">
              <input type="text" name="debit" placeholder="Debit" class="form-control" required> 
            </div>
          </div>
          <div class="form-group row"><label class="col-lg-2 form-control-label">Credit</label>
            <div class="col-lg-10">
              <input type="text" name="credit" placeholder="Credit" class="form-control" required> 
            </div>
          </div>
          <div class="form-group row"><label class="col-lg-2 form-control-label">Balance</label>
            <div class="col-lg-10">
              <input type="text" name="balance" placeholder="Balance" class="form-control" required> 
            </div>
          </div>
                    <div class="form-group row"><label class="col-lg-2 form-control-label">Sumber</label>

          <div class="col-lg-10">
            <select name="source" id="source" class="form-control select" required>
            <option value="0">-- PILIH --</option>
            <option value="1">Pribadi</option>
            <option value="2">Non-Pribadi</option>
            </select>
            </div>
            </div>

          <div class="form-group row"><label class="col-lg-2 form-control-label">Pictures</label>
            <div class="col-lg-8">
              <input type="file" name="image"><br/>
              Current Images: <span id="current_pic"></span>
            </div>
          </div>
          <input type="hidden" name="pic" placeholder="Prices" class="form-control" required> 
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
        $("#form-edit [name='name']").val(res.data.name);
        $("#form-edit [name='tanggal']").val(res.data.tanggal);
        $("#form-edit [name='debit']").val(res.data.debit);
        $("#form-edit [name='credit']").val(res.data.credit);
        $("#form-edit [name='balance']").val(res.data.balance);
        $("#form-edit [name='pic']").val(res.data.pic);
        $("#current_pic").html(res.data.pic);
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
<script type="text/javascript">

        // Set the date we're counting down to
        var countDownDate = new Date("{{$data->deadline}}").getTime();
        
        // Update the count down every 1 second
        var x = setInterval(function() {
        
          // Get today's date and time
          var now = new Date().getTime();
            
          // Find the distance between now and the count down date
          var distance = countDownDate - now;
            
          // Time calculations for days, hours, minutes and seconds
          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
          // Output the result in an element with id="countdown"
          document.getElementById("day").innerHTML = days ;
          document.getElementById("hour").innerHTML = hours ;
          document.getElementById("minute").innerHTML = minutes ;
          document.getElementById("second").innerHTML = seconds ;
            
          // If the count down is over, write some text 
          if (distance < 0) {
            clearInterval(x);
            document.getElementById("day").innerHTML = "0" ;
            document.getElementById("hour").innerHTML = "0" ;
            document.getElementById("minute").innerHTML = "0" ;
            document.getElementById("second").innerHTML = "0" ;
          }
        }, 1);
      
  </script>

<style>
body {
   background: #e5ded8;
   box-sizing: border-box;
}
 .blog-container {
   background: #fff;
   border-radius: 5px;
   box-shadow: rgba(0, 0, 0, .2) 0 4px 2px -2px;
   font-family: "adelle-sans", sans-serif;
   font-weight: 100;
   margin: 10px auto;
   width: 75%;
}
 
 .blog-container a {
   color: #4d4dff;
   text-decoration: none;
   transition: 0.25s ease;
}
 .blog-container a:hover {
   border-color: #ff4d4d;
   color: #ff4d4d;
}
 .blog-cover {
   background: url("https://i.ibb.co/J7BGKgk/blue.jpg");
   background-size: cover;
   border-radius: 5px 5px 0 0;
   height: 15rem;
   box-shadow: inset rgba(0, 0, 0, .2) 0 64px 64px 16px;
}
 .blog-author, .blog-author--no-cover {
   margin: 0 auto;
   padding-top: 0.125rem;
   width: 80%;
}
 .blog-author h3::before, .blog-author--no-cover h3::before {
    margin: 0 auto;
   padding-top: 0.125rem;
   width: 80%;
}
 .blog-author h3 {
   color: #fff;
   font-weight: 100;
}
 .blog-author--no-cover h3 {
   color: #999;
   font-weight: 100;
}
 .blog-body {
   margin: 0 auto;
   width: 80%;
}
 .video-body {
   height: 100%;
   width: 100%;
}
 .blog-title h1 a {
   color: #333;
   font-weight: 100;
}
 .blog-summary p {
   color: #4d4d4d;
}
 .blog-tags ul {
   display: flex;
   flex-direction: row;
   flex-wrap: wrap;
   list-style: none;
   padding-left: 0;
}
 .blog-tags li + li {
   margin-left: 0.5rem;
}
 .blog-tags a {
   border: 1px solid #999;
   border-radius: 3px;
   color: blue;
   font-size: 0.75rem;
   height: 1.5rem;
   line-height: 1.5rem;
   letter-spacing: 1px;
   padding: 0 0.5rem;
   text-align: center;
   text-transform: uppercase;
   white-space: nowrap;
   width: 5rem;
}
 .blog-footer {
   border-top: 1px solid #e6e6e6;
   margin: 0 auto;
   padding-bottom: 0.125rem;
   width: 80%;
}
 .blog-footer ul {
   list-style: none;
   display: flex;
   flex: row wrap;
   justify-content: flex-end;
   padding-left: 0;
}
 .blog-footer li:first-child {
   margin-right: auto;
}
 .blog-footer li + li {
   margin-left: 0.5rem;
}
 .blog-footer li {
   color: #999;
   font-size: 0.75rem;
   height: 1.5rem;
   letter-spacing: 1px;
   line-height: 1.5rem;
   text-align: center;
   text-transform: uppercase;
   position: relative;
   white-space: nowrap;
}
 .blog-footer li a {
   color: #999;
}
 .comments {
   margin-right: 1rem;
}
 .published-date {
   border: 1px solid #999;
   border-radius: 3px;
   padding: 0 0.5rem;
}
 .numero {
   position: relative;
   top: -0.5rem;
}
 .icon-star, .icon-bubble {
   fill: #999;
   height: 24px;
   margin-right: 0.5rem;
   transition: 0.25s ease;
   width: 24px;
}
 .icon-star:hover, .icon-bubble:hover {
   fill: #ff4d4d;
}

.link{
  margin-top: 40px;
}

/* a{
  display: inline-block;
  color: #fff;
  font-size: 20px;
  padding: 20px;
  background: #265;
  border-radius: 10px;
  text-decoration: none;
}

a:hover{
  background: #487;
} */
.centerx {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 50px;
}
#clockdiv{
	font-family: sans-serif;
	color: #fff;
	display: inline-block;
	font-weight: 100;
	text-align: center;
	font-size: 30px;
}


#clockdiv > div{
	padding: 10px;
	border-radius: 3px;
	background: #74b9ff;
	display: inline-block;
  font-size: 40px;

}

#clockdiv div > span{
	padding: 10px;
	border-radius: 3px;
	background: #0984e3;
	display: inline-block;

}

.smalltext{
	padding-top: 5px;
	font-size: 16px;
}

</style>