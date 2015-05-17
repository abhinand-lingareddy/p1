var p1=angular.module('p1', ['ngFileUpload']);
p1.controller("userController",['$scope','$http','Upload',function($scope,$http,Upload){
	
	$scope.onFileSelect = function($files) {
	    var file = $files[0];
	    if(file!=null){
	    if (file.type.indexOf('image') == -1) {
	         $scope.error = 'image extension not allowed, please choose a JPEG or PNG file.'            
	    }
	    if (file.size > 2097152){
	         $scope.error ='File size cannot exceed 2 MB';
	    }     
	    $scope.upload = Upload.upload({
	        url: "/upload.php",
	        data: {fname: $scope.fname},
	        file: file,
	      }).success(function(data, status, headers, config) {
	        // file is uploaded successfully
	        console.log(data);
	      });
	    }
	}
	
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
		        session:"session"
		    },
		    headers: { 'Content-Type': 'application/x-www-form-urlencoded',
		    	}
		});
		request.success(function (data) {
			$scope.user["achievements"].push($scope.ach);
			$scope.ach=[];
		});
		

	}
	$scope.rejectRequest=function(index){
		var request = $http({
		    method: "post",
		    url: "/delete.php",
		    data: {
		        record_type: "pendingrequests",
		        record: $scope.user.pendingrequests[index][1],
		        session:"true"
		    },
		    headers: { 'Content-Type': 'application/x-www-form-urlencoded',
		    	}
		});
		request.success(function (data) {
			$scope.user.pendingrequests.splice(index,1);
		});
	}
	$scope.connectRequest=function(index){
		var request = $http({
		    method: "post",
		    url: "/connect.php",
		    data: {
		        connectId: $scope.user.pendingrequests[index][1]
		    },
		    headers: { 'Content-Type': 'application/x-www-form-urlencoded',
		    	}
		});
		request.success(function (data) {
			$scope.user.pendingrequests.splice(index,1);
		});
	}
	$scope.updateRequest=function(index){
		var request = $http({
		    method: "post",
		    url: "/update.php",
		    data: {
		        record_id: index,
		        record_type: "achievements",
		        record: $scope.user["achievements"][index],
		        session:"session"
		    },
		    headers: { 'Content-Type': 'application/x-www-form-urlencoded',
		    	}
		});
		request.success(function (data) {
			$scope.edit[index]="true";
		});
		
		

	}
	$scope.deleteRequest=function(index){
		var request = $http({
		    method: "post",
		    url: "/delete.php",
		    data: {
		        record_id: index,
		        record_type: "achievements",
		        session:"session"
		    },
		    headers: { 'Content-Type': 'application/x-www-form-urlencoded',
		    	}
		});
		request.success(function (data) {
			$scope.user["achievements"].splice(index,1);
		});
		

	}
	$scope.dataInit=function(data){
		$scope.edit=[];
		var request = $http({
		    method: "post",
		    url: "/myprofilerest.php",
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
		    url: "/profilerest.php?user="+data,
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
		    	}else if($scope.user.pendingrequest!=null&&$scope.user.pendingrequest===true){
		    		$scope.connectionbutton="request sent";
		    	}else{
		    		$scope.connectionbutton="connect";
		    	}
		    }
		});
	}
	$scope.addConnection=function(id){
		if($scope.connectionbutton=="connect"){
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
				$scope.connectionbutton="request sent";
			});
		}else if($scope.connectionbutton=="request sent"){
			
			var request = $http({
			    method: "post",
			    url: "/delete.php",
			    data: {
			        record_type: "pendingrequests",
			        record: $scope.user.id,
			    },
			    headers: { 'Content-Type': 'application/x-www-form-urlencoded',
			    	}
			});
			request.success(function (data) {
				$scope.connectionbutton="connect";
			});
		}else if($scope.connectionbutton=="disconnect"){
			var request = $http({
			    method: "post",
			    url: "/disconnect.php",
			    data: {
			        connectId: $scope.user.id
			    },
			    headers: { 'Content-Type': 'application/x-www-form-urlencoded',
			    	}
			});
			request.success(function (data) {
				$scope.connectionbutton="connect";
			});
		}
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
		$window.location.href="/profile.php?user="+item;
	}
	
}]);
