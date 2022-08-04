
  <div class="box">

    <div class="box-header with-border">
    <h3 class="box-title"> {{ url()->current() == route('seller.notification.unread') ?  'Notification' : 'Recent Notification' }} ({{ $unread_notification->count() }}) </h3>

      @if (url()->current() == route('seller.message.all') )
      <div class="box-tools">
        <form class="" method="GET" action="{{ route('admin.service.search') }}">
        <div class="input-group input-group-sm" style="width: 150px;">
          <input type="search" class="form-control pull-right" placeholder="Search" name="query"  value="{{ isset($query) ? $query : '' }}" required>

          <div class="input-group-btn">
            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
          </div>
        </div>
      </form>
      </div>
      @endif

    </div>
    <!-- /.box-header -->
    <div class="box-body ">
      <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th> # </th>
                    <th> Notification </th>
                    <th> Date </th>
                    <th> Action </th>
                </tr>
            </thead>

            <tbody>
                @foreach($unread_notification as $key => $unread_notifications)
                    <tr>
                        <td><a href="javascript:void(0)"> {{ $key + 1 }} </a></td>
                        <td> {{ Str::limit( $unread_notifications->description, 100) }} </td>
                        <td> {{ $unread_notifications->created_at->diffForHumans() }} </td>

                        <td>
                            <button onclick="notificationRead()" type="button" class="btn btn-success">
                                <i class="fa fa-check"></i>
                            </button>
                            {{-- <button type="button" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </div>
    <!-- /.box-body -->


@if (url()->current() == route('seller.notification.unread') )
<div class="box-footer clearfix">

{{ $unread_notification->links() }}

</div>
@endif

<script>
    function notificationRead(){
        toastr.success('Notification Read!');
    }
</script>

</div>


