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
    <style>
        .tab-content {
            padding: 10px;
            border: 1px solid #eee;
            border-top: 0px;
        }

        .box-content .col-input input[type='text'], .box-content .col-input select {
            width: 100%;
        }
        .input-full-size .col-input {
            padding-left: 0px;
            padding-right: 5px;
        }
        .box-content .col-input input.input-pass {
            width: 251.7%;
        }
    </style>
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
          <div class="container-fluid" >
             <ul class="nav navbar-nav nav-top">
                <li><a href="/">ダッシュボード</a></li>
                <li><a href="/customer-input.php">アクション</a></li>
				<li class="active"><a href="/customer-detail.php">アクション</a></li>
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
                    <li ><a href="#" data-toggle="tooltip" title="Save"><span class="glyphicon glyphicon-ok"></span></a></li>
                    <li ><a href="#" data-toggle="tooltip" title="Refresh"><span class="glyphicon glyphicon-refresh"></span></a></li>
                    <li class="border-right"><a href="http:\\google.com" data-toggle="tooltip" title="Back"><span class="glyphicon glyphicon-share-alt" ></span></a></li>                    
                    
                </ul>
            </div>
         </div>
    </div>
</div>

<div class="container-fluid content-main" > <!-- /start container -->  
      <div style="position: fixed; height: 1000px;width: 16px;background: #41B39C; left: 0px; top: 0px;">&nbsp;</div>
      <div class="row">
          <div class="col-md-12">
            <ul class="nav nav-tabs">
                  <li class="active"><a href="#home" data-toggle="tab">担当者コード</a></li>
                  <li><a href="#profile" data-toggle="tab">担当者コード</a></li>
                  <li><a href="#messages" data-toggle="tab">担当者コード</a></li>
                  <li><a href="#settings" data-toggle="tab">担当者コード</a></li>
            </ul>    
            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane active" id="home">
                 <div class="box input-full-size">
                    <div class="box-header well">
                        <div class="pull-left"> 顧客リスト</div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="box-content parent-nopadding">
                       <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row col-lg-6 col-md-6 col-sm-12">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">担当者コード</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable input-pass" value="0000000187" disabled=""/>
                                </div>
                            </div>
                        </div>
      
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">担当者コード</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control required input-disable" disabled="" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">担当者コード</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                     <input type="text" class="form-control input-disable" disabled="" value=""/>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>  
                    </div>
                  </div>
                  
                  <div class="box input-full-size">
                    <div class="box-header well">
                        <div class="pull-left"> 顧客リスト</div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="box-content parent-nopadding">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row col-lg-6 col-md-6 col-sm-12">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">担当者コード</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable input-pass" disabled="" value=""/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">担当者コード</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                     <input type="text" class="form-control input-disable" disabled="" value=""/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">利用分類</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 "> 
                                    <input type="text" class="form-control input-disable" disabled="" value=""/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">担当者コード</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable" disabled="" value=""/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">利用分類</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable" disabled="" value=""/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row col-lg-6 col-md-6 col-sm-12">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">担当者コード</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable input-pass" disabled="" value=""/>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>  
                    </div>
                  </div>
                  
                  <div class="box input-full-size">
                    <div class="box-header well">
                        <div class="pull-left"> 顧客リスト</div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="box-content parent-nopadding">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">担当者コード</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                     <input type="text" class="form-control input-disable" disabled="" value=""/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">利用分類</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 "> 
                                    <input type="text" class="form-control input-disable" disabled="" value=""/>
                                </div>
                            </div>
                        </div>
                 
                       
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">担当者コード</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable" disabled="" value=""/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">利用分類</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable" disabled="" value=""/>
                                </div>
                            </div>
                        </div>
                         <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row col-lg-6 col-md-6 col-sm-12">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">担当者コード</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable input-pass" disabled="" value=""/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">担当者コード</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable" disabled="" value=""/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">利用分類</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable" disabled="" value=""/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">担当者コード</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable" disabled="" value=""/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">利用分類</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable" disabled="" value=""/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row col-lg-6 col-md-6 col-sm-12">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">担当者コード</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable input-pass" disabled=""/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row col-lg-6 col-md-6 col-sm-12">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">担当者コード</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable input-pass" disabled=""/>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>  
                    </div>
                  </div>
                
                  
              </div>
              <div class="tab-pane" id="profile">...</div>
              <div class="tab-pane" id="messages">...</div>
              <div class="tab-pane" id="settings">...</div>
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
            /*
            * show tooltip
            **/
             $('[data-toggle="tooltip"]').tooltip({'placement': 'bottom'});
             /**
             *
             */
        });
       
        
        

    </script>
  </body>
</html>
