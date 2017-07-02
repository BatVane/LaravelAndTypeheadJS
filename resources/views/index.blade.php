
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Index</title>
        <link rel="icon" type="/image/png" href="/img/favicon.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Bootstrap -->
        <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="/font-awesome/css/font-awesome.css" rel="stylesheet">
        <script src="/js/jquery-3.1.1.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/plugins/typehead/bootstrap3-typeahead.js"></script>
    </head>
    <body class="page-index">
            <div class="tabs-container" style="margin:40px;">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a data-toggle="tab" href="#dummy_search_bar">Autocomplete Search</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="chart_tab" class="tab-pane active">
                        <div class="panel-body">
                            <div class="row">
								<form class="navbar-form" name="main_search_form" id="main_search_form" action="/main-search" method="POST">
	                                <div class="input-group">
	                                    {{csrf_field()}}
	                                    <input autocomplete="off" type="text" placeholder="Search employees" class="form-control" name="top-search" id="top-search">
	                                    <div class="input-group-btn">
	                                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
	                                    </div>
	                                </div>
	                            </form>
	                            <script type="text/javascript">
	                                $(document).ready(function() {
	                                    $('#top-search').on('keyup', function(e){
	                                        if(e.which == 13){
	                                            $('#main_search_form').submit();
	                                        }
	                                    });
	                                    $.get("/main-search-autocomplete", function(data){
	                                        $("#top-search").typeahead({
	                                            "items": "all",
	                                            "source": data,
	                                            "autoSelect": false,
	                                            displayText: function(item){
	                                                return item.productName;
	                                            },
	                                            updater: function(item) {
	                                                window.location.href = '/products/' + item.productCode;
	                                            }
	                                        });
	                                    },'json');
	                                });
	                            </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>
