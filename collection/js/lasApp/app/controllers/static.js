function staticCtrl($scope, $rootScope, Static) {
    $rootScope.root_title = 'Thống kê';

    $scope.chart = {};
    $scope.chart.argumentField = 'money';
    $scope.chart.title;
    $scope.dataSource = [];
       
    
    $scope.type = 1;
    $scope.skin = 1;
    $scope.user_id = getCookie('user_id');
    $scope.room_id ;
    var now = new Date();
    $scope.current_month = now.getMonth()+1;
    $scope.current_year = now.getFullYear()
    
    $scope.months = [
        {"id":1, "name":"Tháng 1"},{"id":2, "name":"Tháng 2"},{"id":3, "name":"Tháng 3"},
        {"id":4, "name" : "Tháng 4"},{"id" :5, "name" : "Tháng 5"},{"id" :6, "name": "Tháng 6"},
        {"id":7, "name" :"Tháng 7"},{"id": 8, "name" :"Tháng 8"},{"id" :9, "name" :"Tháng 9"},
        {"id":10, "name":"Tháng 10"},{"id": 11, "name" :"Tháng 11"},{"id": 12, "name" : "Tháng 12"}
    ];
    $scope.years = [
        {"id":2013, "name":"2013"},{"id":2014, "name":"2014"},{"id":2015, "name":"2015"}, {"id":2016, "name":"2016"},{"id":2017, "name":"2017"}
    ];
    
    $scope.$watch('root_room.id', function(room_id) {
        if(room_id) {
            $scope.room_id = room_id;  
            load_data_spend();          
        }
    });
    
    // user or room
    $scope.changeType = function(type) {
        $scope.type = type;
        load_data_spend();
    }
    // day or month
     $scope.changeSkin = function(skin) {        
        $scope.skin = skin;
        load_data_spend();
    }
    // change current month
    $scope.current_month_change = function() {
        load_data_spend();
    }
    // change  current year 
    $scope.current_year_change = function() {
        load_data_spend();
    }
    
    // load data spend
    $scope.data_spend;
    function load_data_spend() {
        Static.get('load_spend', 'type='+$scope.type+'&room_id='+$scope.room_id+'&user_id='+$scope.user_id+'&skin='+$scope.skin+'&year='+$scope.current_year+'&month='+$scope.current_month)
           .success(function(data) {   
                $scope.data_spend = data.data;
                process_data();
        });
    }
     function daysInMonth() {
        return new Date($scope.current_year, $scope.current_month, 0).getDate();
    }
    // process data
    function process_data(){  
        $scope.dataSource = [];
        var dayInMonth = daysInMonth();  
        $scope.chart.title = 'Thống kê năm '+ $scope.current_year;
        
        if($scope.skin == 1) {
            $scope.chart.title = 'Thống kê tháng '+$scope.current_month + ' Năm '+ $scope.current_year;
            $scope.series = [{ valueField: "used", name: "Tiêu" }];
            for(i=1;i<= dayInMonth ;i++) {
                money_inday = 0;
                angular.forEach($scope.data_spend, function(data) {
                    if(i == data.date) {
                        money_inday = ($scope.type == 1) ? parseInt(data.total) : parseInt(data.room_total)
                    }
                });
                $scope.dataSource.push({ money: i, used: money_inday} );
            }
        } else {
            for(i=1;i<= 12 ;i++) {
                money_month = 0;
                angular.forEach($scope.data_spend, function(data) {
                    if(i == data.month) {
                        money_month = ($scope.type == 1) ? parseInt(data.total) : parseInt(data.room_total)
                    }
                });
                $scope.dataSource.push({ money: i, used: money_month} );
            }
        }
        render_chart();
    }  
     
    function render_chart() {
        $("#chartContainer").dxChart({
            dataSource: $scope.dataSource,
            commonSeriesSettings: {
                argumentField: $scope.chart.argumentField
            },
            series: $scope.series ,
            argumentAxis:{
                grid:{
                    visible: true
                }
            },
            tooltip:{
                enabled: true
            },
            title: $scope.chart.title,
            legend: {
                verticalAlignment: "bottom",
                horizontalAlignment: "center"
            },
            commonPaneSettings: {
                border:{
                    visible: true,
                    right: false
                }       
            }
        });
    }
    

}