<script type="text/javascript" src="srcjs/angular/angular.js"></script>
<script type="text/javascript" src="srcjs/angular/ng-file-upload.js"></script>
<script type="text/javascript" src="srcjs/controller.js"></script>
<div ng-app="p1" ng-controller="searchController">

<input type="text" ng-model = "query"  ng-change="change()" ></input>
<ul>
<div ng-repeat="item in items">
<li ng-click="openProfile(item)">{{item}}
</li>
</div>
</ul>
</div>