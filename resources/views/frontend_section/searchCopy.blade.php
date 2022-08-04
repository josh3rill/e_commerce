<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div id="" class="search-section search-area-2 bg-grea hm-search-form-comp">





<div class="w3-container">
  <h2>Right-aligned Dropdown</h2>
  <p>Use the w3-right class to float the dropdown to the right, and use CSS to position the dropdown content (right:0 will make the dropdown menu go from right to left).</p>

  
  
  <p>Note: Remember to clear floats if you use w3-right or w3-left. Remove the div class="w3-clear" to understand why.</p>
</div>


              <div class="btn-group">
  <div class="btn-group dropleft" role="group">
    <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span class="sr-only">Toggle Dropleft</span>
    </button>
    <div class="dropdown-menu">
      <!-- Dropdown menu links -->
    </div>
  </div>
  <button type="button" class="btn btn-secondary">
    Split dropleft
  </button>
</div>

              <div class="btn-group dropleft">
  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropleft
  </button>
  <div class="dropdown-menu">
    <!-- Dropdown menu links -->
  </div>
</div>
         
    <div class="">
      <div class="search-section-area">
        <div class="search-area-inner">
          <div class="search-contents">
            <form action="{{route('search3')}}" method="GET">





   
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <p style="margin-bottom: 0; font-weight: 600;">Keyword</p>
                        <div class="form-group">
                        <input type="text" name="keyword" class="form-control" placeholder="e.g. Barber, Saloon">
                        </div>
                    </div>



                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <p style="margin-bottom: 0; font-weight: 600;">Keyword</p>
                        <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="e.g. Barber, Saloon">
                        </div>
                    </div>

                     <div class="col-lg-2 col-md-4 col-sm-6 text-center">
                        <p style="font-weight: 600; margin-bottom: 0;">Choose Distance(in km): <span id="demo"></span></p>
                        <div class="slidecontainer" style="margin-bottom: 15px;">
                            {{-- <input type="range" min="1" max="100" value="50" class="slider form-control" id="myRange2"> --}}
                            <input type="range" min="1" max="1000000" name="ranges"  value="5000" class="slider" id="myRange">
                        </div>
                    </div>


                    <div class="col-lg-2 col-md-4 col-sm-6">



                      <div class="w3-dropdown-hover w3-right">
                         @if(isset($search_form_categories))
                                    @foreach($search_form_categories as $category)
    <button class="w3-button w3-black">{{ $category->name }}</button>
    <div class="w3-dropdown-content w3-bar-block w3-border" style="right:0">
      <a href="#" class="w3-bar-item w3-button">Link 1</a>
      <a href="#" class="w3-bar-item w3-button">Link 2</a>
      <a href="#" class="w3-bar-item w3-button">Link 3</a>
    </div>
  </div>

  <div class="w3-clear"></div>

                        <div class="form-group">
                            <p style="margin-bottom: 0; font-weight: 600;">Choose Category</p>
                            <select class="form-control" id="categories" name="category">
                                <option value="">- Select an Option -</option>
                                @if(isset($search_form_categories))
                                    @foreach($search_form_categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                         <div class="form-group">
                            <p style="margin-bottom: 0; font-weight: 600;">Choose Category</p>
                            <select class="form-control" id="categories" name="category">
                                <li value="">- Select an Option -</li>
                                @if(isset($search_form_categories))
                                    @foreach($search_form_categories as $category)
                                          <a href="#" class="w3-bar-item w3-button">Link 1</a>
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="form-group">
                            <p style="margin-bottom: 0; font-weight: 600;">Sub Category</p>
                            <select class="form-control" id="sub_category" name="sub_categories">
                                <option value="">- Select an Option -</option>
                            </select>
                        </div>
                    </div>




                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="form-group">
                          <p style="margin-bottom: 0; font-weight: 600;">Choose State</p>
                          <select class="form-control" id="state" name="state">
                            <option value="">- Select an Option -</option>
                            @if(isset($states))
                                @foreach($states as $state)
                                    <option value="{{$state->name}}"> {{ $state->name }}  </option>
                                @endforeach
                            @endif
                          </select>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-4 col-sm-6 text-center">
                        <div class="form-group">
                            <button class="btn btn-block bg-warning font-weight-bold text-white btn-warning" style="margin-top: 25px">Search
                                <i class="fa fa-search ml-2" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
   <div class="form-group">
<p id="demo2"></p>
    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="form-group">
                        <input id="latitude_id" type="hidden" name="latitude" class="form-control">
                        </div>
                    </div>

                     <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="form-group">
                        <input id="longitude_id" type="hidden" name="longitude" class="form-control">
                        </div>
                    </div>

                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>

<header class="top-header top-header-ads-mobile" style="display: flex; justify-content: center; background: linear-gradient(90deg, rgba(251,219,35,1) 52%, rgba(243,163,27,1) 66%); width: 100%; margin: 0">
    <a href="https://efskyview.com/">
      <img src="{{ asset('images/skyviewstickyads.gif') }}" alt="" style="width: 100%; height: 35px">
    </a>
</header>



<script type="text/javascript">
    var slider = document.getElementById("myRange");
    var output = document.getElementById("demo");
    output.innerHTML = slider.value;

    slider.oninput = function() {
      output.innerHTML = this.value;
    }


    $('#categories').on('change',function(){
        var categoryID = $(this).val();
        if(categoryID){
            $.ajax({
                type:"GET",
                url: 'api/get-category-list/'+categoryID,
                success:function(res){
                    if(res){
                      var res = JSON.parse(res);
                        // $("#sub_category ").empty();
                        $.each(res,function(key,value){
                        var chosen_value = value;
                            $("#sub_category").append(
                                '<option value="'+key+'">'+chosen_value.name+'</option>'
                            );
                        });
                    }else{
                        $("#sub_category").empty();
                    }
                }
            });
        }else{
            $("#sub_category").empty();
        }
    });


    $('#state').on('change',function(){
        var state_name = $(this).val();
        if(state_name){
            $.ajax({
                type:"GET",
                url: 'api/get-city-list/'+state_name,
                success:function(res){
                    if(res){
                        console.log(res);
                        console.log(state_name);
                        $("#city").empty();
                        $.each(res,function(key,value){
                            $("#city").append('<option value="'+key+'">'+value+'</option>');
                        });

                    }else{
                        $("#city").empty();
                    }
                }
            });
        }else{
            $("#city").empty();
        }

    });





</script>



<style>
    .slidecontainer {
      width: 100%;
    }

    .slider {
      -webkit-appearance: none;
      width: 100%;
      height: 15px;
      border-radius: 5px;
      background: #d3d3d3;
      outline: none;
      opacity: 0.7;
      -webkit-transition: .2s;
      transition: opacity .2s;
    }

    .slider:hover {
      opacity: 1;
    }

    .slider::-webkit-slider-thumb {
      -webkit-appearance: none;
      appearance: none;
      width: 25px;
      height: 25px;
      border-radius: 50%;
      background: #f0ad4e;
      cursor: pointer;
    }

    .slider::-moz-range-thumb {
      width: 25px;
      height: 25px;
      border-radius: 50%;
      background: #f0ad4e;
      cursor: pointer;
    }
  </style>


  <script type="text/javascript">
  $(document).ready( function () {
    // alert('ddsdsd');
  getLocation();
});
</script>

                       @if(isset($keyword_and_states))
            @foreach($keyword_and_states as $keyword_and_state)       
            <div class="col-sm-3 card service-box ky">
                <img class="card-img-top" src="{{asset('uploads/services')}}/{{$keyword_and_state->service_image}}" alt="service" style="min-width: 150px;">
                <div class="card-body detail">
                    <div class="title">
                        <h4><a href="#" style="font-size: 15px;">{{$keyword_and_state->user->name}}, &nbsp; {{$keyword_and_state->name}}</a></h4>
                    </div>
                    <div class="location">
                        <a href="properties-details.html" tabindex="-1">
                            
                        </a><i class="fa fa-map-marker" style="font-size: 15px;"></i><span>{{$keyword_and_state->state}}</span>
                    </div>
                    
                    <!--<a href="#" class="read-more">More...</a>-->
                </div>
            </div>
            @endforeach
                        @endif