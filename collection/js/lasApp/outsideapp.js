var myApp = angular.module('lasApp', ['data']);
	myApp.config(['$routeProvider', '$locationProvider', function($routeProvider, $locationProvider) {
	    $routeProvider
          .when('/', {templateUrl: '/public/intro.html',   controller: loginCtrl})
		  .when('/login.html', {templateUrl: '/public/login.html',   controller: loginCtrl})
          .when('/registry.html', {templateUrl: '/public/registry.html',   controller: regCtrl})
          .when('/gioi-thieu.html', {templateUrl: '/public/intro.html',   controller: introCtrl})
          .when('/huong-dan.html', {templateUrl: '/public/huong-dan.html',   controller: guiCtrl})
          .when('/hoi-dap.html', {templateUrl: '/public/question.html',   controller: questionCtrl})
          //.when('/error', {templateUrl: '/html/404.html',   controller: loginCtrl})
		  //.otherwise({redirectTo: '/error'});
		  $locationProvider.html5Mode(true);
	}]);
    
    function lasCtrl($rootScope, $scope) {
        $rootScope.act = 'contact';
        $scope.setAct = function(act) {
            $rootScope.act = act;
        }   
    }    
        
    function introCtrl($rootScope) {
        $rootScope.root_title = 'LAS - Giới thiệu';
        $rootScope.act = 'contact';
    }     
        
    function guiCtrl($rootScope) {
        $rootScope.root_title = 'LAS - Hướng dẫn sử dụng';
         $rootScope.act = 'guide';
    }
     function questionCtrl($rootScope, $scope) {
        $rootScope.root_title = 'LAS - Hỏi đáp';
        $rootScope.act = 'question';
    }    
        
    function loginCtrl($rootScope,$scope, Login) {
        
        $rootScope.root_title = 'LAS - Đăng nhập';
        $scope.email;
        $scope.password ;
        $scope.submited = false;
        $scope.error = {};  
        setcookie('user_id', 0);             
                   
        $scope.doLogin = function() {
            if($scope.loginForm.$valid) {
                user = Login.post('email='+$scope.email+'&password='+$scope.password);
                user.success(function(data){
                    if(data.login == true) {    
                        set_values_for_cookie(data);                                
                        var redirect = MyappConfig.HOST+'app';
                        if(document.referrer) {
                            redirect = document.referrer;
                        }                    
                            window.location = redirect;
                    } else {
                        $scope.error.login = true;
                        console.log(data.error);
                    }   
                });
            } 
        }    
    }
    
    function regCtrl($rootScope, $scope, Login) {
        
         $rootScope.root_title = 'LAS - Đăng ký';
          $rootScope.act = 'registry';
         $scope.error = {};  
         
         $scope.sign_up = function(){
            if($scope.regForm.$valid) {
                if($scope.rgpassword != $scope.rgconfirmpassword) {
                    $scope.error.erpassword = true;
                } else {
                    $scope.error.erpassword = false;
                }
                if($scope.rgpassword.length < 3 ) {
                    $scope.error.erpasswordLengh = true;
                    $scope.error.erpassword = false;
                } else {
                    $scope.error.erpasswordLengh = false;
                }
                
                if(!$scope.error.erpassword && !$scope.error.erpasswordLengh ) {
                    reg = Login.registry('regitry', 'email='+$scope.rgemail+'&password='+$scope.rgpassword+'&fullname='+$scope.rgfullname);
                    reg.success(function(data){
                        if(data.success = true) {
                            if(data.exist) {                                
                                $scope.error.userexist = true;
                            } else {
                                set_values_for_cookie(data);            
                                window.location = MyappConfig.HOST+'app';
                            }
                        } else {
                            console.log('invalid form');
                        }
                    });
                }
            } else {
                console.log('pass');
            }
        }    
    } 
    
    
    
    function set_values_for_cookie(data) {
        if(data) {
            setcookie('token', data.token);
            setcookie('user_id', data.user_info.id);  
            setcookie('user_fullname', data.user_info.full_name);
            setcookie('user_email', data.user_info.email);
            setcookie('user_last_login', data.user_info.last_login);
            setcookie('user_first_login', data.user_info.first_login);
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
    
    
   
    
      


 
  


