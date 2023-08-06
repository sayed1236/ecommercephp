<!DOCTYPE html>
    <html lang="IR-fa" dir="rtl">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <!-- Icons -->
        
        <link href='../adminassets/css/font-awesome.min.css' rel="stylesheet">
        <link href='../adminassets/css/simple-line-icons.css' rel="stylesheet">
        <!-- Main styles for this application -->
        <link href='../adminassets/dest/style.css' rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

        
    </head>
    <body class="navbar-fixed sidebar-nav fixed-nav">
        <header class="navbar">
            <div class="container-fluid">
                <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>
                <a class="navbar-brand" href="#" style="background-image:awd"></a>
                <ul class="nav navbar-nav hidden-md-down">
                    <li class="nav-item">
                        <a class="nav-link navbar-toggler layout-toggler" href="#">&#9776;</a>
                    </li>


                </ul>
                <ul class="nav navbar-nav pull-left hidden-md-down">

                    <li class="nav-item dropdown" style="margin-left: 10px !important">
                       </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            <span class="hidden-md-down">settings</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-header text-xs-center">
                                <strong>{{ __('words.settings') }}</strong>
                            </div>
                            <a class="dropdown-item" href="#"><i
                                    class="fa fa-user"></i> {{ __('words.user settings') }}</a>
                            <div class="divider"></div>

                            <a class="dropdown-item" href="#" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                {{ __('words.logout') }}
                            </a>

                            <form id="logout-form" action="" method="POST" class="d-none">
                                @csrf
                            </form>

                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            <span class="hidden-md-down"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">



                        </div>
                    </li>


                    <li class="nav-item">

                    </li>

                </ul>
            </div>
        </header>
        <?php include('sidebar.php')?>
        <!-- Main content -->
        <main class="main">
            <!-- @yield('body') -->
        </main>



        <footer class="footer">
           

        </footer>
        <!-- Bootstrap and necessary plugins -->
        <script src='../adminassets/js/libs/jquery.min.js'></script>
        <script src='../adminassets/js/libs/tether.min.js'></script>
        <script src='../adminassets/js/libs/bootstrap.min.js'></script>
        <script src='../adminassets/js/libs/pace.min.js'></script>

        <!-- Plugins and scripts required by all views -->
        <script src='../adminassets/js/libs/Chart.min.js'></script>

        <!-- CoreUI main scripts -->
        <script src='../adminassets/js/app.js'></script>

        <!-- Plugins and scripts required by this views -->
        <!-- Custom scripts required by this view -->
        <script src="../'adminassets/js/views/main.js'></script>

        <!-- Grunt watch plugin -->


        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
        <script>
            var allEditors = document.querySelectorAll('#editor');
            for (var i = 0; i < allEditors.length; ++i) {
                ClassicEditor.create(allEditors[i]);
            }

            $(document).ready(function() {
                $('.js-example-basic-multiple').select2();
            });
        </script>
       


        <!-- @stack('javascripts') -->
    </body>
    </html>