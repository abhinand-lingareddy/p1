var p1=angular.module('p1', []);
p1.controller("userController",['$scope','$http',function($scope,$http){
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
p1.controller("peerController",['$scope','$http',function($scope,$http){
	$scope.dataInit=function(data,id){
		$scope.edit=[];
		var request = $http({
		    method: "get",
		    url: "/peerprofile.php?user="+data,
		    headers: { 'Content-Type': 'application/json'
		    	}
		});
		request.success(function (data) {
		    $scope.user=data;
		    if(id==null||id==$scope.user.id){
		    	$scope.connect=true;
		    }
		    else{
		    	$scope.connect=false;
		    	if($scope.user.connections.indexOf(id)!=-1){
		    		$scope.connectionbutton="disconnect";
		    	}else if($scope.user.pendingrequests.indexOf(id)!=-1){
		    		$scope.connectionbutton="request sent";
		    	}else{
		    		$scope.connectionbutton="connect";
		    	}
		    }
		});
	}
	$scope.addConnection=function(id){
			var request = $http({
			    method: "post",
			    url: "/update.php",
			    data: {
			        record_type: "pendingrequests",
			        record: $scope.user.id,
			    },
			    headers: { 'Content-Type': 'application/x-www-form-urlencoded',
			    	}
			});
			request.success(function (data) {
				$scope.user["pendingrequests"].push(id);  
				$scope.connectionbutton="request sent";
			});
		}	
	
}]);

p1.controller("searchController",['$scope','$http','$window',function($scope,$http,$window){
	$scope.items=[];
	$scope.change=function(){
		var request = $http({
		    method: "get",
		    url: "/search.php?user="+$scope.query,
		    headers: { 'Content-Type': 'application/json'
		    	}
		});
		request.success(function (data) {
		    $scope.items=data;
		});
	}
	$scope.openProfile=function(item){
		$window.location.href="/userprofile.php?user="+item;
	}
	
}]);
