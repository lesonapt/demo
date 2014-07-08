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

    <title>新システム</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="publich/css/common.css" rel="stylesheet">
    <link href="publich/css/fixed-table.css" rel="stylesheet">
    <link href="publich/css/jquery-ui.css" rel="stylesheet">
    <link href="publich/css/media.css" rel="stylesheet">
    <!-- font  -->
     <link href="publich/css/font-awesome.css" rel="stylesheet">
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
        .box-content .col-input input.input-pass {
            width: 232%;
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
          <div class="container-fluid">
             <ul class="nav navbar-nav nav-top chilr1">
                <li class="active dropdown">
                	   <a href="#" class="dropdown-toggle" data-toggle="dropdown">受注管理<b class="caret"></b></a>
	                  <ul class="dropdown-menu">
	                    <li>
	                       <a href="#">顧客管理情報参照・登録</a>
	                       <ul>
	                       		<li><a href="/">顧客管理情報 一覧</a> </li>
	                       		<li><a href="customer-input.php">顧客管理情報 登録</a> </li>
	                       		<li><a href="customer-detail.php">顧客情報</a> </li>
	                       </ul>
	                    </li>
	                    <li><a href="#">アフターサービス印刷</a></li>
	                    <li><a href="#">得意先管理情報 参照・登録</a></li>
	                    <li><a href="#">受注情報参照・変更／出荷指示</a></li>
	                    <li><a href="#">受注商品変更</a></li>
	                  </ul>
                </li>
                
                <li class="chilr1"><a href="/customer-input.php">レンタル管理</a></li>
					 <li class="chilr1"><a href="/customer-detail.php">発注・仕入管理</a></li>
					 <li class="chilr1"><a href="/customer-input.php">支払管理</a></li>
					 
					 <li class="nav-li-top-more dropdown" >
					 	<a href="#" class="dropdown-toggle" data-toggle="dropdown">もっと見る<b class="caret"></b></a>
					 	<ul class="dropdown-menu">
					 	   <li class="chilr1"><a href="/customer-detail.php">在庫管理</a></li>
					 		<li class="chilr1"><a href="/customer-input.php">棚卸管理</a></li>
							 <li class="chilr1"><a href="/customer-detail.php">売上管理</a></li>
							 <li class="chilr1"><a href="/customer-input.php">請求・入金管理</a></li>
							 <li class="chilr1"><a href="/customer-detail.php">管理帳票</a></li>
							 <li class="chilr1"><a href="/customer-detail.php">業務支援</a></li>
							 <li class="chilr1"><a href="/customer-input.php">マスタ管理</a></li>
							 <li class="chilr1"><a href="/customer-detail.php">システム管理</a></li>
					 	</ul>
					 </li>
					 <li class="chilr1 hide-more"><a href="/customer-input.php">棚卸管理</a></li>
					 <li class="chilr1 hide-more"><a href="/customer-detail.php">売上管理</a></li>
					 <li class="chilr1 hide-more"><a href="/customer-input.php">請求・入金管理</a></li>
					 <li class="chilr1 hide-more"><a href="/customer-detail.php">管理帳票</a></li>
					 <li class="chilr1 hide-more"><a href="/customer-detail.php">業務支援</a></li>
					 <li class="chilr1 hide-more"><a href="/customer-input.php">マスタ管理</a></li>
					 <li class="chilr1 hide-more"><a href="/customer-detail.php">システム管理</a></li>
              </ul>
              
              <ul class="nav navbar-nav navbar-right nav-top" style="margin-left: 0px;">
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
                <div class="pull-left logo">
                    <img alt="logo" class="logo thumbnail" src="/publich/images/ans-asia.png" height="50px">
                </div>
                <ul class="action-icon pull-right">
                    <li ><a href="#" data-toggle="tooltip" title="Search" ><span class="glyphicon glyphicon-search"></span></a></li>
                    <li ><a href="#" data-toggle="tooltip" title="Add"><span class="glyphicon glyphicon-plus" ></span></a></li>                    
                    <li ><a href="#" data-toggle="tooltip" title="Save" onclick="dialog( this, event )"><span class="glyphicon glyphicon-ok"></span></a></li>
                    <li ><a href="#" data-toggle="tooltip" title="Remove"><span class="glyphicon glyphicon-remove"></span></a></li>
                    <li ><a href="#" data-toggle="tooltip" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a></li>
                    <li ><a href="#" data-toggle="tooltip" title="Delete"><span class="glyphicon glyphicon-trash"></span></a></li>
               
                </ul>
                <div class="clearfix"></div>
            </div>
         </div>
    </div>
</div>

<div class="container-fluid content-main" > <!-- /start container -->  
     <div class="theme">
	    	<div class="theme-box">
	    		<div class="color-item color-1" theme = "theme-1">&nbsp;</div>
	    		<div class="color-item color-2" theme = "theme-2">&nbsp;</div>
	    		<div class="color-item color-3" theme = "theme-3">&nbsp;</div>
	    		<div class="color-item color-4" theme = "theme-4">&nbsp;</div>
	    		<div class="color-item color-5" theme = "theme-5">&nbsp;</div>
	    		<div class="color-item color-6" theme = "theme-6">&nbsp;</div>
	    		<div class="color-item color-7" theme = "theme-7">&nbsp;</div>
	    		<div class="color-item color-8" theme = "theme-8">&nbsp;</div>
	    		<div class="color-item color-9" theme = "theme-9">&nbsp;</div>
	    		<div class="color-item color-10" theme = "theme-10">&nbsp;</div>
	    		<div class="color-item color-11" theme = "theme-11">&nbsp;</div>
	    		<div class="color-item color-12" theme = "theme-12">&nbsp;</div>
	    		<div class="color-item color-13" theme = "theme-13">&nbsp;</div>
	    		<div class="color-item color-14" theme = "theme-14">&nbsp;</div>
	    		<div class="color-item color-15" theme = "theme-15">&nbsp;</div>
	    		<div class="color-item color-16" theme = "theme-16">&nbsp;</div>
	    		<div class="color-item color-17" theme = "theme-17">&nbsp;</div>
	    		<div class="color-item color-18" theme = "theme-18">&nbsp;</div>
	    		<div class="color-item color-19" theme = "theme-19">&nbsp;</div>
	    		<div class="color-item color-20" theme = "theme-20">&nbsp;</div>
	    		<div class="clearfix"></div>
	    		<div class="theme-button"><i class="fa fa-th" onclick="openTheme(-1);"></i></div>
	    	</div>
	  </div>
      
      <div class="row">
        <div class="col-md-12">
        
            <div class="box">
                <div class="box-header well">
                    <div class="pull-left" ><span class="glyphicon glyphicon-user"></span>顧客基本情報</div>
                    <div class="clearfix"></div>
                </div>
                <div class="box-content parent-nopadding">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">顧客コード：</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control"  disabled="disabled" />
                                </div>
                            </div>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="row">
                            <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">顧客名称 姓： </label></div>
                            <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                <input type="text" id="datepicker" class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">顧客名称ﾌﾘｶﾞﾅ 姓：</label></div>
                            <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                <input type="text" class="form-control required" /><span class="lb-required ">(*)</span>                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">郵便番号：</label></div>
                            <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                <input type="text" class="form-control" style="width: 50px;" /> - <input class="form-control" type="text" style="width: 50px;" />
                                <button class="btn btn-primary btn-xs ">住所検索</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="row">
                            <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">顧客名称 名：</label></div>
                            <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                <input type="text" id="datepicker" class="form-control " />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">顧客名称ﾌﾘｶﾞﾅ 名：</label></div>
                            <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                <input type="text" class="form-control required" /><span class="lb-required ">(*)</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">都道府県：</label></div>
                            <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                            	<div class="div-select-box">
                                <select >
                                    <option selected="selected"></option>
                                    <option value="1">Ha noi</option>
                                    <option value="2">Tphcm</option>
                                    <option value="3">Da Nang</option>
                                </select>
                               </div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">住所1（市区町村）：</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" id="datepicker" class="form-control required" /><span class="lb-required ">(*)</span>
                                </div>
                            </div>
                        </div>
                     </div>
                     <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">住所2（番地ビル等）：</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" id="datepicker" class="form-control required" /><span class="lb-required ">(*)</span>
                                </div>
                            </div>
                        </div>
                     </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="row">
                            <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">電話番号：</label></div>
                            <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                <input type="text"  class="form-control required" style="width: 50px;"/>
                                -
                                <input type="text" class="form-control required" style="width: 50px;"/>
                                -
                                <input type="text"  class="form-control required" style="width: 50px;"/>
                                <span class="lb-required ">(*)</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">連絡先区分：</label></div>
                            <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                <div class="div-select-box">
	                                <select class="form-control">
	                                    <option name="home" selected="selected">自宅</option>
			                					<option name="cellular">携帯</option>
			                					<option name="work">お勤め先</option>
			                					<option name="other">その他</option>
			                					<option name="none">電話なし</option>
	                                </select>
                                </div>
                            </div>
                        </div>
                    </div>
                 
                    
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="row">
                            <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">FAX番号：</label></div>
                            <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                <input type="text"  class="form-control required" style="width: 50px;"/>
                                -
                                <input type="text" class="form-control required" style="width: 50px;"/>
                                -
                                <input type="text"  class="form-control required" style="width: 50px;"/>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">性別：</label></div>
                            <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                            			<div class="div-radio"> 
									        <label class="act sex">
									            <input type="radio" name="sex" />
									            <i class="fa fa-dot-circle-o "></i><span class="span-label">男性</span>
									        </label>
									        <label class="sex">
									            <input type="radio" name="sex" />
									            <i class="fa fa-circle-o"></i><span class="span-label">女性</span>
									        </label>
		  
		   								 </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">利用分類：</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <div class="div-select-box">
	                                    <select class="form-control">
	                                        <option value="0">介護保険</option>
			                    					<option value="0">個人レンタル</option>
			                    					<option value="0" selected="selected">販売</option>
			                    					<option value="0">その他</option>
	                                    </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="row">
                            <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">関連事業所コード：</label></div>
                            <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                <input type="text" class="form-control" />
                                <button class="btn btn-primary btn-xs btn-search" style="left: -77px">得意先検索</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">担当者コード：</label></div>
                            <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                               <input type="text" class="form-control" />
                               <button class="btn btn-primary btn-xs btn-search" style="left: -77px;">担当者検索</button>
                            </div>
                        </div>
                    </div>
                    
                     <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="row">
                            <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">関連事業所名称： </label></div>
                            <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                <input type="text" class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">担当者名称：</label></div>
                            <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                <input type="text" class="form-control" />
                            </div>
                        </div>
                    </div>
                
                    <div class="clearfix"></div>
                </div>
              </div>
              
            </div>
        </div>
        
</div> <!-- /container -->

    <script src="publich/js/jquery-1.11.0.min.js"></script>
    <script src="publich/js/jquery.alerts.js"></script>
    <script src="publich/js/common.js"></script>
     <script src="publich/js/medicareplugin.js"></script>
    <script src="publich/js/jquery-ui.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
    <script>
        $(function () {
        	 $("input[name='sex']").radioBox('sex');
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
