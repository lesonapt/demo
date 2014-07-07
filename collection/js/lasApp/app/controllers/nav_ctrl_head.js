function navCtrl_head($scope, $rootScope){
    $scope.fullname = getCookie('user_fullname');
    $scope.fullname2 = "Thông tin tài khoản"; 
    
    $scope.logout = function() {
        //setcookie('user_id', data.user_info.id);  
        //setcookie('user_id', 0);
        window.location = MyappConfig.HOST+'login.html';
    }
    
    $rootScope.menu = 'home';
    $scope.menuActive = function(obj) {
        $rootScope.menu = obj;
    }
  //  
//    $scope.$watch('root_room_list', function(rooms) {
//        if(rooms) {
//            console.log(rooms);
//        }
//    })
    
    
}