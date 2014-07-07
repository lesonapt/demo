function calenderCtrl($scope, User, Spend, $rootScope) {   
    $rootScope.root_title = 'calender';
    $rootScope.trigger = false;
    $scope.run =0;
    var date = new Date();
    months = new Array('Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',
                         'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12');
    days_in_month = new Array(31,28,31,30,31,30,31,31,30,31,30,31);
    $scope.dayInWeek = ['Chủ nhật', 'Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6'];
    
    $scope.current_year = date.getFullYear();
    $scope.current_month = date.getMonth();
    $scope.current_date = date.getDate();
    
    $scope.month_now =  date.getMonth();
    $scope.year_now  = date.getFullYear();
    
    $scope.act;
    
    $scope.$watch('current_month', function(month) {
        //getSpend();
    });
    
    // change month
    $scope.cld_change_month = function(num) {
      newMonth = new Date($scope.current_year, $scope.current_month+num, 1);
      $scope.current_year = newMonth.getFullYear();
      $scope.current_month = newMonth.getMonth()
      //$scope.current_date = 1;
      getSpend();
      calendar($scope.current_year, $scope.current_month, $scope.current_date);  
    }
    
    
    function calendar(year, month, day) {
        $scope.weeks =[];        
        if(year<=200)
        {
            year += 1900;
        }
        if(year%4 == 0 && year!=1900)
        {
            days_in_month[1]=29;
        }
        total = days_in_month[month];
        $scope.date_today = months[month]+' năm '+year;
        beg_j = new Date(year, month, day);
        beg_j.setDate(1);
        if(beg_j.getDate()==2)
        {
            beg_j=setDate(0);
        }
        beg_j = beg_j.getDay();
        week = 0;
        days_in_week = [];  
        week_num = 0;
        today_style = '';
        row_style = '';
        td_style = '';
        td_last_style = 'nothing';
        td_valid_add = true;
        for(i=1;i<=beg_j;i++)
        {     
            td_style = 'date_old';
            date = $scope.current_year+'-'+hSlice($scope.current_month);
            objEventday = getEventOfDay(date+'-'+ hSlice(days_in_month[month-1]-beg_j+i));
            days_in_week.push({'year': year , 'month': month-1, 'day': (days_in_month[month-1]-beg_j+i), 'events': objEventday, 'today_style': today_style, 'class': td_style, 'td_last_style': td_last_style, 'td_click': td_valid_add});
            week++;                
        }
        
        for(i=1;i<=total;i++)
        {          
            if(i > day && $scope.current_month == $scope.month_now && $scope.current_year == $scope.year_now){
                //td_valid_add = false;
            }
            
            
            if(day==i && $scope.current_month == $scope.month_now && $scope.current_year == $scope.year_now)
            {
                td_style = 'date_today';
                today_style = 'today_style';
            }
            else
            {
                td_style = 'date_avalid';
                today_style = '';
            }
            
            date = $scope.current_year+'-'+hSlice($scope.current_month+1);
            objEventday = getEventOfDay(date+'-'+hSlice(i));
            if(week==6) {
                td_last_style = 'fc-last';
            } else {
                td_last_style = '';
            }
            days_in_week.push({'year': year , 'month': month, 'day': i, 'events': objEventday, 'today_style': today_style, 'class': td_style, 'td_last_style': td_last_style, 'td_click': td_valid_add});
            week++;
            if(week==7)
            {                        
                if(week_num  == 0) {
                    row_style = 'fc-first';
                } else if(week_num == 4) {
                    row_style = 'fc-last';
                } else {
                    row_style = '';
                }
                $scope.weeks.push({'row_style': row_style, 'days': days_in_week});
                days_in_week = []; 
                week=0;week_num++;
            }
        }
        for(i=1;week!=0;i++)
        {       
            td_style = 'date_future';
            week++;
            date = $scope.current_year+'-'+hSlice($scope.current_month+2);
            objEventday = getEventOfDay(date+'-'+ hSlice(i));
            if(week==7) {
                td_last_style = 'fc-last';
            }
            days_in_week.push({'year': year , 'month': month+1, 'day': i, 'events': objEventday, 'today_style': today_style, 'class': td_style, 'td_last_style': td_last_style, 'td_click': td_valid_add});
            if(week==7)
            {
                if(week_num  == 4) {
                    row_style = 'fc-last';
                } else {
                    row_style = 'nothing';
                }
                $scope.weeks.push({'row_style': row_style, 'days': days_in_week});
                days_in_week = [];
                week=0;
                week_num++;
            }
        }
        
    } 
    
    function hSlice(date) {
        if(date) {
            return ("0"+date).slice(-2);
        } return;
    }
    
    function getEventOfDay(day) {
        events = [];
        angular.forEach($scope.spend, function(spend) {
            var user_name ;
            if(day == spend.create_date) {
                angular.forEach($rootScope.root_room_members, function(member) {
                    if(member.id == spend.user_id) {
                        user_name = member.full_name || member.email;
                    }
                });
               var spendStyle = (spend.status == 0 ) ? 'now' : 'pass'
               events.push({'id': spend.id, 'money': spend.money, 'user_name': user_name, 'title': spend.title, 'style': spendStyle}); 
            }
        })
        return events;
    }
   
    // get spend by room id
    $scope.$watch('root_room.id', function(room_id) {
        if(room_id) {
            getSpend();
        }
    });

    // get spend
    $scope.spend = {};
    function getSpend() {
        msgLoading('Loading...');
        s_date =  new Date($scope.current_year, ($scope.current_month-1), 0);
        e_date =  new Date($scope.current_year, ($scope.current_month+2), 0);
        start_date = s_date.getFullYear()+'-'+hSlice(s_date.getMonth()+1)+'-'+s_date.getDate();
        end_date = e_date.getFullYear()+'-'+hSlice(e_date.getMonth()+1)+'-'+e_date.getDate();
        Spend.get('get3month', '&room_id='+$rootScope.root_room.id+'&start_date='+start_date+'&end_date='+end_date).success(function(data){  
            $scope.spend  = data;
            calendar($scope.current_year, $scope.current_month, $scope.current_date); 
            msgEndloading('Loading complate');
        });
    }

    //set varible
    $scope.member_spend = getCookie('user_id');
    $scope.spendAttr = {};
    $scope.spendAttr.name = 'Mua dầu ăn';
    $scope.spendAttr.money = 0;
    

    // poup show to add new spend
    $scope.spend_edit_id;
    $scope.popup_edit_spend_show = function(id) {
        $scope.spend_edit_id = id;
        $scope.act = 'edit';
        angular.forEach($scope.spend, function(spend) {
            if(spend.id == id) {
               console.log(spend);
               hUserTag(spend.user_tags);
               $scope.date = spend.create_date; 
               $scope.spendAttr.name = spend.title;
               $scope.spendAttr.money = spend.money;
               $scope.member_spend = spend.user_id
               slider();

            }
        });
        $rootScope.formAddShow = true
        $rootScope.root_screen_show = true;
        popup('div-add-popup');
    }
   
   // poup show to add new spend
    $scope.popup_add_spend_show = function(date, month, year) {
        $scope.act = 'add';
        copy_root_members();
        $scope.date = year+'-'+hSlice(month+1)+'-'+hSlice(date);
        $scope.spendAttr.name = '';
        $scope.spendAttr.money = 0;
        slider();
    
        $rootScope.formAddShow = true
        $rootScope.root_screen_show = true;
        popup('div-add-popup');
    }
  
    
    // get user tag
    function hUserTag(user_tag) {
        angular.forEach($scope.members, function(value, index) {
               if(user_tag.indexOf('['+value.user_id+']') != -1) {
                     $scope.members[index].tag = true;
               } else {
                    $scope.members[index].tag = false;
               }
        });     
        console.log($scope.members);                
    }
    
    slider();
    function slider() {
        $( "#slider-vertical" ).slider({
            orientation: "horizontal",
            range: "min",
            min: 1,
            max: 1000,
            value: $scope.spendAttr.money,
            slide: function( event, ui ) { 
                var a = $( "#slider-vertical" ).slider( "value" ) ;
                $scope.spendAttr.money = parseInt(a);
                $('#spmoney').val($scope.spendAttr.money);
            }
        });
    }
    $scope.pushMoney = function() {
        slider();
    }
    
    // create user tags
    $scope.user_tag = [];
    function create_user_tags() {
        $scope.user_tag = [];
        angular.forEach($scope.members, function(member) {
            if(member.tag) {
                $scope.user_tag.push(member.user_id); 
            }
        });
    }
    
    // add tags for member in room
      $scope.$watch('root_room_members', function(member) {
        if(member) {            
            copy_root_members();
        }
      });
      
      // copy root_room_member to members to use
      $scope.members =[];
      function copy_root_members() {
        $scope.members =[];
          angular.forEach($rootScope.root_room_members, function(value, index) {
                $scope.members.push({
                    name: value.full_name || value.email,
                    tag: false,
                    user_id : parseInt(value.id) 
                });
           });
      }
    
      // check add date and now date
      function validDateToInsert() {
        var date = new Date();
        i_date = new Date($scope.date);
        var offset = date.getTime() - i_date.getTime(); 
        return Math.round(offset / 1000 / 60 / 60 / 24);
      }  
     

    
      $scope.error ={}
      function validForm() {
        
        time = validDateToInsert();
        if(time < 0) {
            $scope.error.date = true;
        } else {
            $scope.error.date = false;
        }
        create_user_tags();
        if($scope.user_tag.length == 0) {
            $scope.error.tags = true;
        } else {
            $scope.error.tags = false;
        }
      } 
  
      // add spend
      
      $scope.add_spend = function() { 
        
        validForm();
        var money = parseInt($scope.spendAttr.money);
        
        if(money == 'NAN' || money > 1000 || money < 1) {
            $scope.error.money = true;
        } else {
            $scope.error.money = false;
        }

        if($scope.AddForm.$valid ) {
            if(!$scope.error.date && !$scope.error.money && !$scope.error.tags) {
                Spend.post('add_spend', 'user_tags='+$scope.user_tag.join('-')+'&room_id='+$rootScope.root_room.id
                    +'&money='+$scope.spendAttr.money+'&title='+$scope.spendAttr.name
                    +'&date='+$scope.date+'&user_id='+$scope.member_spend).success(function(data){     
                        console.log(data);
                        $rootScope.root_msg_text = 'Thêm không thành công';
                        getSpend();
                        $rootScope.trigger = true;
                        $scope.popup_close('formAddShow', 1);
                       
                });
            }
        }
      }
      
      // update spend
      $scope.update_spend = function() {
        validForm();
        var money = parseInt($scope.spendAttr.money);
        
        if(money == 'NAN' || money > 1000 || money < 1) {
            $scope.error.money = true;
        } else {
            $scope.error.money = false;
        }
        
        if($scope.AddForm.$valid ) {
            if(!$scope.error.date && !$scope.error.money && !$scope.error.tags) {
                Spend.update('update_spend', 'user_tags='+$scope.user_tag.join('-')+'&spend_id='+$scope.spend_edit_id
                        +'&money='+$scope.spendAttr.money+'&title='+$scope.spendAttr.name
                        +'&date='+$scope.date+'&user_id='+$scope.member_spend).success(function(data){     
                            console.log(data);
                            getSpend();
                            $rootScope.trigger = true;
                            $scope.popup_close('formAddShow', 1);
                });
            }  
        } 
      } 
      // del spend
      $scope.del_spend = function() {
        $rootScope.root_screen_show = true;
        $rootScope.formConfirmShow = true
        $scope.popup_close('formAddShow', 0);
        popup('div-confirm-popup');
      }
      // finction confirm
      
      $scope.spend_del_confirm = function(is_del) {
        if(is_del) {
            Spend.remove('del_spend','&spend_id='+$scope.spend_edit_id).success(function(data){     
                console.log(data);
                getSpend();
                $rootScope.trigger = true;
            });
        } else {
            console.log('nothing');            
        }
        $scope.popup_close('formConfirmShow', 1);
      }
      
   
// end code create by lesonapt =============================================      
} 
