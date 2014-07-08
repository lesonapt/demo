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
                <div class="box-content parent-nopadding">
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="row">
                            <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">顧客コード:</label></div>
                            <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 "><input type="text" class="form-control" /></div>
                        </div>
                        <div class="row">
                            <div class=" col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">電話番号:</label></div>
                            <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                <input type="text" class="form-control text-search" />
                                <button type="button" class="btn btn-primary btn-xs btn-search" onclick="popupModel()" ><i class="glyphicon glyphicon-search"></i> </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">関連事業所コード:</label></div>
                            <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                <input type="text" class="form-control text-search" />
                                <button type="button" class="btn btn-primary btn-xs btn-search" onclick="popupModel()" ><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-6">
                        <div class="row">
                            <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">担当者コード:</label></div>
                            <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                <input type="text" class="form-control required" /><span class="lb-required">(*)</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4  text-right"><label class="control-label">利用分類:</label></div>
                            <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                                <div class="div-select-box">
    						      		<select >
    						      			<option value="01" selected="selected">介護保険</option>
                                            <option value="05" >レンタル卸</option>
                                            <option value="05" >など</option>
    						      		</select>
    						       </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right"><label class="control-label">アフターサービス:</label></div>
                            <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8 text-left">
                                <input type="text" style="width: 100px;" class="form-control text-center datepicker" /> 
                                <strong>~</strong> <input style="width: 100px;" type="text" class="form-control text-center datepicker" />
                            	<div class="check-box">
								      	<label class="checkbox" for="checkbox1">
								      		<input type="checkbox">
								            <i class="fa"></i>
								            <span class="text">未実施</span>
								          </label>
						          </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="row">
                            <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4   text-right"><label class="control-label">顧客名称ﾌﾘｶﾞﾅ:</label></div>
                            <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8  text-left"><input type="text" class="form-control" /></div>
                        </div>
                        <div class="row">
                            <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4   text-right"><label class="control-label">利用分類:</label></div>
                            <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8  text-left">
                            	<div class="div-select-box">
								      		<select >
								      			<option value="one">藤沢本社</option>
								      			<option value="two" selected="selected">鎌倉営業所</option>
								      			<option value="three">横須賀営業所</option>
								      			<option value="four">横浜南営業所</option>
								      		</select>
								       </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4   text-right"><label class="control-label">エリアコード:</label></div>
                            <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8  "><input type="text" class="form-control" /></div>
                        </div>
                    </div>
                    

                    <div class="row col-lg-12 col-md-12 col-sm-12">
                    		<div class="col-label col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right index-ipput-1" style="width: 11%;" ><label class="control-label">並べ替え:</label></div>
                        <div class="col-input col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        	<div class="div-radio"> 
								        <label class="sex">
								            <input type="radio" name="sex" value="1">
								            <i class="fa fa-circle-o "></i><span class="span-label">顧客コード</span>
								        </label>
								        <label class="sex">
								            <input type="radio" name="sex" value="2">
								            <i class="fa fa-circle-o"></i><span class="span-label">顧客名称</span>
								        </label>
								        <label class="sex">
								            <input type="radio" name="sex" value="3">
								            <i class="fa fa-circle-o"></i><span class="span-label">利用分類 </span>
								        </label>
								         <label class="sex">
								            <input type="radio" name="sex" value="4">
								            <i class="fa fa-circle-o"></i><span class="span-label">関連事業所</span>
								        </label>
								         <label class="sex">
								            <input type="radio" name="sex" value="5">
								            <i class="fa fa-circle-o"></i><span class="span-label">アフターサービス</span>
								        </label>
								    </div>
                        
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
							<select class="form-control" style="vertical-align: top; margin-top: 2px; height: 26px; padding-top: 2px;">
								<option value="10">10 件</option>
								<option value="50">50 件</option>
								<option value="100">100 件</option>
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
                                <th class="text-center thtd-selectbox" style="min-width: 50px;">
                                		<div class="check-box">
										      	<label class="checkbox" for="checkbox1">
										      		<input type="checkbox" id="chk_all">
										            <i class="fa" class="checkbox-master"></i>
										          </label>
							          		</div>
                                </th>
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
                                <?php for( $i = 0; $i < 3; $i ++ ) {?>
                                <tr>
                                    <td class="text-center thtd-selectbox" style="width: 5%; min-width: 50px;" >
                                    	<div class="check-box">
											      	<label class="checkbox" for="checkbox1">
											      		<input type="checkbox">
											            <i class="fa" class="checkbox-master" onclick="selectAll()"></i>
											          </label>
								          		</div>
                                    </td>
                                    <td style="width: 10%;">0001</td>
                                    <td style="width: 30%;">顧客リスト</td>
                                    <td style="width: 30%;">顧客リスト</td>
                                    <td style="width: 10%;">No.1</td>
                                    <td style="width: 10%;">10.000$</td>
                                </tr>
                                <tr>
                                    <td class="text-center thtd-selectbox">
                                    	<div class="check-box">
											      	<label class="checkbox" for="checkbox1">
											      		<input type="checkbox">
											            <i class="fa" class="checkbox-master" onclick="selectAll()"></i>
											          </label>
								          		</div>
                                    </td>
                                    <td>0002</td>
                                    <td>顧客リスト</td>
                                    <td>顧客リスト</td>
                                    <td>No.1</td>
                                    <td>10.000$</td>
                                </tr>
                                <tr>
                                    <td class="text-center thtd-selectbox">
                                    	<div class="check-box">
											      	<label class="checkbox" for="checkbox1">
											      		<input type="checkbox">
											            <i class="fa" class="checkbox-master" onclick="selectAll()"></i>
											          </label>
								          		</div>
                                    </td>
                                    <td>0002</td>
                                    <td>顧客リスト</td>
                                    <td>顧客リスト</td>
                                    <td>No.1</td>
                                    <td>10.000$</td>
                                </tr>
                                <tr>
                                    <td class="text-center thtd-selectbox">
                                    	<div class="check-box">
											      	<label class="checkbox" for="checkbox1">
											      		<input type="checkbox">
											            <i class="fa" class="checkbox-master" onclick="selectAll()"></i>
											          </label>
								          		</div>
                                    </td>
                                    <td>0002</td>
                                    <td>顧客リスト</td>
                                    <td>顧客リスト</td>
                                    <td>No.1</td>
                                    <td>10.000$</td>
                                </tr>
                                <tr>
                                    <td class="text-center thtd-selectbox">
                                    	<div class="check-box">
											      	<label class="checkbox" for="checkbox1">
											      		<input type="checkbox">
											            <i class="fa" class="checkbox-master" onclick="selectAll()"></i>
											          </label>
								          		</div>
                                    </td>
                                    <td>0002</td>
                                    <td>顧客リスト</td>
                                    <td>顧客リスト</td>
                                    <td>No.1</td>
                                    <td>10.000$</td>
                                </tr>
                                <tr>
                                    <td class="text-center thtd-selectbox">
                                    	<div class="check-box">
											      	<label class="checkbox" for="checkbox1">
											      		<input type="checkbox">
											            <i class="fa" class="checkbox-master" onclick="selectAll()"></i>
											          </label>
								          		</div>
                                    </td>
                                    <td>0002</td>
                                    <td>顧客リスト</td>
                                    <td>顧客リスト</td>
                                    <td>No.1</td>
                                    <td>10.000$</td>
                                </tr>
                                <tr>
                                    <td class="text-center thtd-selectbox">
                                    	<div class="check-box">
											      	<label class="checkbox" for="checkbox1">
											      		<input type="checkbox">
											            <i class="fa" class="checkbox-master" onclick="selectAll()"></i>
											          </label>
								          		</div>
                                    </td>
                                    <td>0002</td>
                                    <td>Jame</td>
                                    <td>CEO Cocacola</td>
                                    <td>No.1</td>
                                    <td>10.000$</td>
                                </tr>
                                <tr>
                                    <td class="text-center thtd-selectbox">
                                    	<div class="check-box">
											      	<label class="checkbox" for="checkbox1">
											      		<input type="checkbox">
											            <i class="fa" class="checkbox-master" onclick="selectAll()"></i>
											          </label>
								          		</div>
                                    </td>
                                    <td>0002</td>
                                    <td>Jame</td>
                                    <td>CEO Cocacola</td>
                                    <td>No.1</td>
                                    <td>10.000$</td>
                                </tr>
                                <tr>
                                    <td class="text-center thtd-selectbox">
                                    	<div class="check-box">
											      	<label class="checkbox" for="checkbox1">
											      		<input type="checkbox">
											            <i class="fa" class="checkbox-master" onclick="selectAll()"></i>
											          </label>
								          		</div>
                                    </td>
                                    <td>0002</td>
                                    <td>Jame</td>
                                    <td>CEO Cocacola</td>
                                    <td>No.1</td>
                                    <td>10.000$</td>
                                </tr>
                                <?php }?>
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
    <script src="publich/js/medicareplugin.js"></script>
    <script src="publich/js/jquery-ui.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
    <script>
    $(document).ready(function() {
    	 $("input[name='sex']").radioBox('sex');
         getwidth() ;
         $( ".datepicker" ).datepicker({
             showOn: "button",
             buttonImage: "./publich/images/calendar_2.png",
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
        
       /*  $( window ).resize(function() {
            //getwidth();
			$(window).trigger('zoom');
        }); */
        
        function getwidth(offset) {
            $('table.tb-body tr:eq(0) td').each(function(index, obj) {
                var wi = $(this).width();
				//var wip = $(this).offsetParent().width();
				//var percent = 100*wi/wip;
				//var percent = Math.round(100*wi/wip);
				$(this).width(wi + 'px');
				$("table.tb-head th:eq( "+index+" )").width(wi + 'px');
                if( index < 5 ){
                    $("table.tb-head th:eq( "+index+" )").width(wi);
                }
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
        $('#chk_all').parent('.checkbox').click(function() {
            if( !$(this).hasClass('checked') ) {
            	$('.tb-body .checkbox').addClass('checked');
            } else {
            	$('.tb-body .checkbox').removeClass('checked');
            }
        });
    </script>
  </body>
</html>
