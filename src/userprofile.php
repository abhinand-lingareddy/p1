
<head>
<script type="text/javascript" src="js/angular/angular.js"></script>
<script type="text/javascript" src="js/controller.js"></script>
</head>
<body ng-app="p1" ng-controller="peerController" id="contentsDivID" ng-init="dataInit('<?php echo $_GET['user']?>')" >

username{{user['name']}}<br>
email{{user['email']}}<br>
dob{{user['dob']}}<br>


<div ng-repeat="ach in user['achievements']">

<div>
<h3>title</h3>{{ach['title']}}<br>
<h3>date</h3>{{ach['date']}}<br>
<h3>organisation</h3>{{ach['organisation']}}<br>
<h3>description</h3>{{ach['description']}}<br>

</div>

