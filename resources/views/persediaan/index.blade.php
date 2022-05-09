@extends('layouts.adm')
@section('content')

    <link href="{{ URL::asset('adm/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
       

            <h1 class="h3 mb-2 text-gray-800">Persediaan <a href="{{ url('persediaan/create') }}" class="btn btn-sm btn-primary"
                    data-toggle="modal" data-target="#adds">Tambah List Barang</a>
                    {{-- <a href="/products/createe-pdf" class="btn btn-sm btn-success"
                    >Export PDF</a> --}}
                    <a href="{{ url('persediaans/export_excel') }}" class="btn btn-sm btn-success"  >Export Excel</a>
            </h1>
            

            
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Persediaan</h6>
            </div>
            <div class="card-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }} <br />
                            @endforeach
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <thead style="color:red">
                                <tr>
                                    <th>Tipe</th>
                                    <th>Nama</th>
                                    <th>Max</th>
                                    @foreach($barangmasuk as $key =>$items)
                                        <th  style="background-color:green;color:white" >{{$items->tanggal}}</th>
                                    @endforeach
                                    @foreach($barangkeluar as $key =>$items)
                                        <th style="background-color:red;color:white" >{{$items->tanggal}}</th>
                                    @endforeach
                                    <th>Jumlah</th>
                                    <th>Satuan</th>
                                    <th>Harga</th>
                                    <th>Action</th>
                                </tr>  
                            </thead>

                            <tbody style="color:black">

                                @foreach ($data as $key => $items)
                                    <tr>
                                        @if ($items->tipe == 1)
                                        <td>Alat Tulis Kantor</td>
                                        @else
                                        <td>Alat Kebersihan</td>
                                        @endif
                                
                                        <td>{{ $items->nama }}</td>
                                        <td>{{ $items->max }}</td>
                                        {{-- <tr> --}}
                                        @foreach($barangmasuk as $key =>$bm)
                                            <td  style="background-color:#2ecc71;color:white"><b>{{isset($barangmasuktd[$bm->tanggal]["key_".$items->id]) ? $barangmasuktd[$bm->tanggal]["key_".$items->id]  : ''}}</td>
                                        @endforeach
                                        {{-- </tr> --}}
                                        {{-- <tr> --}}
                                        @foreach($barangkeluar as $key =>$bk)
                                        <td style="background-color:#ff4d4d;color:white"><b>{{isset($barangkeluartd[$bk->tanggal]["key_".$items->id]) ? $barangkeluartd[$bk->tanggal]["key_".$items->id]  : ''}}</td>
                                    @endforeach
                                        {{-- </tr> --}}
                                        @if($items->jumlah == 0)
                                            <td style="background-color:red;color:white" >{{ $items->jumlah }}</td>
                                        @else
                                        <td style="background-color:green;color:white" >{{ $items->jumlah }}</td>
                                        @endif

                                        

                                        <td>{{ $items->satuan }}</td>
                                        <td>{{ $items->harga }}</td>
                                        <td>
                                            <form action="{{ route('persediaan.destroy', $items->id) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                {{-- <a href="{{ route('quiz.show',$items->id) }}">Show</a> --}}
                                                {{-- <a class="btn btn-sm btn-primary" type="submit"
                                                    href="nilai/{{ $items->id }}"><i class="fas fa-eye"></i> Lihat Detail</a> --}}
                                                {{-- <button type="button" onclick="showEdit({{ $items->id }})"
                                                    class="btn btn-sm btn-success">Edit</a> --}}

                                                    <button class="btn btn-sm btn-danger" type="submit"
                                                        onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
               
            </div>
        </div>
        </section>
        </main>
        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="border:1px solid black;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="form-edit" class="form-horizontal" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <input type="hidden" name="id">
                        <div class="modal-body">

                            <div class="form-group row"><label class="col-lg-3 form-control-label">Tipe Barang</label>

                                <div class="col-lg-9">
                                    <select name="tipe" id="tipe" class="form-control select" required>
                                        <option value="0">-- Pilih Tipe Barang --</option>
                                        <option value="1">Alat Tulis Kantor</option>
                                        <option value="2">Alat Kebersihan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row"><label class="col-lg-3 form-control-label">Nama Barang</label>

                                <div class="col-lg-9">
                                    <input name="nama" placeholder="Nama" class="form-control"> 
                                </div>
                            </div>

                            <div class="form-group row"><label class="col-lg-3 form-control-label">Max</label>

                                <div class="col-lg-9">
                                    <input name="max" placeholder="Max" class="form-control"> 
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-lg-3 form-control-label">Satuan</label>

                                <div class="col-lg-9">
                                    <input name="satuan" placeholder="Satuan" class="form-control"> 
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-lg-3 form-control-label">Harga</label>

                                <div class="col-lg-9">
                                    <input name="harga" placeholder="Harga" class="form-control"> 
                                </div>
                            </div>
                            <input type="hidden" name="jumlah" placeholder="Jumlah" class="form-control"> 


                               
                         
                        </div>
                        <div class="modal-footer">
                            <button type="button" style="border:1px solid black;" class="btn btn-default"
                                data-dismiss="modal">Close</button>
                            <button type="submit" style="border:1px solid black;" class="btn btn-default">Save
                                changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Add -->
        <div class="modal fade bd-example-modal-lg" id="adds" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" style="border:1px solid black;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="upload-image-form" class="form-horizontal" action="{{ route('persediaan.store') }}" method="post"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-body">




                            <div class="form-group row"><label class="col-lg-3 form-control-label">Tipe Barang</label>

                                <div class="col-lg-9">
                                    <select name="tipe" id="types" class="form-control select" required>
                                        <option value="0">-- Pilih Tipe Barang --</option>
                                        <option value="1">Alat Tulis Kantor</option>
                                        <option value="2">Alat Kebersihan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row"><label class="col-lg-3 form-control-label">Nama Barang</label>

                                <div class="col-lg-9">
                                    <input name="nama" placeholder="Nama Barang" class="form-control"> 
                                </div>
                            </div>

                            <div class="form-group row"><label class="col-lg-3 form-control-label">Jumlah Maksimal</label>

                                <div class="col-lg-9">
                                    <input name="max" placeholder="Jumlah Maksimal" class="form-control"> 
                                </div>
                            </div>

                            <div class="form-group row"><label class="col-lg-3 form-control-label">Satuan</label>

                                <div class="col-lg-9">
                                    <input name="satuan" placeholder="Satuan" class="form-control"> 
                                </div>
                            </div>
                            <div class="form-group row"><label class="col-lg-3 form-control-label">Harga</label>

                                <div class="col-lg-9">
                                    <input name="harga" placeholder="Harga" class="form-control"> 
                                </div>
                            </div>
                          
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-default"
                                                style="border:1px solid black;">Save changes</button>
                                        </div>
                    </form>
                </div>
            </div>
        </div>



        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
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


        <script type="text/javascript">
            $(document).ready(function() {
                var postURL = "<?php echo url('addmore'); ?>";
                var i = 1;


                $('#add').click(function() {
                    i++;
                    $('#dynamic_field').append('<tr id="row' + i +
                        '" class="dynamic-added"><td><textarea required type="text" name="soal[]" placeholder="" class="form-control name_list"></textarea></td><td><button type="button" name="remove" id="' +
                        i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
                });


                $(document).on('click', '.btn_remove', function() {
                    var button_id = $(this).attr("id");
                    $('#row' + button_id + '').remove();
                });
            });
        </script>
    @endsection


    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
            $('#myModal').on('shown.bs.modal', function() {
                $('#myInput').trigger('focus')
            });

        });

        function showEdit(id) {
            $.ajax({
                url: "{{ url('persediaan') }}/" + id + "/edit",
                success: function(res) {
                    $("#form-edit [name='id']").val(id);
                    $("#form-edit [name='tipe']").val(res.data.tipe);
                    $("#form-edit [name='nama']").val(res.data.nama);
                    $("#form-edit [name='max']").val(res.data.max);
                    $("#form-edit [name='satuan']").val(res.data.satuan);
                    $("#form-edit [name='harga']").val(res.data.harga);
                    $("#form-edit [name='jumlah']").val(res.data.jumlah);


                    $('#form-edit').attr('action', "./persediaan/" + id);
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
                    prevTD = $this; // store current td 
                    prevTDVal = $this.text();
                    span = 1;
                }
            });
        });
    </script>
