<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <div class="navbar-header">
      <div class="pull-left">
        <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('public/images/logo.png') }}"  alt="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
        </button>                      
      </div>
        
      <div class="dropdown pull-left" style="margin-top:20px;">
        <a class=" dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars" style="font-size:25px; margin-right:10px;"></i></a>Select Your Borough<i class="fa fa-caret-down"></i>
        
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
	  </div>                     
    </div>
      
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active"><a class="nav-link " href="{{ url('/') }}" ><i class="fa fa-home faicon"></i>home </a>
        
        
        @php
        $menu_qry = DB::table('category_types')->groupBy('menu_id')->orderBy('menu_id', 'ASC')->get();  
        foreach($menu_qry as $menu_det){
          if ($menu_det->menu_id == 1) {
              $menu_name = "Events";
              $menu_cls="fa fa-calendar faicon";
          } else if ($menu_det->menu_id == 2) {
              $menu_name = "Eat & Drink";
              $menu_cls="fa fa-cutlery faicon";
          } else {
              $menu_name = "Hot Now";
              $menu_cls="fa fa-user faicon";
          }
        @endphp
        <li class="nav-item dropdown static-li">
          <a class="nav-link " href="{{ url('/') }}/events"><i class="{{ $menu_cls }}"></i>{{ $menu_name }}</a>
          <div class="dropdown-menu animation  slideUpIn mega">
            <div class="row">
            @php
            $menu_cat_type_qry = DB::table('category_types')->where('menu_id', $menu_det->menu_id)->orderBy('cat_type', 'ASC')->get();  
            foreach($menu_cat_type_qry as $menu_cat_type_det){
            	if ($menu_cat_type_det->dea_ph == 1) {
                    $menu_ph=$menu_cat_type_det->cat_ph1;
                }
                if ($menu_cat_type_det->dea_ph == 2) {
                    $menu_ph=$menu_cat_type_det->cat_ph2;
                }
                if ($menu_cat_type_det->dea_ph == 3) {
                    $menu_ph=$menu_cat_type_det->cat_ph3;
                }
                if ($menu_cat_type_det->dea_ph == 4) {
                    $menu_ph=$menu_cat_type_det->cat_ph4;
                }
            @endphp                      
              <div class="col-md-3">
              	
                <a class="dropdown-item" href="#"><img src="{{ asset('public/category-type-photo/thumb/'.$menu_ph) }}" alt="{{ $menu_cat_type_det->cat_type }}" style="width:100%;" /></a>
                
                <h5 style="color:#fff; padding-left:20px;">{{ $menu_cat_type_det->cat_type }}</h5>
                <a class="dropdown-item" href="#"><span style="padding-bottom:2px; border-bottom:solid 2px #fc318a7d; display:block; "></span></a>
                
                @php
                $menu_cat_qry = DB::table('categories')->where('cat_type_id', $menu_cat_type_det->cat_type_id)->orderBy('cat_name', 'ASC')->get();  
                foreach($menu_cat_qry as $menu_cat_det){
                @endphp
                <a class="dropdown-item" href="#">{{ $menu_cat_det->cat_name }}</a>
                @php } @endphp
              </div>
     		  @php } @endphp
            </div>
          </div>
        </li>
        @php } @endphp
        
        
       <!-- <li class="nav-item dropdown">
          <a class="nav-link " href="#"><i class="fa fa-cutlery faicon"></i>Eat & Drinks</a>
          <div class="dropdown-menu animation  slideUpIn mega">
            <div class="row">                         
              <div class="col-md-3"> 
                <a class="dropdown-item" href="#"><img src="{{ asset('public/images/drink-special/mega-img.jpg') }}"  alt="schedule img" style="width:100%;"></a>
                <h5 style="color:#fff; padding-left:20px;">RESTAURANTS</h5><a class="dropdown-item" href="#">
                <span style="padding-bottom:2px; border-bottom:solid 2px #fc318a7d; display:block; "></span> </a>
                <a class="dropdown-item" href="#">New Restaurants</a>
                <a class="dropdown-item" href="#">Top Ten</a>
                <a class="dropdown-item" href="#">Today Specials</a>
                <a class="dropdown-item" href="#">Events</a>
                <a class="dropdown-item" href="#">More..</a>
              </div>
            
              <div class="col-md-3"> 
                <a class="dropdown-item" href="#"><img src="{{ asset('public/images/drink-special/mega2.jpg') }}"  alt="schedule img" style="width:100%;"></a>
                <h5 style="color:#fff; padding-left:20px;">LOUNGES</h5>
                <a class="dropdown-item" href="#"><span style="padding-bottom:2px; border-bottom:solid 2px #fc318a7d; display:block; "></span> </a>
                <a class="dropdown-item" href="#">New Lounges</a>
                <a class="dropdown-item" href="#">Top Ten</a>
                <a class="dropdown-item" href="#">Events</a>
                <a class="dropdown-item" href="#">Specials</a>
                <a class="dropdown-item" href="#">More..</a>
              </div>
            
              <div class="col-md-3"> 
                <a class="dropdown-item" href="#"><img src="{{ asset('public/images/drink-special/mega3.jpg') }}"  alt="schedule img" style="width:100%;"></a>
                <h5 style="color:#fff; padding-left:20px;">BARS</h5>
                <a class="dropdown-item" href="#"><span style="padding-bottom:2px; border-bottom:solid 2px #fc318a7d; display:block; "></span> </a>                                  
                <a class="dropdown-item" href="#">New Bars</a>
                <a class="dropdown-item" href="#">Happy Hour</a>
                <a class="dropdown-item" href="#">Top Ten</a>
                <a class="dropdown-item" href="#">$2 Tuesdays</a>
                <a class="dropdown-item" href="#">More...</a>                                   
              </div>
            
              <div class="col-md-3"> 
                <a class="dropdown-item" href="#"><img src="{{ asset('public/images/drink-special/mega4.jpg') }}"  alt="schedule img" style="width:100%;"></a>
                <h5 style="color:#fff; padding-left:20px;">SPECIALS</h5>
                <a class="dropdown-item" href="#"><span style="padding-bottom:2px; border-bottom:solid 2px #fc318a7d; display:block; "></span> </a>                                    
                <a class="dropdown-item" href="#">Menu1</a>
                <a class="dropdown-item" href="#">Menu2</a>
                <a class="dropdown-item" href="#">Menu3</a>
                <a class="dropdown-item" href="#">More...</a> 
              </div>
            </div>
          </div>
        </li>
        
        
        <li class="nav-item dropdown">
          <a class="nav-link " href="#"><i class="fa fa-user faicon"></i>Friends</a>
          <div class="dropdown-menu animation  slideUpIn">
            <a class="dropdown-item" href="#">single class</a>
            <a class="dropdown-item" href="#">booking</a>
          </div>
        </li>
        
        <li class="nav-item d-none d-lg-inline">
          <div class="icon-menu">
            <ul>
              <li><a href="#" class="search-btn search-box-btn" data-toggle="modal" data-target="#myModal"><i class="fa fa-search"></i></a></li>
            </ul>
          </div>
        </li>-->
        
        
        <li>
          <div class="input-group" style="margin-top:27px; margin-left:20px;">
          
             {!! Form::email('news_ltr_email',old('news_ltr_email'), array('id' => 'news_ltr_email','required', 'maxlength' => 150,'class'=>'form-control newsltr','placeholder'=>'Join our email list','autocomplete' => 'off')) !!}
           
            <span class="input-group-btn">
            <button class="btn btn-theme" type="submit" style="border-radius:0px; height:30px; padding:0px; background:#fc318a; padding:0px 18px; color:#fff; font-size:13px;" onclick="newsletterValidation();">Join</button>
            </span>
            
          </div>
          <span style="padding-left:20px; color:#F00;" id="nl_msg"></span>
        </li>
      </ul>
    </div>
  </div>
</nav>