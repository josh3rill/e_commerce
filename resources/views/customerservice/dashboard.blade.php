
@extends('layouts.admin')

@section('title', 'Subscription Users Table | ')

@section('content')
<style>
    .testli:not(:last-child):after {
	 content: ' ,';
     padding: 0px 7px;
}
</style>

    <div class="content-wrapper" style="min-height: 518px;">

        <div class="container">
            @include('layouts.backend_partials.status')
        </div>

        <section class="content">

            <div class="row">
                <div class="col-xs-12">



                    <div class="box" >
                        <div class="box-header">
                            <h3 class="box-title"> All Users' Table</h3>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table class="display table table-bordered data_table_main">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Name </th>
                                        <th> Email </th>
                                        <th> Phone </th>
                                        <th> role </th>
                                        <th> Registration Date</th>
                                        <th> Amount Paid </th>
                                        <!-- <th> Sub End Date </th> -->
                                        <!-- <th> Last Plan type </th> -->
                                        <th> Services </th>
                                        <th> Call Status </th>
                                        <th> Call Duration </th>
                                        <th> Alternative Communication </th>
                                        <th> Client's Comment </th>
                                        <th> Customer Service Comments </th>
                                        <!-- <th> Customer Service Personel Name</th> -->
                                        <th> Add Report </th>
                                    </tr>
                                </thead>

                                    </tbody>
                                        @foreach($all_subscriptions as $key => $all_subscription)

                                    </tr>
                                        <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
                                        <td> {{ $all_subscription->name }} </td>
                                        <td><span id="11" class="text-muted"></i> {{ $all_subscription->email }} </span> </td>
                                        <td><span class="text-muted"> </i> {{ $all_subscription->phone ?? 'no phone'}} </span> </td>
                                        <td> {{ $all_subscription->role }} </td>
                                        <td> {{ $all_subscription->created_at->format('d/m/Y') }} </td>

                                        <td> {{ $all_subscription->subscriptions->first()->last_amount_paid ?? '' }} </td>

                                        <td>
                                        @if($all_subscription->services->count())

                                        <p id="active_text">{{$all_subscription->services->count()}} &nbsp; services</p>
                                        <button type="button" class="btn btn-primary"
                                        data-toggle="modal" data-target="#allServicess{{ $all_subscription->id }}">
                                        See Services
                                        </button>
                                        @elseif($all_subscription->services->count() == 0)
                                            <span id="active_text2">No Services Yet!</span>
                                            @endif

                                         <!-- Modal -->
                                         <div class="modal fade" id="allServicess{{ $all_subscription->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="allServicess{{ $all_subscription->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="allUsers{{ $all_subscription->id }}Label">All <strong>{{ $all_subscription->name }}</strong> Services (<strong>Total: {{ $all_subscription->services->count() }}</strong>)</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Service Name</th>
                                                    <th scope="col">Date Created</th>
                                                    <th scope="col">Approved?</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @if($all_subscription->services->count())

                                                @foreach($all_subscription->services as $key => $services)
                                                 <tr>
                                                   <th scope="row">{{ $key + 1 }}</th>
                                                    <td><a href="{{ route('serviceDetail', $services->slug) }}" target="_blank">{{$services->name}}</a></td>
                                                    <td>{{$services->created_at->format('d/m/Y')}}</td>
                                                    <td>{!! $services->status ? '<span class="text-success">Approved</span>' : '<span class="text-danger">Not Approved</span>' !!}</td>
                                                    </tr>
                                                    @endforeach
                                                    @endif

                                                </tbody>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                        </td>

                                        <td> {{$all_subscription->customerservice->call_status ?? ''}} </td>
                                        <td><span class="text-muted"></i> {{$all_subscription->customerservice->call_duration ?? ''}} </span> </td>
                                        <td><span class="text-muted"> </i> {{$all_subscription->customerservice->call_status ?? ''}} </span> </td>
                                        <td> {{$all_subscription->customerservice->client_comment ?? ''}} </td>
                                        <td>{{$all_subscription->customerservice->customer_service_comment ?? ''}} </span></td>
                                        <!-- <td>{{$all_subscription->customerservice->customer_service_personel_name ?? ''}} </td>                                         -->
                                        <td>
                                        <button type="button" class="btn btn-primary"
                                        data-toggle="modal" data-target="#allUsers{{ $all_subscription->id }}">
                                        Write Report
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="allUsers{{ $all_subscription->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="allUsers{{ $all_subscription->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="allUsers{{ $all_subscription->id }}Label">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="{{ route('save_report') }}" method="POST" class="message-form">
                                                @csrf
                                            <input type="hidden" class="form-control" id="user_id" name="user_id"
                                            value="{{$all_subscription->id}}">
                                        <div class="form-group">
                                            <label for="call_status">Call Status</label>
                                            <input type="text" class="form-control" id="call_status" name="call_status" value="{{$all_subscription->customerservice->call_status ?? ''}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="call_duration">Call Duration</label>
                                            <input type="text" class="form-control" id="call_duration" name="call_duration" value="{{$all_subscription->customerservice->call_duration ?? ''}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="alternative">Alternative Communication</label>
                                            <input type="text" class="form-control" id="alternative" name="alternative" value="{{$all_subscription->customerservice->alternative ?? ''}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="customer_comment">Client's Comment</label>
                                            <textarea class="form-control" id="client_comment" name="client_comment" rows="3">{{$all_subscription->customerservice->client_comment ?? ''}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="customer_service_comment">Customer Service Comments</label>
                                            <textarea class="form-control" id="customer_service_comment" name="customer_service_comment" rows="3"
                                            >{{$all_subscription->customerservice->customer_service_comment ?? ''}}</textarea>
                                        </div>

                                        <!-- <div class="form-group">
                                            <label for="alternative">Handled By</label>
                                            <input type="text" class="form-control" id="customer_service_personel_name" name="customer_service_personel_name"
                                             value="{{$all_subscription->customerservice->customer_service_personel_name ?? ''}}">
                                        </div> -->
                                        <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                            </div>

                                            </div>
                                        </div>
                                        </div>
                                        </td>
                                </tr>
                                @endforeach


                            </tbody>


                        </table>


                    </div>
                    <!-- /.box-body -->
                    <div class="form-stretch">

                        <div class="row">
                            <div class="col-md-3">
                                <h3 class="box-title"> Sort By Date </h3>
                            </div>
                            <!-- form start -->
                            <form class="form-horizontal form-element"
                            action="{{ route('customer_service.sort') }}" method="GET">
                                @csrf
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">From</label>
                                        <input type="date" name="start_date" class="form-control">
                                        @error('start_date')
                                        <span class="error">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">To</label>
                                        <input type="date" name="end_date" class="form-control">
                                        @error('end_date')
                                        <span class="error">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="">
                                        <button type="submit" class="btn btn-warning"> Submit </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <h3 class="box-title"> Sort By Role </h3>
                            </div>
                            <!-- form start -->
                            <form class="form-horizontal form-element"
                            action="{{ route('customer_service.sort') }}" method="GET">
                                @csrf
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="role">User Role</label>
                                        <select class="form-control" id="role" name="role">
                                            <option value="seller">Seller</option>
                                            <option value="buyer">Buyer</option>
                                        </select>
                                        @error('role')
                                        <span class="error">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="">
                                        <button type="submit" class="btn btn-warning"> Submit </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <h3 class="box-title"> Sort By Services </h3>
                            </div>
                            <!-- form start -->
                            <form class="form-horizontal form-element"
                            action="{{ route('customer_service.sort') }}" method="GET">
                                @csrf
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="service">Has Service</label>
                                        <select class="form-control" id="service" name="service">
                                            <option value="service">Have Service</option>
                                            <option value="no-service">Have No Service</option>
                                        </select>
                                        @error('role')
                                        <span class="error">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="">
                                        <button type="submit" class="btn btn-warning"> Submit </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <!-- /.content -->
            </div>

        </div>

    </div>
</section>
<script>
    $(document).ready(function(){
 const ist = #('11').value;
 console.log(ist);
});
</script>
@endsection


