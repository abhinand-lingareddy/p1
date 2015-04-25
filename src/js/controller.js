var p1=angular.module('p1', []);
p1.controller("userController",['$scope','$http','$location',function($scope,$http,$location){
	$scope.editClick=function(i){
		$scope.edit[i]="false";
	}
	$scope.addRequest=function(){
		var request = $http({
		    method: "post",
		    url: "/update.php",
		    data: {
		        record_type: "achievements",
		        record: $scope.ach,
		    },
		    headers: { 'Content-Type': 'application/x-www-form-urlencoded',
		    	}
		});
		request.success(function (data) {
		    
		});
		$scope.user["achievements"].push($scope.ach);
		$scope.ach=[];

	}
	$scope.updateRequest=function(index){
		var request = $http({
		    method: "post",
		    url: "/update.php",
		    data: {
		        record_id: index,
		        record_type: "achievements",
		        record: $scope.user["achievements"][index],
		    },
		    headers: { 'Content-Type': 'application/x-www-form-urlencoded',
		    	}
		});
		request.success(function (data) {
		    
		});
		
		$scope.edit[index]="true";

	}
	$scope.deleteRequest=function(index){
		var request = $http({
		    method: "post",
		    url: "/delete.php",
		    data: {
		        record_id: index,
		        record_type: "achievements"
		    },
		    headers: { 'Content-Type': 'application/x-www-form-urlencoded',
		    	}
		});
		request.success(function (data) {
			$scope.user["achievements"].splice(index,1);
		});
		
		
		$scope.edit[index]="true";

	}
	$scope.dataInit=function(data){
		$scope.edit=[];
		var request = $http({
		    method: "post",
		    url: "/profile.php",
		    headers: { 'Content-Type': 'application/json'
		    	}
		});
		request.success(function (data) {
		    $scope.user=data;
		});
	}
	
	
}]);

