<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Language" content="en">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>iGrowers - iGrowers Information Hub</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
	<meta name="description" content="This is an example dashboard created using build-in elements and components.">
	<meta name="msapplication-tap-highlight" content="no">
	<link href="{{ asset('./main.css') }}" rel="stylesheet">
	<link href="{{ asset('./assets3/js/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet" />
	<!-- other Scripts -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" media="screen">
  <style>
  </style>
</head>
<body>
	<div class="app-container app-theme-white body-tabs-shadow fixed-header">
		<div class="app-header header-shadow">
			<div class="app-header__logo">
                <a href="{{ url('/') }}"><img src="{{ asset('images/image.png') }}" style="width:100px;height:50px;"></a>
		</div>    
			<div class="app-header__content">
				<div class="app-header-right">
					<div class="row">
                            <div class="col-md-6">
                                <a style="color: #66BB6A;" href="javascript:history.back()" type="button" data-toggle="tooltip" data-placement="bottom" title="Back">
                                    <i class="fa fa-lg fa-arrow-left" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="col-md-6">
                              <a href="{{ url('/') }}" style="color: red" href="#" type="button" data-toggle="tooltip" data-placement="bottom" title="Close">
                                 <i class="fa fa-lg fa-times"></i>

                             </a>
                         </div>
                     </div>  
				</div>
			</div>
		</div>     
		<div class="app-main">  
          <div class="app-main__outer">
            <div class="app-main__inner">
                <div class="app-page-title">
                    <div class="page-title-wrapper">
                        <div class="page-title-heading">
                            <div>iGrowers Group Admins
                            </div>
                        </div>
                        <div class="page-title-actions">
                            <div class="d-inline-block dropdown">
                                <a href="{{ route('admins.home') }}" type="button" class="btn btn-success" class=""><i class="fa fa-home"></i> Home</a>
                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                                    <span class="btn-icon-wrapper pr-2 opacity-7">
                                        <i class="fas fa-business-time"></i>
                                    </span>
                                    Options
                                </button>
                                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('admins.register-farmer') }}" class="nav-link">
                                                <i class="nav-link-icon lnr-inbox"></i>
                                                <span>
                                                    Register Farmers
                                                </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admins.register-farms') }}" class="nav-link">
                                                <i class="nav-link-icon lnr-inbox"></i>
                                                <span>
                                                    Register Fields
                                                </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admins.register-crop') }}" class="nav-link">
                                                <i class="nav-link-icon lnr-book"></i>
                                                <span>
                                                    Register Season
                                                </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admins.view-harvest') }}" class="nav-link">
                                                <i class="nav-link-icon lnr-picture"></i>
                                                <span>
                                                    Crop Harvests
                                                </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admins.services') }}" class="nav-link">
                                                <i class="nav-link-icon lnr-file-empty"></i>
                                                <span>
                                                    Reports
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <button type="button" data-toggle="tooltip" title="Logout" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                                <a href="{{ route('admins.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-power-off"></i>
                                </a>
                                <form action="{{ route('admins.logout') }}" method="post" id="logout-form">@csrf</form> 
                            </button>
                            <div class="d-inline-block dropdown">
                            </div>
                        </div>   
                    </div>
                </div>            
                <!-- content here   -->
                
                @yield('content')
                <!-- End content -->
            </div>
        </div>  
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    </div>
    <div class="app-wrapper-footer">
        <div class="app-footer">
            <div class="app-footer__inner">
                <div class="app-footer-left">
                    <ul class="nav">
                        <li class="nav-item">
                            <p class="text-xs-center crtext">&copy; 2021 iGrowers. All Rights Reserved.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- jQuery Js -->
<script src="{{ asset('./assets3/js/jquery-1.10.2.js') }}"></script>
<!-- Bootstrap Js -->
<script src="{{ asset('./assets3/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('./assets2/scripts/main.js') }}"></script>
<script src="{{ asset('./assets3/js/dataTables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('./assets3/js/dataTables/dataTables.bootstrap.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
        $('#cropstable1').dataTable();
        $('#cropstable2').dataTable({
            bLengthChange: true,
            "lengthMenu": [ [5, 10, 15, 25, 50, 100, -1], [5, 10, 15, 25, 50, 100, "All"] ],
            "iDisplayLength": 5,
            bInfo: false,
            responsive: true,
            "bAutoWidth": false
        });
        $('#cropstable3').dataTable();
        $('#cropstable4').dataTable();
    });
</script>
@stack('scripts')
</body>
</html>