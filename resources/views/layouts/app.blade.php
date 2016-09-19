<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Admin</title>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.6/paper/bootstrap.min.css" rel="stylesheet">
    <!-- You can change bootswatch theme easily learn more https://bootswatch.com/ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <style>
        body {
            padding-top: 70px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">Laravel Admin</a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{ url('/admin') }}">Dashboard <span class="sr-only">(current)</span></a></li>
                    <li><a href="{{ url('/admin/users') }}">Users</a></li>
                    <li><a href="{{ url('/admin/roles') }}">Roles</a></li>
                    <li class="dropdown">
                        <a href="{{ url('/admin/permissions') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Permissions <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('/admin/permissions') }}">All Permissions</a></li>
                            <li><a href="{{ url('/admin/give-role-permissions') }}">Give Role Permissions</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('/admin/departments') }}">Departments</a></li>
                    <li><a href="{{ url('/admin/designations') }}">Designations</a></li>
                    <li><a href="{{ url('/tickets') }}">Tickets</a></li>  
                    <li><a href="{{ url('/admin/calendar') }}">Company Calendar</a></li> 
                                      
                    <!--<li><a href="{{ url('/admin/generator') }}">Generator</a></li>-->
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li><a href="#">{{ Auth::user()->name }}</a></li>
                        <li><a href="{{ url('/logout') }}">Logout</a></li>
                    @endif
                </ul>
            </div>

        </div><!-- /.container-fluid -->
    </nav>

    <div class="container">
        @if (Session::has('flash_message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('flash_message') }}
            </div>
        @endif

        @yield('content')
    </div>

    <hr/>

    <div class="container">
        &copy; {{ date('Y') }}. Created by <a href="#">Logic Heart</a>
        <br/>
    </div>

    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/plug-ins/505bef35b56/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    <script src="//cdn.datatables.net/responsive/1.0.7/js/dataTables.responsive.min.js"></script>
    <script>
        $('.table').DataTable({
            processing: false,
            serverSide: true,
            responsive: true,
            lengthMenu: {{ json_encode($setting->grab('length_menu')) }},
            ajax: '{!! route($setting->grab('main_route').'.data') !!}',
            language: {
                decimal:        "{{ trans('ticketit::lang.table-decimal') }}",
                emptyTable:     "{{ trans('ticketit::lang.table-empty') }}",
                info:           "{{ trans('ticketit::lang.table-info') }}",
                infoEmpty:      "{{ trans('ticketit::lang.table-info-empty') }}",
                infoFiltered:   "{{ trans('ticketit::lang.table-info-filtered') }}",
                infoPostFix:    "{{ trans('ticketit::lang.table-info-postfix') }}",
                thousands:      "{{ trans('ticketit::lang.table-thousands') }}",
                lengthMenu:     "{{ trans('ticketit::lang.table-length-menu') }}",
                loadingRecords: "{{ trans('ticketit::lang.table-loading-results') }}",
                processing:     "{{ trans('ticketit::lang.table-processing') }}",
                search:         "{{ trans('ticketit::lang.table-search') }}",
                zeroRecords:    "{{ trans('ticketit::lang.table-zero-records') }}",
                paginate: {
                    first:      "{{ trans('ticketit::lang.table-paginate-first') }}",
                    last:       "{{ trans('ticketit::lang.table-paginate-last') }}",
                    next:       "{{ trans('ticketit::lang.table-paginate-next') }}",
                    previous:   "{{ trans('ticketit::lang.table-paginate-prev') }}"
                },
                aria: {
                    sortAscending:  "{{ trans('ticketit::lang.table-aria-sort-asc') }}",
                    sortDescending: "{{ trans('ticketit::lang.table-aria-sort-desc') }}"
                },
            },
            columns: [
                { data: 'id', name: 'ticketit.id' },
                { data: 'subject', name: 'subject' },
                { data: 'status', name: 'ticketit_statuses.name' },
                { data: 'updated_at', name: 'ticketit.updated_at' },
                { data: 'agent', name: 'users.name' },
            ]
        });
    </script>
</body>
</html>
