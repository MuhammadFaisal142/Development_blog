<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard | </title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <!-- Bootstrap -->
    <link href="{{ asset('admin')}}/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('admin')}}/vendors/bootstrap/dist/css/table.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('admin')}}/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('admin')}}/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('admin')}}/vendors/bootstrap-datetimepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('admin')}}/build/css/custom.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var textareas = document.querySelectorAll('.no-tinymce');

            if (textareas.length > 0) {
                tinymce.init({
                    selector: 'textarea:not(.no-tinymce)',
                    // other TinyMCE options...
                });
            } else {
                tinymce.init({
                    selector: 'textarea',
                    // other TinyMCE options...
                });
            }
        });
    </script>



  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{ route('dashboard')}}" class="site_title nav-link" {{ (request()->is('admin/dashboard')) ? 'active' : '' }}><i class="fa fa-paw"></i> <span>Dashboard!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->

            <div class="profile clearfix">
              <div class="profile_pic">
                <img style="
                height: 55px;" src="@if($user->image) {{ asset($user->image) }} @else {{ asset('website/images/user.png') }} @endif" alt="" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ $user->name }}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>

                <ul class="nav side-menu">
                     <li><a href="{{ route('dashboard')}}" target="_blank"><i class="fa fa-tachometer"></i>Dashboard</a>
                     <li><a href="{{ route('website')}}" target="_blank"><i class="fa fa-home"></i>View Website</a>
                    </li>
                    <li><a href="{{ route('category.index') }}"><i class="fa fa-folder"></i> Category</a></li>
                    <li><a href="{{ route('tag.index') }}"><i class="fa fa-tag"></i> Tags</a></li>
                    <li><a href="{{ route('post.index') }}"><i class="fa fa-edit
                        "></i> Post</a></li>
                    <li><a href="{{ route('user.index') }}"><i class="fa fa-user
                        "></i>Users</a></li>
                    <li><a href="{{ route('contact.index') }}"><i class="fa fa-envelope
                        "></i>Contact Massages</a></li>


                  <li><a href="{{ route('user.profile') }}"><i class="fa fa-user"></i>Your Profile</a></li>


                  <li><a href="{{ route('setting.index') }}"><i class="fa fa-cogs"></i>Setting</a></li>

                  <li>
                    <a href="{{ route('admin.logout') }}" style="color: red;">
                        <i class="fa fa-sign-out"></i> Logout
                    </a>
                </li>

                </ul>
                <ul>

                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">

              </nav>
            </div>
          </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
       @yield('content')
       </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>


    <!-- jQuery -->
    <script src="{{ asset('admin')}}/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="{{ asset('admin')}}/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="{{ asset('admin')}}/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="{{ asset('admin')}}/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.min.js" integrity="sha512-7U4rRB8aGAHGVad3u2jiC7GA5/1YhQcQjxKeaVms/bT66i3LVBMRcBI9KwABNWnxOSwulkuSXxZLGuyfvo7V1A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- jQuery Sparklines -->
    <script src="{{ asset('admin')}}/vendors/Flot/source/jquery.sparkline.min.js"></script>
    <!-- Flot -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/4.2.6/jquery.flot.js" integrity="sha512-b0/xA9839WwDovAHA0nMyu/6/Vtd58xyMub+i9MRpz7Lv6PbeasD5Ww4SB3QEZHC/KZTsj1+cJFJY9Ivei1wfQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/4.2.6/jquery.flot.pie.min.js" integrity="sha512-tok3wODGpLPrvlJ4RIoYCfN1zsNynuGrESF9XssU7GoI5M04W8GtKZ7eKYsmRZTjKteglP8FYWZ5Y6/3Efv7IA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/4.2.6/jquery.flot.time.min.js" integrity="sha512-wARN3zVErYletJDgWZddKYlnRbWf8FLc/+CjmKF4TqXHu728ENDyTfpekd5YIK3VvjSZwGGS/pSNwkY4lvsNZA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/4.2.6/jquery.flot.stack.min.js" integrity="sha512-tQbHmmMWvKjuUrOkOP9R2XERvLQeae8QR1TRwvwQlBVNr/QtFtaq33RbqIufdPUvHKb0nqlTdH4TFpYp5R5Ryg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/4.2.6/jquery.flot.resize.min.js" integrity="sha512-lYwbi9l8oGVDGhETmeuz7IzL395KVM6j2Uiys4ypuRHLLhzXl8q4WzV/98pg6mgewkZExl/NMXUA/AxVZW/+uQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('admin')}}/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="{{ asset('admin')}}/vendors/Flot/source/jquery.flot.spline.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot.curvedlines@1.1.1/curvedLines.min.js"></script>
    <!-- DateJS -->
    <script src="{{ asset('admin')}}/vendors/DateJS/build/date.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('admin')}}/vendors/Flot/source/moment.min.js"></script>
    <script src="{{ asset('admin')}}/vendors/Flot/source/jquery.daterangepicker.min.js"></script>
    <script src="{{ asset('admin')}}/vendors/Flot/source/alert_code.js"></script>

    <!-- Custom Theme S cripts -->
    <script src="{{ asset('admin')}}/build/js/custom.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch(type){
           case 'info':
           toastr.info(" {{ Session::get('message') }} ");
           break;

           case 'success':
           toastr.success(" {{ Session::get('message') }} ");
           break;

           case 'warning':
           toastr.warning(" {{ Session::get('message') }} ");
           break;

           case 'error':
           toastr.error(" {{ Session::get('message') }} ");
           break;
        }
        @endif
       </script>
  </body>
</html>
