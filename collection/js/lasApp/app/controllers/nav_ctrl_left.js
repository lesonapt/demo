function navCtrl_left($rootScope, $scope, User, Room, Spend, Plane){
    
    // root scope
    $rootScope.root_screen_show = false;
    $rootScope.root_first_login = false;

    
    $rootScope.root_room = {};
    $rootScope.root_room_list = null;
    $rootScope.root_room_members = [];
 
   
    $scope.user = {};
    $scope.user.owner = false;
    $scope.user.id = getCookie('user_id');
    $scope.user.fullname = getCookie('user_fulllname');
    $scope.user.first_login = getCookie('user_first_login');
    
    $rootScope.run = 0;
    
    $rootScope.root_alert_have_room = false;
    $rootScope.root_alert_ivent = false;

    
    if($scope.user.first_login == 0) {
        $rootScope.root_screen_show = true;
        $rootScope.root_first_login = true;        
    } else {
        // load invitions
        User.get('load_invitations_by_user_id', 'user_id='+$scope.user.id).success(function(data) {        
            if(data.error) {
                console.log('request is invalided');
            } else {
                if(data.exist) {
                    popup('div-confirm-invi-popup');
                    $scope.invi_info = data.inv_data[0];
                    $rootScope.root_screen_show = true; 
                    $rootScope.root_alert_ivent = true; 
                    $rootScope.root_screen_show = true;                                           
                } else {
                    // load all room by user id => main for app
                    load_allRoom();
                }
            }
        });      
    }
    
    
    // load all room
    function load_allRoom() {
          User.get_room('user_id='+$scope.user.id).success(function(data){ 
            if(data.error) {
                console.log(data.error);
            } else {
                if(data.rooms == null){                           
                    $rootScope.root_screen_show = true;
                    $rootScope.creat_room_ask = true;  
                    popup('create-room-popup');

                } else {               
                    $rootScope.root_room_list = data.rooms;
                    $rootScope.root_room.id = data.rooms[0].room_id;
                    $rootScope.root_room.name = data.rooms[0].name;
                    angular.forEach(data.rooms, function(room) {
                        if( $scope.user.id == room.owner) {
                            $scope.user.owner = true;
                        }
                    });           
                }
            }
        });
    }  
    // function yes create room
    $scope.yes_create_room = function() {
         $rootScope.creat_room_ask = false;
        $rootScope.root_alert_have_room = true;
    }
   
    // set tname ò rôm
    $scope.room_name = 'Loading...';
    function set_root_room(roomId) {         
         angular.forEach($rootScope.root_room_list, function(room) {
            if(room.room_id == roomId) {
                $scope.room_name = room.name;
                $scope.user.owner = (room.owner == $scope.user.id) ? true :  false;
            }
        });
      }
  
    // load if trigger
    $scope.$watch('trigger', function(trigger) {
        if(trigger) {
            loadMembers();
            getSpend();
            $rootScope.trigger = false;
        }
    })
    // load room if triger
    $scope.$watch('triggerRoom', function(trigger) {
        if(trigger) {
            load_allRoom();
            $rootScope.triggerRoom = false;
        }
    })
    // if room change
    $scope.$watch('root_room.id', function(roomId) {
        set_root_room(roomId);
        if(roomId) {
           if($rootScope.root_room_list.length == 0 ){
                console.log('create');
            } else if ($rootScope.root_room_list.length == 1) {
                console.log('load user');
                loadMembers();
                getSpend();
            } else {                
                console.log('select a room');
                loadMembers();
                getSpend();
            }
        }
    })
    
    // load members by room id
    function loadMembers () {
        User.get_members('room_id='+$rootScope.root_room.id).success(function(data){            
            $rootScope.root_room_members = data.user;
            $rootScope.run ++;
        });
    }
      // getl allspend
    $rootScope.root_spend = [];
    function getSpend() {
        Spend.get('getallSpend', '&room_id='+$rootScope.root_room.id).success(function(data){  
            if (data) {
               $rootScope.root_spend = data;
               $rootScope.run ++;
            }            
        });
    }
    
    // load all now to render html
    $scope.$watch('run', function(num) {
        if(num == 2) {
            get_info_member_room();
        }
    })

    // tour
    $scope.tour = {};
    $scope.tour.step0 = true;
    $scope.step = function(step, act) {
        $rootScope.menu = act;
        $scope.tour = {};
        $scope.tour[step] = true;
        if($scope.tour.step || $scope.tour.step9) {
            // update first login
            User.get('update_first_login', 'user_id='+$scope.user.id+'&room_id='+$rootScope.root_room.room_id).success(function(data) {            
              $rootScope.root_first_login = false;
              setcookie('user_first_login', false);
              setcookie('alert_have_room', false);  
              if($scope.tour.step) {
                alert_create_room();    
              } else {
                $scope.popup_close('root_first_login',1);
              }     
            });
        }
    }

    // confirm create room
    function alert_create_room() {
        $rootScope.root_alert_have_room = true;                
        popup('create-room-popup');
    }
    // create room and add spend demo
    $scope.room_add_name = '';
    $scope.create_room = function() {
        if($scope.room_add_name.trim()== ''){
            $scope.error_room_name = true;
        } else {
            Room.post('insert_room', 'room_name='+$scope.room_add_name+'&user_id='+$scope.user.id).success(function(data) {
                if(data!=0) {
                     create_plane();
                     $scope.create_room_success = true
                     $scope.popup_close('root_alert_have_room',0);
                } else {
                    alert('lỗi xảy ra khi tạo phòng');
                  console.log('lỗi xảy ra khi tạo phòng');  
                }
            });
        }
    }
    // create plane demo
    function create_plane() {
         now = new Date();
         s_date = new Date(now.getFullYear(), now.getMonth(), now.getDate()-2);
         e_date = new Date(now.getFullYear(), now.getMonth()+1, now.getDate()-2);
         $scope.end_date   = e_date.format("yyyy/mm/dd");
         $scope.start_date = s_date.format("yyyy/mm/dd");
         Plane.post('create_plane', 'name=Tiết kiệm mua Iphone 5&money=650'+
         '&start_date='+$scope.start_date+'&end_date='+$scope.end_date+'&owner_id='+$scope.user.id+'&type=1')
         .success(function(data) {
                if(data!=0) {
                    console.log(data);
                } else {
                  console.log('lỗi xảy ra khi tạo ke hoach');  
                }
         });
    }
    // complete create room
    $scope.create_room_complete = function() {
          $scope.create_room_success = false;
          $scope.popup_close('create-room-popup_alert',1);
          load_allRoom();
    }
    
    // show invi
    $rootScope.root_view_form_invi = false;
    $scope.load_form_invi = function() {
        $rootScope.root_view_form_invi = true;
        $rootScope.root_screen_show = true;  
        popup('div-popup-invi');
    }
    
    // send invi  
    $scope.send_invi = function() {
        if($scope.user.invi_username == '' || $scope.user.invi_username == null) {
          $('.msg').html('Nhập tên người bạn muốn mời');
        } else {
            User.post('invitation_process', 'username='+$scope.user.invi_username+'&user_id='+$scope.user.id+'&room_id='+$rootScope.root_room.id).success(function(data) {                    
               if(data.error) {
                    if(data.code == '#01') {
                         $('.msg').html('Người dùng không tồn tại');
                    } else if (data.code == '#02') {
                        $('.msg').html('Người dùng đã thuộc phòng này');
                    } else {
                        $('.msg').html('Bạn đã mời người này rồi');
                    }
               } else {                    
                    $('.msg').html('Đã gủi lời mời của bạn đến '+data.msg);
               }
            });
        }        
    }
    // accept invi
    $scope.accept_invi = function() {
        console.log($scope.invi_info);
        User.post('invi_accept', 'invi_id='+$scope.invi_info.id+'&user_id='+$scope.user.id+'&room_id='+$scope.invi_info.room_id).success(function(data) {
             console.log(data);
             $rootScope.root_alert_ivent = false; 
             $scope.popup_close('root_alert_ivent', 1); 
             load_allRoom();
        });
    }
    // inject invi
    $scope.inject_invi = function() {
         User.post('invi_inject', 'invi_id='+$scope.invi_info.id).success(function(data) {
             console.log(data);
             $rootScope.root_alert_ivent = false; 
             $scope.popup_close('root_alert_ivent', 1); 
             load_allRoom();
        });
        
    }

    function get_info_member_room() {
        $rootScope.run = 0;
        var i=0;
        angular.forEach($rootScope.root_room_members, function(member) {
          var money_use = 0;
          var money_add = 0;
          $rootScope.root_room.total = 0;
          angular.forEach($rootScope.root_spend, function(spend) {
            if(spend.status == 0) {
                var s = spend.user_tags;          
                if(s.indexOf('['+member.id+']') != -1) {
                    money_use+= parseInt(spend.money/spend.user_total);
                }
                if(member.id == spend.user_id) {
                    money_add+= parseInt(spend.money);
                }
                $rootScope.root_room.total+= parseInt(spend.money);
            }                                 
          });     
                                 
          $rootScope.root_room_members[i].money_use = money_use;
          $rootScope.root_room_members[i].money_add = money_add;  
          $rootScope.root_room_members[i].money_blance = parseFloat(money_add-money_use); 
          $rootScope.root_room_members[i].style; 
          
          if($rootScope.root_room_members[i].money_blance == 0) {
            $rootScope.root_room_members[i].style = 'label-default';
          }  else if($rootScope.root_room_members[i].money_blance > 0) {
            $rootScope.root_room_members[i].style = 'label-success';
          }  else {
            $rootScope.root_room_members[i].style = 'label-danger';
          }     
          i++;          
        });
    } 
    

//=========================================end code=============================================   
}