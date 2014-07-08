function signoutCtrl($scope, User, $rootScope) {  
     $rootScope.root_title = 'Rời khỏi phòng';
    
    // load form to invi member to room
     $scope.invMember = function() {
        $scope.load_form_invi(); 
     }
    $scope.userId = getCookie('user_id');
    $rootScope.confirm_del_member = false;
    $scope.roomIdDel;
    // confirm del member from room
    $scope.confirmDelMember = function(userId) {
        popup('div-confirm-popup');
        $rootScope.confirm_del_member = true;
        $rootScope.root_screen_show = true
        $scope.roomIdDel = userId;
        console.log($scope.roomIdDel);
    }
    
    // del member from room
    $scope.memberDel = function(bl) {
        if(bl) {
            User.remove('member_del', 'roomId='+$scope.roomIdDel+'&memberId='+$scope.userId).success(function(data){  
                $rootScope.triggerRoom = true;
            });
        } 
        $scope.popup_close('confirm_del_member', 1)
    }
    
    // load member of room
    $scope.$watch('root_room_list', function(roomList) {
        if(roomList) {
             console.log($rootScope.root_room_list );
        }
     }) ;  
     // owner
     $scope.owner =false;
     $scope.$watch('user.owner', function(owner) {
        if(owner != undefined) {
            $scope.owner = owner;
        }
     })
    
} 



   


