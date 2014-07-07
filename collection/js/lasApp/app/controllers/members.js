function memberCtrl($scope, User, $rootScope) {  
     $rootScope.root_title = 'Thành viên';

    // load form to invi member to room
     $scope.invMember = function() {
        $scope.load_form_invi(); 
     }
    $scope.userId = getCookie('user_id');
    $rootScope.confirm_del_member = false;
    $scope.uerIdDel;
    // confirm del member from room
    $scope.confirmDelMember = function(userId) {
        popup('div-confirm-popup');
        $rootScope.confirm_del_member = true;
        $rootScope.root_screen_show = true
        $scope.uerIdDel = userId;
    }
    
    // del member from room
    $scope.memberDel = function(bl) {
        if(bl) {
            User.remove('member_del', 'roomId='+$rootScope.root_room.id+'&memberId='+$scope.uerIdDel).success(function(data){  
                $rootScope.trigger = true;
            });
        } 
        $scope.popup_close('confirm_del_member', 1)
    }
    
    // load member of room
    $scope.$watch('root_room_members[0].money_use', function(members) {
        if(members) {
            
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



   



