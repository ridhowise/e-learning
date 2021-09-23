@extends('layouts.adm') 
@section('content')
<!-- BEGIN CONTENT BODY -->
                <div class="page-content-wrapper">
                    <div class="content-wrapper container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title">


                                    <ol class="breadcrumb float-left float-md-right">
                                        <li class="breadcrumb-item"><a href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i></a></li>
                                    
                                    </ol>

                                </div>
                            </div>
                        </div><!-- end .page title-->

                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">Edit User</div>
                                    <div class="card-body">

                                <div class="col-md-6">
                                <div class="panel panel-card margin-b-30">
                                    <!-- Start .panel -->
                                    
                                    <div class="panel-body  p-xl-3">
                                        <form class="form-horizontal" action="{{ route('user.update', $data->id) }}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="PATCH">
                                            <div class="form-group row"><label class="col-lg-2 form-control-label">Kelas</label>

                                                <div class="col-lg-10">
                                                <select name="class_id" id="class_id" class="form-control{{ $errors->has('class_id') ? ' is-invalid' : '' }}">
                                                <option value="{{ $data->class->id }}"> {{ $data->class->name }}</option>
                                                <option>---PILIH KELAS---</option>

                                                    @foreach($class as $class)
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
                                            <div class="form-group row"><label class="col-lg-2 form-control-label">Nama</label>

                                                <div class="col-lg-10">
                                                <input type="text" name="name" placeholder="Nama" value="{{ $data->name }}" class="form-control" required> 
                                                </div>
                                            </div>
                                            <div class="form-group row"><label class="col-lg-2 form-control-label">Username</label>

                                                <div class="col-lg-10">
                                                <input type="text" name="email" value="{{ $data->email }}" placeholder="Username" class="form-control" required> 
                                                </div>
                                            </div>
                                            <div class="form-group row"><label class="col-lg-2 form-control-label">Foto</label>

                                                <div class="col-lg-10">
                                                <input type="file" name="image" class="form-control"> 
                                                <br>
                                                Current pic : <img style="width:100px" src="{{ URL::asset('images/') }}/{{$data->images}}">
                                                </div>
                                            </div>
						
                                            
                                            <div class="form-group row">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button class="btn btn-sm btn-primary" type="submit">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="clearfix"></div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTAINER -->
        </div>
        <!-- /wrapper -->


        <!-- SCROLL TO TOP -->
        <a href="#" id="toTop"></a> 
@endsection