@extends('layouts.adm') 
@section('content')


<!-- BEGIN CONTENT BODY -->
                <div class="page-content-wrapper">
                    <div class="content-wrapper container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title">

                                    <h4 class="float-left">View Page</h4>

                                    <ol class="breadcrumb float-left float-md-right">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);"><i class="fa fa-home"></i></a></li>
                                        <li class="breadcrumb-item">View</li>
                                    </ol>

                                </div>
                            </div>
                        </div><!-- end .page title-->

				
								<div class="col-md-12">
                                <div class="panel panel-card margin-b-30">
                                    <!-- Start .panel -->
                                    <div class="card-header">
                                        View
                                        <div class="float-right">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-rounded btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action <span class="caret"></span></button>
                                                <div class="dropdown-menu panel-dropdown" role="menu">
                                                    <a  class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>

                                                    <a class="dropdown-item" href="#">Separated link</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body  p-xl-3">
                                        @foreach($aplikasi as $datas)
											
											<div class="form-group row">
											<label class="col-lg-2 form-control-label">server</label>

                                                <div class="col-lg-10">
												<input type="text" placeholder="server" class="form-control" value="{{ $datas->server->name }}" readonly> 
                                                </div>
											</div>
											<div class="form-group row">
                                                <label class="col-lg-2 form-control-label">Name</label>
    
                                                    <div class="col-lg-10">
                                                    <input type="text" placeholder="name" class="form-control" value="{{ $datas->name }}" readonly> 
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-2 form-control-label">IP</label>
    
                                                    <div class="col-lg-10">
                                                    <input type="text" placeholder="name" class="form-control" value="{{ $datas->name }}" readonly> 
                                                    </div>
                                            </div>  
									
											</div>
										@endforeach
                                    </div>
                                </div>
				
				
				
				
				
				
				
				
            </div>
            <!-- END CONTAINER -->
        </div>
        <!-- /wrapper -->
		
		 

        <!-- SCROLL TO TOP -->
        <a href="#" id="toTop"></a> 
	@endsection