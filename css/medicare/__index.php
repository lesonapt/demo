<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="sonla" content="ans-asia">
    <link rel="shortcut icon" href="favicon.ico">

    <title>顧客リスト</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="publich/css/common.css" rel="stylesheet">
    <link href="publich/css/fixed-table.css" rel="stylesheet">
    <link href="publich/css/jquery-ui.css" rel="stylesheet">
    <link href="publich/css/media.css" rel="stylesheet">
    <!-- form -->
    <link href="publich/css/form/list-customer.css" rel="stylesheet">
  
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="block-heder">
    <div class="navbar navbar-inverse" role="navigation" >
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!--
          <a class="navbar-brand" href="#">A.N.S-asia</a> -->
        </div>
        
        <div class="navbar-collapse collapse">
          <div class="container-fluid">
             <ul class="nav navbar-nav nav-top">
                <li class="active"><a href="/">ダッシュボード</a></li>
                <li><a href="/customer-input.php">アクション</a></li>
				<li><a href="/customer-detail.php">アクション</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">アカウント<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">リスト</a></li>
                    <li><a href="#">加える</a></li>
                    <li><a href="#">編集</a></li>
                    <li class="divider"></li>
                    <li><a href="#">スタート</a></li>
                  </ul>
                </li>
              </ul>
              
              <ul class="nav navbar-nav navbar-right nav-top">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">プロパティ</a></li>
                    <li><a href="#">変更</a></li>
                    <li><a href="#">アップグレード</a></li>
                    <li class="divider"></li>
                    <li><a href="#">ログアウト</a></li>
                  </ul>
                </li>
              </ul>
              
          </div>
        </div><!--/.navbar-collapse -->
      </div>
    </div>
    <div class="container-fluid no-padding" >
        <div class="col-lg-12 col-md-12 action-nav">
            <div class="col-lg-12 col-md-12">
                <ul class="action-icon pull-right">
                    <li ><a href="#" data-toggle="tooltip" title="Search" onclick="dialog( this, event )"><span class="glyphicon glyphicon-search"></span></a></li>
                    <li ><a href="#" data-toggle="tooltip" title="Add"><span class="glyphicon glyphicon-plus" ></span></a></li>                    
                    <li ><a href="#" data-toggle="tooltip" title="Save"><span class="glyphicon glyphicon-ok"></span></a></li>
                    <li ><a href="#" data-toggle="tooltip" title="Remove"><span class="glyphicon glyphicon-remove"></span></a></li>
                    <li ><a href="#" data-toggle="tooltip" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a></li>
                    <li ><a href="#" data-toggle="tooltip" title="Delete"><span class="glyphicon glyphicon-trash"></span></a></li>
               
                </ul>
            </div>
         </div>
    </div>
</div>
    <div class="container-fluid content-main" > <!-- /start container -->
    <div style="position: fixed; height: 1000px;width: 16px;background: #41B39C; left: 0px; top: 0px;">&nbsp;</div>
      <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-content parent-nopadding">
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="row">
                            <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">顧客コード</label></div>
                            <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 "><input type="text" id="datepicker" class="form-control" /></div>
                        </div>
                        <div class="row">
                            <div class=" col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">電話番号</label></div>
                            <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                <input type="text" class="form-control" />
                                <button type="button" class="btn btn-primary btn-xs" onclick="popupModel()" >検索</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">関連事業所コード</label></div>
                            <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                <select class="form-control">
                                    <option>alsd</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="row">
                            <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">担当者コード</label></div>
                            <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                <input type="text" class="form-control required" /><span class="lb-required">(*)</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">利用分類</label></div>
                            <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 "><input type="text" class="form-control" /></div>
                        </div>
                        <div class="row">
                            <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">アフターサービス</label></div>
                            <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 text-left">
                                <input type="text" style="width: 50px;" class="form-control" /> <strong>~</strong> <input style="width: 50px;" type="text" class="form-control" />
                                <input style="" type="checkbox" > 並べ替え
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="row">
                            <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4   text-right"><label class="control-label">事業所</label></div>
                            <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8  text-left"><input type="text" class="form-control" /></div>
                        </div>
                        <div class="row">
                            <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4   text-right"><label class="control-label">事業所</label></div>
                            <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8  text-left"><input type="text" class="form-control" /></div>
                        </div>
                        <div class="row">
                            <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4   text-right"><label class="control-label">事業所</label></div>
                            <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8  "><input type="text" class="form-control" /></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
           </div>   
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-12">
            <div class="table-responsive box">
                <div class="box-header well">
                    <div class="pull-left">
						<div class="pull-left"><span class="glyphicon glyphicon-user"></span> 顧客リスト</div>
						<div class="pull-right paging_number">
							<select class="form-control" style="vertical-align: top; margin-top: 2px;">
								<option>10 盤</option>
								<option>50 盤</option>
								<option>100 盤</option>
							</select>
						</div>
						<div class="clearfix"></div>
					</div>
                    <div class="pull-right">
                        <ul class="pagination">
                          <li><a href="#">&laquo;</a></li>
                          <li><a href="#">1</a></li>
                          <li><a href="#" class="active">2</a></li>
                          <li><a href="#">3</a></li>
                          <li><a href="#">4</a></li>
                          <li><a href="#">5</a></li>
                          <li><a href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
                <div class="box-content">
                    <table class="table table-bordered tb-head">
                        <thead>
                            <tr>
                                <th class="text-center"><input type="checkbox" class="checkbox-master" onclick="selectAll()" /></th>
                                <th>顧客コード</th>
                                <th>顧客名称</th>
                                <th>住所</th>
                                <th>電話番号</th>
                                <th>利用分類</th>
                            </tr>
                        </thead>
                    </table>
                    <div class="las">
                        <table class="table table-bordered tb-body">
                            <tbody>
                                <tr>
                                    <td class="text-center"><input type="checkbox" class="checkbox-item" /></td>
                                    <td>0001</td>
                                    <td>顧客リスト</td>
                                    <td>顧客リスト</td>
                                    <td>No.1</td>
                                    <td>10.000$</td>
                                </tr>
                                <tr>
                                    <td class="text-center"><input type="checkbox" class="checkbox-item" /></td>
                                    <td>0002</td>
                                    <td>顧客リスト</td>
                                    <td>顧客リスト</td>
                                    <td>No.1</td>
                                    <td>10.000$</td>
                                </tr>
                                <tr>
                                    <td class="text-center"><input type="checkbox" class="checkbox-item" /></td>
                                    <td>0002</td>
                                    <td>顧客リスト</td>
                                    <td>顧客リスト</td>
                                    <td>No.1</td>
                                    <td>10.000$</td>
                                </tr>
                                <tr>
                                    <td class="text-center"><input type="checkbox" class="checkbox-item" /></td>
                                    <td>0002</td>
                                    <td>顧客リスト</td>
                                    <td>顧客リスト</td>
                                    <td>No.1</td>
                                    <td>10.000$</td>
                                </tr>
                                <tr>
                                    <td class="text-center"><input type="checkbox" class="checkbox-item" /></td>
                                    <td>0002</td>
                                    <td>顧客リスト</td>
                                    <td>顧客リスト</td>
                                    <td>No.1</td>
                                    <td>10.000$</td>
                                </tr>
                                <tr>
                                    <td class="text-center"><input type="checkbox" class="checkbox-item" /></td>
                                    <td>0002</td>
                                    <td>顧客リスト</td>
                                    <td>顧客リスト</td>
                                    <td>No.1</td>
                                    <td>10.000$</td>
                                </tr>
                                <tr>
                                    <td class="text-center"><input type="checkbox" class="checkbox-item" /></td>
                                    <td>0002</td>
                                    <td>Jame</td>
                                    <td>CEO Cocacola</td>
                                    <td>No.1</td>
                                    <td>10.000$</td>
                                </tr>
                                <tr>
                                    <td class="text-center"><input type="checkbox" class="checkbox-item" /></td>
                                    <td>0002</td>
                                    <td>Jame</td>
                                    <td>CEO Cocacola</td>
                                    <td>No.1</td>
                                    <td>10.000$</td>
                                </tr>
                                <tr>
                                    <td class="text-center"><input type="checkbox" class="checkbox-item" /></td>
                                    <td>0002</td>
                                    <td>Jame</td>
                                    <td>CEO Cocacola</td>
                                    <td>No.1</td>
                                    <td>10.000$</td>
                                </tr>
                        </tbody>
                        </table>
                    </div>
                </div>
  
              </div>
            </div>
        </div>
      </div>

    </div> <!-- /container -->

    <script src="publich/js/jquery-1.11.0.min.js"></script>
    <script src="publich/js/jquery.alerts.js"></script>
    <script src="publich/js/common.js"></script>
    <script src="publich/js/jquery-ui.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
    <script>
        $(function () {
           
            getwidth() ;
            $( "#datepicker" ).datepicker({
                showOn: "button",
                buttonImage: "./publich/images/calendar.gif",
                buttonImageOnly: true
            });
            unCheckBoxMaster();
            //$('li').attr('disabled', true); //add
            //$('li a').removeAttr('data-toggle'); //remove
            /**
            * show tooltip
            **/
             $('[data-toggle="tooltip"]').tooltip({'placement': 'bottom'});
        });
        
        $( window ).resize(function() {
            //getwidth();
			$(window).trigger('zoom');
        });
        
        function getwidth(offset) {
			$('table.tb-head').width($('table.tb-body'));
            $('table.tb-body tr:eq(0) td').each(function(index, obj) {
                var wi = $(this).width();
				//var wip = $(this).offsetParent().width();
				//var percent = 100*wi/wip;
				//var percent = Math.round(100*wi/wip);
				$(this).width(wi + 'px');
				$("table.tb-head th:eq( "+index+" )").width(wi + 'px');
                // if( index < 5 ){
                    // $("table.tb-head th:eq( "+index+" )").width(wi);
                // }
           });
        }
		$(window).on('zoom', function() {
			 getwidth();
		});
        /*
        * Checkbox select all
        */
        var totalCheckboxItem = 0;
        function selectAll() {
        	var checkMaster = $('.checkbox-master');
        	if( checkMaster.is(':checked')) {
        	    totalCheckboxItem = 0;
        		$('.checkbox-item').each( function(index, obj) {
        			$(this).prop('checked', true);
                    totalCheckboxItem++;
        		});
        	} else {
        	    totalCheckboxItem = 0;
        		$('.checkbox-item').each( function() {
        			$(this).prop('checked', false);
        		});
        	}
        }
        /*
        * Un checkbox master
        */
        function unCheckBoxMaster() {
            
            $('.checkbox-item').click(function() {
                if( $(this).is(':checked') ) {
                    totalCheckboxItem++;
                } else {
                    totalCheckboxItem-=1;
                }
                if( totalCheckboxItem < $('.checkbox-item').length ){
                    $('.checkbox-master').prop('checked', false);
                }
                if( totalCheckboxItem == $('.checkbox-item').length ) {
                    $('.checkbox-master').prop('checked', true);
                }
            });
        }
        
       
    </script>
  </body>
</html>