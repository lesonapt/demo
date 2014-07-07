angular.module("data", ["ngResource"])
    .factory("Login", function ($http) {
         return {
            post: function(params){
                return $http.get(MyappConfig.API+'/api/login/dolog?'+params).success(function(data) {});
            },
            registry: function(act, params){
                return $http.post(MyappConfig.API+'/api/login/'+act+'?'+params).success(function(data) {});
            },
            get_token: function(){
                return $http.get('/api/login/refresh_token?token='+getCookie('token')).success(function(data) {});
            }
        }      
    })
    .factory("Spend", function ($http) {
         return {
            get: function(act, params){
                return $http.get('/api/spend/'+act+'?'+params+'&token='+getCookie('token')).success(function(data) {});
            },
            post: function(act, params){
                return $http.get('/api/spend/'+act+'?'+params+'&token='+getCookie('token')).success(function(data) {});
            },
            remove: function(act, params){
                return $http.get('/api/spend/'+act+'?'+params+'&token='+getCookie('token')).success(function(data) {});
            },
            update: function(act, params){
                return $http.get('/api/spend/'+act+'?'+params+'&token='+getCookie('token')).success(function(data) {});
            }
        }      
    })
    .factory("User", function ($http) {
          return {
            get: function(act, params){
                return $http.get('/api/user/'+act+'?'+params+'&token='+getCookie('token')).success(function(data) {});
            },
            get_members: function(params){
                return $http.get('/api/user/load_user_by_room_id?'+params+'&token='+getCookie('token')).success(function(data) {});
            },
            get_room: function(params){
                return $http.get('/api/user/load_room_of_user?'+params+'&token='+getCookie('token')).success(function(data) {});
            },
            post: function(act, params){
                return $http.get('/api/user/'+act+'?'+params+'&token='+getCookie('token')).success(function(data) {});
            },
            remove: function(act, params){
                return $http.get('/api/user/'+act+'?'+params+'&token='+getCookie('token')).success(function(data) {});
            },
            update: function(params){
                return $http.get(MyappConfig.API+'api/user/update?'+params).success(function(data) {});
            }
        }  
    })
    .factory("Plane",  function ($http) {
       return {
            get: function(act, params){
                return $http.get('/api/plane/'+act+'?'+params+'&token='+getCookie('token')).success(function(data) {});
            },
            post: function(act, params){
                return $http.get('/api/plane/'+act+'?'+params+'&token='+getCookie('token')).success(function(data) {});
            },
            remove: function(act, params){
                return $http.get('/api/plane/'+act+'?'+params+'&token='+getCookie('token')).success(function(data) {});
            },
            update: function(act, params){
                return $http.get('/api/plane/'+act+'?'+params+'&token='+getCookie('token')).success(function(data) {});
            }
        }     
    })  
     .factory("Room",  function ($http) {
       return {
            get: function(act, params){
                return $http.get('/api/room/'+act+'?'+params+'&token='+getCookie('token')).success(function(data) {});
            },
            post: function(act, params){
                return $http.get('/api/room/'+act+'?'+params+'&token='+getCookie('token')).success(function(data) {});
            },
            remove: function(act, params){
                return $http.get('/api/room/'+act+'?'+params+'&token='+getCookie('token')).success(function(data) {});
            },
            update: function(act, params){
                return $http.get('/api/room/'+act+'?'+params+'&token='+getCookie('token')).success(function(data) {});
            }
        }     
    })    
   .factory("Static",  function ($http) {
       return {
            get: function(act, params){
                return $http.get('/api/chartstatic/'+act+'?'+params+'&token='+getCookie('token')).success(function(data) {});
            },
            post: function(act, params){
                return $http.get('/api/chartstatic/'+act+'?'+params+'&token='+getCookie('token')).success(function(data) {});
            },
            remove: function(act, params){
                return $http.get('/api/chartstatic/'+act+'?'+params+'&token='+getCookie('token')).success(function(data) {});
            },
            update: function(act, params){
                return $http.get('/api/chartstatic/'+act+'?'+params+'&token='+getCookie('token')).success(function(data) {});
            }
        }     
    }).  
    factory('cache', ['$cacheFactory', function ($cacheFactory) {
		var _caches = {};

		return function (cacheId, limit) {
			if (!(cacheId in _caches)) {
				_caches[cacheId] = $cacheFactory(cacheId, { limit: limit || 1000 });
			}
			return _caches[cacheId];
		};
	}]);
