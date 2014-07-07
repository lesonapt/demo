function homeCtrl($scope, User, $rootScope, Spend) {  
    $rootScope.root_title = 'Home';
    $scope.user = {};
    $scope.user.id = getCookie('user_id');
    $scope.user.full_name = getCookie('user_fullname');
    var now = new Date();
    // get spend by room id
    $scope.minDate = 'Chưa có chi tiêu mới';
    $scope.stringMindate = null;
    $scope.$watch('root_room.id', function(room_id) {
        if(room_id) {
            Spend.get('getMaxMinDateSpend', '&room_id='+$rootScope.root_room.id).success(function(data){  
                if(data[0].min_date != null) {
                    $scope.minDate = 'Thống kê từ ngày '+data[0].min_date+' đến hôm nay';
                    $scope.stringMindate = data[0].min_date;
                }
                renderChar();
            });
            history();
        }
    });
         
     var dataSource = [];
     $scope.$watch('root_room_members[0].money_use', function(members) {
        if(members != undefined) {
            dataSource = [];
            angular.forEach($rootScope.root_room_members, function(member) {
               dataSource.push({ memberName: member.full_name || member.email,  added: member.money_add, used: member.money_use })
            });
            renderChar();
        }
        
     });
     
    $scope.cofirmCheckSum = function() {
        $rootScope.root_screen_show = true;
        $rootScope.confirmationChecksum = true;
        confirmPopup();
    }
    
     $scope.checkSum = function() {
        $scope.popup_close('confirmationChecksum', 1);
        Spend.update('update_status', '&room_id='+$rootScope.root_room.id+'&min_date='+$scope.stringMindate).success(function(data){  
               console.log(data);
        });
        
        Spend.post('insertHistory', '&room_id='+$rootScope.root_room.id+'&s_date='+$scope.stringMindate+'&e_date='+now.format('yyyy-mm-dd')+'&money='+$rootScope.root_room.total).success(function(data){  
              location.reload(); 
        });
     }
     
     // load history
     $scope.histories;
     function history() {
         Spend.get('getHistory', '&room_id='+$rootScope.root_room.id).success(function(data){  
            var i=0;
            angular.forEach(data, function(data) {
                i++;
                data.index = i;
            });
            $scope.histories = data;
         });
     }

// load history sepnd
    $scope.history = 0;
    $scope.historyDateSpend;
    
    $scope.spendHistory = function() {
        spendDate = $scope.history.split("to");
        $scope.memberHistory = [];
        if(spendDate[1]) {
            Spend.get('get3month', '&room_id='+$rootScope.root_room.id+'&start_date='+spendDate[0]+'&end_date='+spendDate[1]+'&status=1').success(function(data){  
                $scope.historyDateSpend = data;
                member_history_spend();
            });
        }
    }
    
    // process spend history
    $scope.memberHistory = [];
    function member_history_spend() {
        angular.forEach($rootScope.root_room_members, function(member) {
          var money_use = 0;
          var money_add = 0;
          //$rootScope.root_room.total = 0;
          angular.forEach($scope.historyDateSpend , function(spend) {
            if(spend.status == 1) {
                var s = spend.user_tags;          
                if(s.indexOf('['+member.id+']') != -1) {
                    money_use+= parseInt(spend.money/spend.user_total);
                    
                }
                if(member.id == spend.user_id) {
                    money_add+= parseInt(spend.money);
                }
            }                                 
          });     
                                 
          $scope.memberHistory.push({'name':member.full_name || member.email, 'used_money': money_use, 'add_money':money_add, 'money_blane': parseFloat(money_add-money_use) });             
        });
        console.log($scope.memberHistory);
    } 
    
    $scope.$watch('user.owner', function(d) {
        
    })
    
   // invi member 
    $scope.load_form_invi = function() {
        $rootScope.root_view_form_invi = true;
        $rootScope.root_screen_show = true;  
        popup('div-popup-invi');
    }
    
    function renderChar() {
        $("#chartContainer").dxChart({
        dataSource: dataSource,
        commonSeriesSettings: {
            argumentField: "memberName",
            type: "bar",
            hoverMode: "allArgumentPoints",
            selectionMode: "allArgumentPoints",
            label: {
                visible: true,
                format: "fixedPoint",
                precision: 0
            }
        },
        series: [
            { valueField: "added", name: "Chi" },
            { valueField: "used", name: "Tiêu" },
 
        ],
        title: $scope.minDate,
        legend: {
            verticalAlignment: "bottom",
            horizontalAlignment: "center"
        },
        pointClick: function (point) {
            this.select();
        }
        });
    }
    
    
   
} 



   



