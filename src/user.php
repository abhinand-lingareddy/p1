<?php require 'session.php';?>

<head>
<script type="text/javascript" src="js/angular/angular.js"></script>
<script type="text/javascript" src="js/controller.js"></script>
</head>
<body ng-app="p1" ng-controller="userController" id="contentsDivID" ng-init="dataInit()" >

username{{user['name']}}<br>
email{{user['email']}}<br>
dob{{user['dob']}}<br>

<div ng-repeat="pendingrequest in user['pendingrequests']">
<label>{{pendingrequest[0]}}</label>
<button ng-click="connectRequest($index)">connect</button>
<button ng-click="rejectRequest($index)">reject</button>
</div>



<div ng-repeat="ach in user['achievements']">
<ng:switch on='edit[$index]'>
<div ng:switch-when="false">
Title: <input type='text' ng-model="ach['title']"> <br>
Date: <input type='text' ng-model="ach['date']" > <br>
Organisation: <input type='text' ng-model="ach['organisation']"> <br>
description
<textarea ng-model="ach['description']" ></textarea>
<button ng-click='updateRequest($index)'>update</button>
</div>
<div ng:switch-default>
<h3>title</h3>{{ach['title']}}<br>
<h3>date</h3>{{ach['date']}}<br>
<h3>organisation</h3>{{ach['organisation']}}<br>
<h3>description</h3>{{ach['description']}}<br>
<input type='image' src='pic/edit.png'  ng-click='editClick($index)'>
<input type='image' src='pic/delete.png' ng-click='deleteRequest($index)'>
</div>
</ng:switch>
</div>




<br> Add achievement<br>
		Title: <input type="text" name="title" ng-model="ach['name']"><br>
		 Organisation: <input	type="text" name="organisation" ng-model="ach['organisation']"><br>
		  Date: <input type="text"	name="date" ng-model="ach['date']"><br> 
		  <label>Description </label>
		<textarea name="description" ng-model="ach['description']"></textarea>
		<button ng-click='addRequest()'>add</button>



</body>
