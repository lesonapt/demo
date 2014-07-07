var myApp1 = angular.module('myApp', ['data', 'myDirective']);
	myApp1.config(['$routeProvider', '$locationProvider', function($routeProvider, $locationProvider) {
	    $routeProvider
		  .when('/app/', {templateUrl: 'views/home.html',   controller: homeCtrl})
          .when('/app/home', {templateUrl: 'views/home.html',   controller: homeCtrl})
          .when('/app/calender', {templateUrl: 'views/calender.html',   controller: calenderCtrl})
          .when('/app/static', {templateUrl: 'views/static.html',   controller: staticCtrl})
          .when('/app/plane', {templateUrl: 'views/plane.html',   controller: planeCtrl})
          .when('/app/print', {templateUrl: 'views/print.html',   controller: printCtrl})
          .when('/app/setting', {templateUrl: 'views/setting.html',   controller: settingCtrl})
          .when('/app/sign-out', {templateUrl: 'views/signout.html',   controller: signoutCtrl})
          .when('/app/members', {templateUrl: 'views/members.html',   controller: memberCtrl})
		  .when('/app/error', {templateUrl: 'views/error.html',   controller: error})
		  .otherwise({redirectTo: '/app/error'});
		  $locationProvider.html5Mode(true);
	}]);
  
    function myCtrl($scope, $location, Login, $rootScope) {
       checkExistCookie('user_id');
       token = Login.get_token();
       token.success(function(data) {
        if(data.token == false) {
            setcookie('token', null);
            window.location = MyappConfig.HOST+'login.html';
           } 
       });
       
       $scope.popup_close = function(scope_element, show) { 
            $rootScope[scope_element] = false;
            $rootScope.invi = false;
            if(show == 1) {
                $rootScope.root_screen_show = false;
            }
            $rootScope.root_screen_show = (show == 1) ? false : true;
       }
    }
    
    function checkExistCookie(c_name) {
        if(getCookie(c_name) == 0){ 
           window.location = MyappConfig.HOST+'login.html';
            //$location.path(MyappConfig.HOST+'/user/login');
        } else {
            //window.location = MyappConfig.HOST;
        }
    }
  
    function setcookie(c_name, c_value){
        document.cookie = c_name+'='+c_value;
    }
  
    function getCookie(c_name)
    {
        var c_value = document.cookie;
        var c_start = c_value.indexOf(" " + c_name + "=");
        
        if (c_start == -1) {
          c_start = c_value.indexOf(c_name + "=");
        }
        if (c_start == -1) {
          c_value = null;
        }
        else {
          c_start = c_value.indexOf("=", c_start) + 1;
          var c_end = c_value.indexOf(";", c_start);
          
          if (c_end == -1) {
            c_end = c_value.length;
          }
          c_value = unescape(c_value.substring(c_start,c_end));
        } 
        return c_value;
    }
    
    function error() {
     console.log('error');
    }
    
      


 
  


