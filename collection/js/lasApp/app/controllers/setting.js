function settingCtrl($scope, User, $rootScope) {  
    $rootScope.root_title = 'Setting';
    $scope.submited = false;
    $scope.userSetting = {};
    $scope.userId = getCookie('user_id');
    msgLoading('Loading...');
    
    User.get('select_member', 'userId='+$scope.userId).success(function(data) {        
        if(data[0]) {
            $scope.userSetting.username = data[0].email;
            $scope.userSetting.full_name = data[0].full_name;
            $scope.userSetting.email = data[0].email;
            msgEndloading('Loading complate');
        }           
    });
    
    $scope.settingUpdate = function() {
        $scope.submited = true;
        var valid = $scope.settingForm.$valid;
        if(valid) {
            if($scope.userSetting.password != $scope.userSetting.rpassword ) {
                $scope.errorPass = true;
            } else {
                  User.get('update_member', 'userId='+$scope.user.id+'&email='+$scope.userSetting.email+'&fullName='+$scope.userSetting.full_name+'&password='+$scope.userSetting.password).success(function(data) {        
                    $rootScope.trigger = true;
                    msgTimeout('<strong>Cập nhật </strong>thành công');
                  });  
            }
        } 
    }
    
} 



   



