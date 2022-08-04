@if (session('fail'))
    <script>
        toastr.error({{ session('fail') }})
    </script>
@endif

@if (session('success'))
    <script>
        toastr.success({{ session('success') }})
    </script>
@endif


@if (session('success2'))
    <script>
        toastr.success({{ session('success2') }})
    </script>
@endif






@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            toastr.error({{ $error }})
        </script>
    @endforeach
@endif



{{-- @if (session('fail'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
	{{ session('fail') }}
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
	{{ session('success') }}
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif


@if (session('success2'))
<p>{{ session('success2') }}</p>
<div class="alert alert-success alert-dismissible fade show" role="alert">
	{{ session('success2') }}
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif






@if ($errors->any())
<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<h4><i class="icon fa fa-ban"></i> Alert!</h4>
	@foreach ($errors->all() as $error)
	<li>{{ $error }}</li>
	@endforeach
</div>
@endif --}}
