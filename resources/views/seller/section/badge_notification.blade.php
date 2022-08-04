
{{-- {{$count_badge}} --}}
@if($count_badge)
    <div class="pad margin no-print">
        <div class="callout callout-info bg-warning text-warning" style="margin-bottom: 0!important;background-color: #fec30bbb; color: black;">
            <h4><i class="fa fa-info text-danger"></i> Note:</h4>
            Hello! {{Auth::User()->name}} <br />

            @if (Auth::User()->services)
                <p style=" color: black;">
                    <strong>{{$count_badge}}</strong> of your accounts have a status of <strong> ORDINARY </strong>.
                </p>
                <a href="{{route('seller.service.badges')}}"> Upgrade Now</a> <br>
                <a href="{{ route('seller.service.create') }}"></a> Click here to create a new service</a>
            @endif
        </div>
    </div>
@endif

@if($count_badge == 0)
    <div class="pad margin no-print">
        <div class="callout callout-info bg-warning text-warning" style="margin-bottom: 0!important;background-color: #fec30bbb;">
            <h4><i class="fa fa-info text-danger"></i> Note:</h4>
             <h4 class="text-black">Hello! {{Auth::User()->name}}</h4>

            @if (Auth::User()->services->count() == 0)
                <p style=" color: black;"><strong> You have not created a service yet!.</strong></p>
                <a href="#" data-toggle="modal" data-target="#postServiceModal" class="text-success"> Click here to create a new service</a>
            @else
                <p>You have a service</p>
                <a href="#" data-toggle="modal" data-target="#postServiceModal" class="text-success"> <strong>Click here to create a new service</strong></a>
            @endif
        </div>
    </div>
@endif
