angular.module("videoService", ["ngResource"]).
       factory("Video", function ($resource) {
           return $resource("/api/:Id",{Id: "@Id" },
               { "update": {method:"PUT"} },
			   { "get": {method:"GET"} }
          );
});

  
angular.module('money.resource', ['ngResource'])
  .factory('Data',['$http', '$q','$resource', function($http, $q, $resource){
	  var url ='api/';
	  return {
        getPeople: function () {
            return $http.get(url);
        },
        addPerson: function (person) {
            return $http.post(url, person);
        },
        deletePerson: function (person) {
            return $http.delete(url + person.Id);
        },
        updatePerson: function (person) {
            return $http.put(url + person.Id, person);
        }
    };	
  }]);
  
  
  
  
//  
//angular.module('money.resource', [])
//  .factory('Data',['$http', '$q', function($http, $q){
//	  function del(path) {
//        var deferred = $q.defer();
//		$.ajax({
//			url:MyappConfig.API+path,
//			dataType: 'jsonp', 
//			success:function(data){
//			   deferred.resolve(data);
//			},
//			error:function(error){
//				deferred.reject("An error occured while fetching items");
//			}
//		 });
//      //Returning the promise object
//      return deferred.promise;
//	  }
//	  function save() {
//		return 'save';
//	  }
//	  return {
//		delete : function(msg){return del(msg);},
//		save : 'asd'
//	  }
//	
//    return{
//      getAllItems: function(path){
//        //Creating a deferred object
//        var deferred = $q.defer();
//		$.ajax({
//			url:MyappConfig.API+path,
//			dataType: 'jsonp', 
//			success:function(data){
//			   deferred.resolve(data);
//			},
//			error:function(error){
//				deferred.reject("An error occured while fetching items");
//			}
//		 });
//      //Returning the promise object
//      return deferred.promise;
//    },
//	getAllList: function(path) {
//	  console.log('resource 44');
//	  var deferred = $q.defer();
//	  $http.get(MyappConfig.API+path, {"foo":"bar"})
//	  .success(function(data, status, headers, config) {
//		  deferred.resolve(data);
//	  }).error(function(data, status, headers, config) {
//		  deferred.resolve(status);
//	  });
//	  return deferred.promise;
//	  
////	  $http({
////		  url: MyappConfig.API+path,
////		  method: "POST",
////		  data: {"foo":"bar"},
////		  headers: {'Content-Type': 'application/x-www-form-urlencoded'}
////	  }).success(function(data, status, headers, config) {
////		  $scope.data = data;
////	  }).error(function(data, status, headers, config) {
////		  $scope.status = status;
////	  });
//	}
//  }; 

  