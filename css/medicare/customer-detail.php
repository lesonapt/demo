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
    <!-- <link href="publich/css/flat-ui.css" rel="stylesheet"> --> 
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
            overflow: auto;
        }

        .box-content .col-input input[type='text'], .box-content .col-input select {
            width: 100%;
        }
        .input-full-size .col-input {
            
            padding-right: 5px;
        }
        .box-content .col-input input.input-pass {
            width: calc(251.7% + 7px); 
        }
        #tab-6 .table .div-radio label {
            height: auto;
            padding: 0;
            top: -13px;
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
      <div class="row" style="margin-top: 10px;">
          <div class="col-md-12">
            <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab-1" data-toggle="tab">顧客情報</a></li>
                  <li><a href="#tab-2" data-toggle="tab">連絡先情報</a></li>
                  <li><a href="#tab-3" data-toggle="tab">認定情報</a></li>
                  <li><a href="#tab-4" data-toggle="tab">レンタル履歴</a></li>
                  <li><a href="#tab-5" data-toggle="tab">購入履歴</a></li>
                  <li><a href="#tab-6" data-toggle="tab">訪問履歴</a></li>
            </ul>    
            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane active" id="tab-1">
                 <div class="box input-full-size">
                    <div class="box-header well">
                        <div class="pull-left">顧客情報 </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="box-content parent-nopadding">
                       <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row col-lg-6 col-md-6 col-sm-12">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">顧客コード：</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable input-pass" value="0000000187" disabled=""/>
                                </div>
                            </div>
                        </div>
      
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">顧客名称：</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control required input-disable" disabled="" value="メディケアー　太郎 "/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">顧客名称ﾌﾘｶﾞﾅ：</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                     <input type="text" class="form-control input-disable" disabled="" value="ﾒﾃﾞｨｹｱｰ ﾀﾛｳ "/>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>  
                    </div>
                  </div>
                  
                  <div class="box input-full-size">
                    <div class="box-header well">
                        <div class="pull-left">顧客基本情報 </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="box-content parent-nopadding">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row col-lg-6 col-md-6 col-sm-12">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">住所：</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable input-pass" disabled="" value="〒XXX-XXXX　●△県○○市△△ "/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">電話番号： </label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                     <input type="text" class="form-control input-disable" disabled="" value="XXX-XXXX-XXXX "/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">生年月日：</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 "> 
                                    <input type="text" class="form-control input-disable" disabled="" value="昭和26年 (西暦 1951年) 11月　11日 "/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">FAX番号： </label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable" disabled="" value="XXX-XXXX-XXXX"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">性別：</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable" disabled="" value="男性 "/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row col-lg-6 col-md-6 col-sm-12">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">現況区分：</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable input-pass" disabled="" value="入院中 " style="color: red;"/>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>  
                    </div>
                  </div>
                  
                  <div class="box input-full-size">
                    <div class="box-header well">
                        <div class="pull-left">顧客詳細情報 </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="box-content parent-nopadding">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">事業所：</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                     <input type="text" class="form-control input-disable" disabled="" value="メディケアセンター　本社"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">地区： </label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 "> 
                                    <input type="text" class="form-control input-disable" disabled="" value="251-0052　　藤沢 "/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">担当者：</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable" disabled="" value="00061　　○○　◆□ "/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">利用分類：</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable" disabled="" value="介護保険 "/>
                                </div>
                            </div>
                        </div>
                         <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row col-lg-6 col-md-6 col-sm-12">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">関連事業所：</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable input-pass" disabled="" value="0000096801　　居宅介護支援事業所○○"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">取引区分： </label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable" disabled="" value="現金売上 "/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">請求先：</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable" disabled="" value="0000000187　　メディケアー　太郎 "/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">支払方法： </label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable" disabled="" value="口座引き落とし "/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">丸め区分： </label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable" disabled="" value="切捨て "/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">税丸め区分：</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable" disabled="" value="切捨て "/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">DM区分：</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable" disabled="" value="なし"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">請求先区分：</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable" disabled="" value="通常"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">請求サイクル：</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable" disabled="" value="6ヵ月分"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">支払予定日：</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable" disabled="" value="月末 "/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">税計算区分： </label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable" disabled="" value="伝票毎"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">与信限度： </label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable" disabled="" value="¥0"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">敬称区分：</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable" disabled="" value="様"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row col-lg-6 col-md-6 col-sm-12">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">備考 社内用：</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable input-pass" disabled=""/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row col-lg-6 col-md-6 col-sm-12">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">備考 社外用：</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable input-pass" disabled=""/>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>  
                    </div>
                  </div>
                
                  
              </div>
              <div class="tab-pane" id="tab-2">
                  <div class="box input-full-size">
                    <div class="box-header well">
                        <div class="pull-left">顧客情報  </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="box-content parent-nopadding">
                       <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row col-lg-6 col-md-6 col-sm-12">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">顧客コード： </label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable input-pass" value="0000000187" disabled=""/>
                                </div>
                            </div>
                        </div>
      
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">顧客名称：</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control required input-disable" disabled="" value="メディケアー　太郎 "/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">顧客名称ﾌﾘｶﾞﾅ：</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                     <input type="text" class="form-control input-disable" disabled="" value="ﾒﾃﾞｨｹｱｰ ﾀﾛｳ "/>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>  
                    </div>
                  </div>
                  <div class="las">
                    <table class="table table-bordered">
                        <tbody>
                            <tr class="odd">
                                <td rowspan="2" align="center" style="vertical-align: middle;">
                                    <div class="div-radio"> 
											        <label class="rd">
											            <input type="radio" name="rd">
											            <i class="fa fa-circle-o "></i>
											        </label>
										      </div>
                                </td>
                                <td align="center">1</td>
                                <td>メディケアー　太郎 </td>
                                <td>本人 </td>
                                <td>〒XXX-XXXX  ●○県■■市○○</td>
                                <td align="center">XXX-XX-XXXX</td>
                                <td>自宅 </td>
                                <td>同居</td>
                            </tr>
                            <tr class="odd">
                                <td colspan="6"></td>
                                <td class="green_text">対象</td>
                            </tr>
                            <tr class="even">
                                <td rowspan="2" align="center" style="vertical-align: middle;">
                                    <div class="div-radio"> 
										        <label class="rd">
										            <input type="radio" name="rd">
										            <i class="fa fa-circle-o "></i>
										        </label>
										       </div>
                                </td>
                                <td align="center">2</td>
                                <td>メディケアー　太郎 </td>
                                <td>本人 </td>
                                <td>〒XXX-XXXX  ●○県■■市○○</td>
                                <td align="center">XXX-XX-XXXX</td>
                                <td>自宅 </td>
                                <td>同居</td>
                            </tr>
                            <tr class="even">
                                <td colspan="6"></td>
                                <td style="color: green;">非対象</td>
                            </tr>
                            <tr class="odd">
                                <td rowspan="2" align="center" style="vertical-align: middle;">
                                    <div class="div-radio"> 
										        <label class="rd">
										            <input type="radio" name="rd">
										            <i class="fa fa-circle-o"></i>
										        </label>
										       </div>
                                </td>
                                <td align="center">3</td>
                                <td>メディケアー　太郎 </td>
                                <td>本人 </td>
                                <td>〒XXX-XXXX  ●○県■■市○○</td>
                                <td align="center">XXX-XX-XXXX</td>
                                <td>自宅 </td>
                                <td>同居</td>
                            </tr>
                            <tr class="odd">
                                <td colspan="6"></td>
                                <td class="green_text">非対象</td>
                            </tr>
                            <tr class="even">
                                <td rowspan="2" align="center" style="vertical-align: middle;">
                                    <div class="div-radio"> 
										        <label class="rd">
										            <input type="radio" name="rd">
										            <i class="fa fa-circle-o"></i>
										        </label>
										       </div>
                                </td>
                                <td align="center">4</td>
                                <td>メディケアー　太郎 </td>
                                <td>本人 </td>
                                <td>〒XXX-XXXX  ●○県■■市○○</td>
                                <td align="center">XXX-XX-XXXX</td>
                                <td>自宅 </td>
                                <td>同居</td>
                            </tr>
                            <tr class="even">
                                <td colspan="6"></td>
                                <td class="green_text">非対象</td>
                            </tr>
                        </tbody>
                    </table>
                  </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="box input-full-size">
                    <div class="box-header well">
                        <div class="pull-left">顧客情報  </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="box-content parent-nopadding">
                       <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row col-lg-6 col-md-6 col-sm-12">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">顧客コード： </label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable input-pass" value="0000000187" disabled=""/>
                                </div>
                            </div>
                        </div>
      
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">顧客名称：</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control required input-disable" disabled="" value="メディケアー　太郎 "/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">顧客名称ﾌﾘｶﾞﾅ：</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                     <input type="text" class="form-control input-disable" disabled="" value="ﾒﾃﾞｨｹｱｰ ﾀﾛｳ "/>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>  
                    </div>
                  </div>
                  <div class="las">
                    <table class="table table-bordered">
                        <tbody>
                            <tr class="odd">
                                <td rowspan="3" align="center" style="vertical-align: middle;">
                                    15<br>
                                    <div class="div-radio"> 
											        <label class="rd2">
											            <input type="radio" name="rd2">
											            <i class="fa fa-circle-o "></i>
											        </label>
										      </div>
                                </td>
                                <td align="center">000000192633</td>
                                <td align="center">1200014201</td>
                                <td>変更申請 </td>
                                <td>要支援</td>
                                <td align="center">140015214</td>
                                <td align="center">1200141164</td>
                                <td>通常</td>
                            </tr>
                            <tr class="odd">
                                <td align="center" class="green_text">2004/01/01</td>
                                <td align="center" class="green_text">2004/03/31</td>
                                <td colspan="3" class="green_text">0000000303  居宅介護支援事業所○○</td>
                                <td align="center" class="green_text">○田　花○子</td>
                                <td class="green_text">0000045890</td>
                            </tr>
                            <tr class="odd">
                                <td colspan="7" height="20px"></td>
                            </tr>
                            <tr class="even">
                                <td rowspan="3" align="center" style="vertical-align: middle;">
                                    14<br>
                                    <div class="div-radio"> 
											        <label class="rd2">
											            <input type="radio" name="rd2">
											            <i class="fa fa-circle-o "></i>
											        </label>
										      </div>
                                </td>
                                <td align="center">000000192633</td>
                                <td align="center">1200014201</td>
                                <td>変更申請 </td>
                                <td>要支援</td>
                                <td align="center">140015214</td>
                                <td align="center">1200141164</td>
                                <td>通常</td>
                            </tr>
                            <tr class="even">
                                <td align="center" class="green_text">2004/01/01</td>
                                <td align="center" class="green_text">2004/03/31</td>
                                <td colspan="3" class="green_text">0000000303  居宅介護支援事業所○○</td>
                                <td align="center" class="green_text">○田　花○子</td>
                                <td class="green_text">0000045890</td>
                            </tr>
                            <tr class="even">
                                <td colspan="7" height="20px"></td>
                            </tr>
                            <tr class="odd">
                                <td rowspan="3" align="center" style="vertical-align: middle;">
                                    13<br>
                                    <div class="div-radio"> 
											        <label class="rd2">
											            <input type="radio" name="rd2">
											            <i class="fa fa-circle-o "></i>
											        </label>
										      </div>
                                </td>
                                <td align="center">000000192633</td>
                                <td align="center">1200014201</td>
                                <td>変更申請 </td>
                                <td>要支援</td>
                                <td align="center">140015214</td>
                                <td align="center">1200141164</td>
                                <td>通常</td>
                            </tr>
                            <tr class="odd">
                                <td align="center" class="green_text">2004/01/01</td>
                                <td align="center" class="green_text">2004/03/31</td>
                                <td colspan="3" class="green_text">0000000303  居宅介護支援事業所○○</td>
                                <td align="center" class="green_text">○田　花○子</td>
                                <td class="green_text">0000045890</td>
                            </tr>
                            <tr class="odd">
                                <td colspan="7" height="20px"></td>
                            </tr>
                            <tr class="even">
                                <td rowspan="3" align="center" style="vertical-align: middle;">
                                    12<br>
                                    <div class="div-radio"> 
											        <label class="rd2">
											            <input type="radio" name="rd2">
											            <i class="fa fa-circle-o "></i>
											        </label>
										      </div>
                                </td>
                                <td align="center">000000192633</td>
                                <td align="center">1200014201</td>
                                <td>変更申請 </td>
                                <td>要支援</td>
                                <td align="center">140015214</td>
                                <td align="center">1200141164</td>
                                <td>通常</td>
                            </tr>
                            <tr class="even">
                                <td align="center" class="green_text">2004/01/01</td>
                                <td align="center" class="green_text">2004/03/31</td>
                                <td colspan="3" class="green_text">0000000303  居宅介護支援事業所○○</td>
                                <td align="center" class="green_text">○田　花○子</td>
                                <td class="green_text">0000045890</td>
                            </tr>
                            <tr class="even">
                                <td colspan="7" height="20px"></td>
                            </tr>
                        </tbody>
                    </table>
                  </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="box input-full-size">
                    <div class="box-header well">
                        <div class="pull-left">顧客情報  </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="box-content parent-nopadding">
                       <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row col-lg-6 col-md-6 col-sm-12">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">顧客コード： </label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable input-pass" value="0000000187" disabled=""/>
                                </div>
                            </div>
                        </div>
      
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">顧客名称：</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control required input-disable" disabled="" value="メディケアー　太郎 "/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">顧客名称ﾌﾘｶﾞﾅ：</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                     <input type="text" class="form-control input-disable" disabled="" value="ﾒﾃﾞｨｹｱｰ ﾀﾛｳ "/>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>  
                    </div>
                  </div>
                  <div class="las">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td align="right">1</td>
                                <td>回収</td>
                                <td align="center">0110101</td>
                                <td>2モーターキューマアウラベッド83</td>
                                <td align="center">通常商品</td>
                                <td align="center">2000/05/05</td>
                                <td align="center">2004/12/12</td>
                            </tr>
                            <tr>
                                <td align="right">2</td>
                                <td>回収</td>
                                <td align="center">0110102</td>
                                <td>楽匠　3モーター　KQ-803</td>
                                <td align="center">通常商品</td>
                                <td align="center">2000/05/05</td>
                                <td align="center">2004/12/12</td>
                            </tr>
                            <tr>
                                <td align="right">3</td>
                                <td>回収</td>
                                <td align="center">0110111</td>
                                <td>2モーターキューマアウラベッド83</td>
                                <td align="center">通常商品</td>
                                <td align="center">2000/05/05</td>
                                <td align="center">2004/12/12</td>
                            </tr>
                            <tr>
                                <td align="right">4</td>
                                <td>回収</td>
                                <td align="center">0110856</td>
                                <td>アシスタンド座椅子</td>
                                <td align="center">通常商品</td>
                                <td align="center">2004/04/01</td>
                                <td align="center">2004/12/30</td>
                            </tr>
                            <tr>
                                <td align="right">5</td>
                                <td>貸出中</td>
                                <td align="center">0110856</td>
                                <td>スマートリフト　120</td>
                                <td align="center">通常商品</td>
                                <td align="center">2004/04/01</td>
                                <td align="center"></td>
                            </tr>
                            <tr>
                                <td align="right">6</td>
                                <td>貸出中</td>
                                <td align="center">0110987</td>
                                <td>介護リフト　つるべーBセット・F1セット</td>
                                <td align="center">通常商品</td>
                                <td align="center">2004/04/01</td>
                                <td align="center"></td>
                            </tr>
                        </tbody>
                    </table>
                  </div>
              </div>
              <div class="tab-pane" id="tab-5">
                <div class="box input-full-size">
                    <div class="box-header well">
                        <div class="pull-left">顧客情報  </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="box-content parent-nopadding">
                       <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row col-lg-6 col-md-6 col-sm-12">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">顧客コード： </label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable input-pass" value="0000000187" disabled=""/>
                                </div>
                            </div>
                        </div>
      
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">顧客名称：</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control required input-disable" disabled="" value="メディケアー　太郎 "/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">顧客名称ﾌﾘｶﾞﾅ：</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                     <input type="text" class="form-control input-disable" disabled="" value="ﾒﾃﾞｨｹｱｰ ﾀﾛｳ "/>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>  
                    </div>
                  </div>
                  <div class="las">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td align="right">1</td>
                                <td>購入・選定</td>
                                <td align="center">0110172</td>
                                <td>ては～とシャワーベンチ</td>
                                <td align="center">2000/05/05</td>
                                <td align="center">¥</i>12,000</td>
                            </tr>
                            <tr>
                                <td align="right">2</td>
                                <td>購入・選定</td>
                                <td align="center">0110173</td>
                                <td>安寿シャワーベンチCP-E</td>
                                <td align="center">2000/05/05</td>
                                <td align="center">¥</i>12,000</td>
                            </tr>
                            <tr>
                                <td align="right">3</td>
                                <td>購入・選定</td>
                                <td align="center">0110173</td>
                                <td>シャワーベンチ</td>
                                <td align="center">2000/05/05</td>
                                <td align="center">¥</i>15,000</td>
                            </tr>
                            <tr>
                                <td align="right">4</td>
                                <td>購入 </td>
                                <td align="center">0110598</td>
                                <td>オカモト浴槽　ニュー湯っくん</td>
                                <td align="center">2000/01/05</td>
                                <td align="center">¥64,800</td>
                            </tr>
                            <tr>
                                <td align="right">5</td>
                                <td>購入 </td>
                                <td align="center">0110598</td>
                                <td>家具調トイレ</td>
                                <td align="center">2002/11/20</td>
                                <td align="center">¥36,800</td>
                            </tr>
                            <tr>
                                <td align="right">6</td>
                                <td>購入 </td>
                                <td align="center">0110585</td>
                                <td>家具調トイレ　自立6型R　脱臭革命 </td>
                                <td align="center">2002/11/20</td>
                                <td align="center">¥83,000</td>
                            </tr>
                        </tbody>
                    </table>
                  </div>
              </div>
              <div class="tab-pane" id="tab-6">
                <div class="box input-full-size">
                    <div class="box-header well">
                        <div class="pull-left">顧客情報  </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="box-content parent-nopadding">
                       <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row col-lg-6 col-md-6 col-sm-12">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">顧客コード： </label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control input-disable input-pass" value="0000000187" disabled=""/>
                                </div>
                            </div>
                        </div>
      
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">顧客名称：</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                    <input type="text" class="form-control required input-disable" disabled="" value="メディケアー　太郎 "/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="row">
                                <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">顧客名称ﾌﾘｶﾞﾅ：</label></div>
                                <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                     <input type="text" class="form-control input-disable" disabled="" value="ﾒﾃﾞｨｹｱｰ ﾀﾛｳ "/>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>  
                    </div>
                  </div>
                  <div class="las">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td align="center">
                                    <div class="div-radio"> 
											        <label class="rd3">
											            <input type="radio" name="rd3">
											            <i class="fa fa-circle-o "></i>
											        </label>
										      </div>
                                </td>
                                <td align="center">2003/11/15</td>
                                <td align="center"></td>
                                <td align="center">初期アフター</td>
                                <td align="center">0000000159</td>
                                <td>○●　△▼</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <div class="div-radio"> 
											        <label class="rd3">
											            <input type="radio" name="rd3">
											            <i class="fa fa-circle-o "></i>
											        </label>
										      </div>
                                </td>
                                <td align="center">2004/04/01</td>
                                <td align="center">2004/04/01</td>
                                <td align="center">アフターサービス</td>
                                <td align="center">0000000163</td>
                                <td>◆○　▲△</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <div class="div-radio"> 
											        <label class="rd3">
											            <input type="radio" name="rd3">
											            <i class="fa fa-circle-o "></i>
											        </label>
										      </div>
                                </td>
                                <td align="center">2004/05/01</td>
                                <td align="center">2004/05/15</td>
                                <td align="center">その他</td>
                                <td align="center">0000000256</td>
                                <td>○▼　□▲</td>
                                <td>商品破損のため交換</td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <div class="div-radio"> 
											        <label class="rd3">
											            <input type="radio" name="rd3">
											            <i class="fa fa-circle-o "></i>
											        </label>
										      </div>
                                </td>
                                <td align="center">2004/11/20</td>
                                <td align="center">2004/11/15</td>
                                <td align="center">アフターサービス</td>
                                <td align="center">0000000163</td>
                                <td>▼○　▲○</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <div class="div-radio"> 
											        <label class="rd3">
											            <input type="radio" name="rd3">
											            <i class="fa fa-circle-o "></i>
											        </label>
										      </div>
                                </td>
                                <td align="center">2004/12/30</td>
                                <td align="center">2004/12/30</td>
                                <td align="center">初期アフター</td>
                                <td align="center">0000000163</td>
                                <td>◆○　▲□</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
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
    <script src="publich/js/medicareplugin.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
    <script>
        $(function () {
        	 $("input[name='rd']").radioBox('rd');
        	 $("input[name='rd2']").radioBox('rd2');
        	 $("input[name='rd3']").radioBox('rd3');
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
