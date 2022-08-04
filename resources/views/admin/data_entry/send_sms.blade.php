

@extends('layouts.admin')

@section('title')
Send SMS | 
@endsection

@section('content')



<div class="content-wrapper" style="min-height: 518px;">

	{{-- <div class="container">
		@include('layouts.backend_partials.status')
	</div> --}}

	<section class="content">

		<div class="row">
			<div class="col-xs-12">

<div class="box">
              <div class="box-header">
                <h3 class="box-title">Send SMS</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                  <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                    <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                        <i class="fa fa-times"></i></button>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                @if(Auth::user()->role == 'superadmin' )
                <div class="box-body pad">
                    <div class="card">
                        <div class="form-layout">
                            <div class="row mg-b-25">
                                <div class="col-md-6 col-sm-12">
                                    {{-- lklkjkljsa --}}
                                    
                                    {{-- {{ $phone }} --}}
                                    
                                    <form class="form-horizontal form-element" method="POST" action="{{route('super.submit.sms')}} " enctype="multipart/form-data">
                                    
                                   

                                        {{ csrf_field() }}

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="site_name" class="control-label">Enter Phone Numbers</label>
                                                {{-- <small class="text text-danger">Separate phone numbers with comma</small> --}}
                                                <input type="text" name="phone" id="site_name" class="form-control" autofocus="" placeholder="Phone numbers" value="{{ $phone_numbers }}">
                                            </div>
                                            @if ($errors->has('phone'))
				                            <span class="helper-text" data-error="wrong" data-success="right">
				                                <strong class="text-danger">{{ $errors->first('phone') }}</strong>
				                            </span>
				                            @endif
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="site_name" class="control-label">Subject</label>
                                                <input type="text" name="subject" id="site_name" class="form-control" autofocus="" placeholder="Subject of message" value="{{ old('subject') }}">
                                                
                                            </div>
                                            @if ($errors->has('subject'))
				                            <span class="helper-text" data-error="wrong" data-success="right">
				                                <strong class="text-danger">{{ $errors->first('subject') }}</strong>
				                            </span>
				                            @endif
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="site_name" class="control-label">Message</label>
                                                <textarea class="form-control" name="message" rows="4"></textarea>
                                            </div>
                                            @if ($errors->has('message'))
				                            <span class="helper-text" data-error="wrong" data-success="right">
				                                <strong class="text-danger">{{ $errors->first('message') }}</strong>
				                            </span>
				                            @endif
                                        </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-warning btn-sm"> Send SMS </button>
                                        </div>
                                    </div>

                                </form>


                            </div>

                            
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
            @elseif(Auth::user()->role == 'admin')
            <div class="box-body pad">
                    <div class="card">
                        <div class="form-layout">
                            <div class="row mg-b-25">
                                <div class="col-md-6 col-sm-12">
                                    {{-- lklkjkljsa --}}
                                    
                                    {{-- {{ $phone }} --}}
                                    <form class="form-horizontal form-element" method="POST" action="{{route('admin.submit.sms')}} " enctype="multipart/form-data">

                                        {{ csrf_field() }}

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="site_name" class="control-label">Enter Phone Numbers</label>
                                                {{-- <small class="text text-danger">Separate phone numbers with comma</small> --}}
                                                <input type="text" name="phone" id="site_name" class="form-control" autofocus="" placeholder="Phone numbers" value="{{ $phone_numbers }}">
                                            </div>
                                            @if ($errors->has('phone'))
                                            <span class="helper-text" data-error="wrong" data-success="right">
                                                <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="site_name" class="control-label">Subject</label>
                                                <input type="text" name="subject" id="site_name" class="form-control" autofocus="" placeholder="Subject of message" value="{{ old('subject') }}">
                                                
                                            </div>
                                            @if ($errors->has('subject'))
                                            <span class="helper-text" data-error="wrong" data-success="right">
                                                <strong class="text-danger">{{ $errors->first('subject') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="site_name" class="control-label">Message</label>
                                                <textarea class="form-control" name="message" rows="4"></textarea>
                                            </div>
                                            @if ($errors->has('message'))
                                            <span class="helper-text" data-error="wrong" data-success="right">
                                                <strong class="text-danger">{{ $errors->first('message') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-warning btn-sm"> Send SMS </button>
                                        </div>
                                    </div>

                                </form>


                            </div>

                            
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
            @else
            <div class="box-body pad">
                    <div class="card">
                        <div class="form-layout">
                            <div class="row mg-b-25">
                                <div class="col-md-6 col-sm-12">
                                    {{-- lklkjkljsa --}}
                                    
                                    {{-- {{ $phone }} --}}
                                    <form class="form-horizontal form-element" method="POST" action="{{route('data.submit.sms')}} " enctype="multipart/form-data">

                                        {{ csrf_field() }}

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="site_name" class="control-label">Enter Phone Numbers</label>
                                                {{-- <small class="text text-danger">Separate phone numbers with comma</small> --}}
                                                <input type="text" name="phone" id="site_name" class="form-control" autofocus="" placeholder="Phone numbers" value="{{ $phone_numbers }}">
                                            </div>
                                            @if ($errors->has('phone'))
                                            <span class="helper-text" data-error="wrong" data-success="right">
                                                <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="site_name" class="control-label">Subject</label>
                                                <input type="text" name="subject" id="site_name" class="form-control" autofocus="" placeholder="Subject of message" value="{{ old('subject') }}">
                                                
                                            </div>
                                            @if ($errors->has('subject'))
                                            <span class="helper-text" data-error="wrong" data-success="right">
                                                <strong class="text-danger">{{ $errors->first('subject') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="site_name" class="control-label">Message</label>
                                                <textarea class="form-control" name="message" rows="4"></textarea>
                                            </div>
                                            @if ($errors->has('message'))
                                            <span class="helper-text" data-error="wrong" data-success="right">
                                                <strong class="text-danger">{{ $errors->first('message') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-warning btn-sm"> Send SMS </button>
                                        </div>
                                    </div>

                                </form>
                            </div>

                            
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
            @endif
			</div>


			<!-- /.content -->
		</div>	



	</div>

</div>
</section>
</div>



@endsection


