function planeCtrl($scope, $rootScope, Plane, Spend) {
    $rootScope.root_title = 'Kế hoạch';


    $scope.user_id = getCookie('user_id');
    
    $scope.plane;
    $scope.longDays = [];
    $scope.havePlane = false;
    var now = new Date();
    function dateFomat(objDate) {
        var d = ("0"+objDate.getDate()).slice(-2);
        var m = ("0"+objDate.getMonth()).slice(-2);
        return objDate.getFullYear()+'-'+m+'-'+d;
    }
    
   // load planes for user
    load_planes();
    $scope.planeStatus;
    $scope.planeName;
    $scope.planeMoney;
    function load_planes() {
        if($scope.user_id) {
            Plane.get('load_planes', '&user_id='+$scope.user_id).success(function(data){  
                if(data.planes != null) {
                    $scope.plane = data.planes[0];
                    $scope.planeName = data.planes[0].name;
                    $scope.planeMoney = data.planes[0].money;
                    $scope.havePlane = true;
                    $scope.planeStatus =  checkEndStartDate(data.planes[0].end_date, now);
                    console.log($scope.planeStatus);
                } else {
                    $scope.havePlane = false;
                    console.log('chua co ke hoach nao');
                }
            });
        } 
    }
    $scope.totalDayPlane =0;
    $scope.used_completed_days = 0;
    // if have plane load data of plane
    $scope.$watch('plane', function(plane) {
       if(plane) {
            $scope.longDays = [];
            s_date = new Date(plane.start_date);
            e_date = new Date(plane.end_date);
            var offset = e_date.getTime() - s_date.getTime(); 
            $scope.totalDayPlane = Math.round(offset / 1000 / 60 / 60 / 24);
       
            now = new Date();
            for(i=0 ; i <= $scope.totalDayPlane ; i++) {
                next_date = new Date( s_date.getFullYear(), s_date.getMonth(), s_date.getDate()+i );
                var offset = now.getTime() - next_date.getTime(); 
                var along = Math.round(offset / 1000 / 60 / 60 / 24);  
                c_style = along > 0 ? 'plane_day_pass' : 'plane_day_future';
                if(along == 0){
                    $scope.used_completed_days = i;
                }
                $scope.longDays.push({day: i+1, due_date: next_date.format("yyyy-mm-dd"), date: next_date.toLocaleDateString(), style: c_style });
            }  
            load_spend_for_plane(); 
       } 
    });
 


    // load data spend for plane
    $scope.spend_plane = {};
    $scope.used_money = 0;
    function load_spend_for_plane() {
        $scope.spend_plane = {};
        $scope.used_money = 0;
        Plane.get('load_spend_for_plane', '&user_id='+$scope.user_id+'&s_date='+$scope.plane.start_date+'&e_date='+$scope.plane.end_date).success(function(data){  
            if(data) {
                angular.forEach(data.data, function(dt) {
                    $scope.used_money+=parseInt(dt.person_money);
                    var use_data = {use: false, use_money: 0};
                    angular.forEach($scope.longDays, function(longDay) {
                       if( (longDay.due_date).trim == (dt.create_date).trim ) {
                            use_data = {use: true, use_money : 'Sử dụng hết '+parseFloat(dt.person_money.slice(0,-1))+ ' Nghìn đồng' };
                        }                  
                    });                           
                    $scope.spend_plane[dt.create_date] = use_data;
                });
            }
        });
    }
    
    // update plane ìno
    $rootScope.root_plane_popup = false;
    $scope.act = 'edit';
    $scope.updatePlaneViewPopup = function(act) {
        $scope.act = act;
        $scope.date = now.format('yyyy-mm-dd');
        var end_date  = new Date(now.getFullYear(), now.getMonth()+1, 1);
        $scope.e_date = end_date.format('yyyy-mm-dd');
        $rootScope.root_screen_show = true; 
        $rootScope.root_plane_popup = true;
        popup('div-add-popup');
    }
    
   
    // function update add
    $scope.error= {};
    $scope.updatePlane = function() {
        var along = checkEndStartDate($scope.date, $scope.e_date);
        if(along <= 0) {
            console.log(along);
            $scope.error.e_date = true;
        } else {
           Plane.get('update_plane', '&plane_id='+$scope.plane.id+'&name='+$scope.planeName+'&start_date='+$scope.date+'&end_date='+$scope.e_date+'&money='+$scope.planeMoney).success(function(data){
                load_planes();
           });
           $scope.popup_close('root_plane_popup', 1)
        }
    }
    
    // function update add
    $scope.createPlane = function() {
        var along = checkEndStartDate($scope.date, $scope.e_date);
        if(along <= 0) {
            console.log(along);
        } else {
           Plane.get('create_plane', '&owner_id='+$scope.user_id+'&name='+$scope.planeName+'&start_date='+$scope.date+'&end_date='+$scope.e_date+'&money='+$scope.planeMoney).success(function(data){
                load_planes();
           });
           $scope.popup_close('root_plane_popup', 1);
        }
    }
    // function check start date and end date
    function checkEndStartDate(s_date, e_date) {
        var s_date = new Date(s_date);
        var e_date = new Date(e_date);
        var offset = e_date.getTime() - s_date.getTime(); 
        var along = Math.round(offset / 1000 / 60 / 60 / 24);  
        return along;
    }
    
    
}