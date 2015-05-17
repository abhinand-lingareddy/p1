<!DOCTYPE html>
<html class="st-layout ls-top-navbar ls-bottom-footer show-sidebar sidebar-l2" lang="en">
<?php require "session.php"?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ThemeKit</title>
    <script type="text/javascript" src="srcjs/angular/angular.js"></script>
<script type="text/javascript" src="srcjs/angular/ng-file-upload.js"></script>
<script type="text/javascript" src="srcjs/controller.js"></script>
    <!-- Compressed Vendor BUNDLE
    Includes vendor (3rd party) styling such as the customized Bootstrap and other 3rd party libraries used for the current theme/module -->
    <link href="css/vendor.min.css" rel="stylesheet">
    <!-- Compressed Theme BUNDLE
Note: The bundle includes all the custom styling required for the current theme, however
it was tweaked for the current theme/module and does NOT include ALL of the standalone modules;
The bundle was generated using modern frontend development tools that are provided with the package
To learn more about the development process, please refer to the documentation. -->
    <!-- <link href="css/theme.bundle.min.css" rel="stylesheet"> -->
    <!-- Compressed Theme CORE
This variant is to be used when loading the separate styling modules -->
    <link href="css/theme-core.min.css" rel="stylesheet">
    <!-- Standalone Modules
    As a convenience, we provide the entire UI framework broke down in separate modules
    Some of the standalone modules may have not been used with the current theme/module
    but ALL modules are 100% compatible -->
    <link href="css/module-essentials.min.css" rel="stylesheet" />
    <link href="css/module-layout.min.css" rel="stylesheet" />
    <link href="css/module-sidebar.min.css" rel="stylesheet" />
    <link href="css/module-sidebar-skins.min.css" rel="stylesheet" />
    <link href="css/module-navbar.min.css" rel="stylesheet" />
    <!-- <link href="css/module-media.min.css" rel="stylesheet" /> -->
    <link href="css/module-timeline.min.css" rel="stylesheet" />
    <link href="css/module-cover.min.css" rel="stylesheet" />
    <link href="css/module-chat.min.css" rel="stylesheet" />
    <!-- <link href="css/module-charts.min.css" rel="stylesheet" /> -->
    <link href="css/module-maps.min.css" rel="stylesheet" />
    <!-- <link href="css/module-colors-alerts.min.css" rel="stylesheet" /> -->
    <!-- <link href="css/module-colors-background.min.css" rel="stylesheet" /> -->
    <!-- <link href="css/module-colors-buttons.min.css" rel="stylesheet" /> -->
    <!-- <link href="css/module-colors-calendar.min.css" rel="stylesheet" /> -->
    <!-- <link href="css/module-colors-progress-bars.min.css" rel="stylesheet" /> -->
    <!-- <link href="css/module-colors-text.min.css" rel="stylesheet" /> -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries
WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!-- If you don't need support for Internet Explorer <= 8 you can safely remove these -->
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body ng-app="p1" ng-controller="peerController" id="contentsDivID" ng-init="dataInit('<?php echo $_GET['user']?>',<?php echo $_SESSION['id']?>)">
    <!-- Wrapper required for sidebar transitions -->
    <div class="st-container">
        <!-- Fixed navbar -->
        <div class="navbar navbar-main navbar-primary navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="#sidebar-menu" data-effect="st-effect-1" data-toggle="sidebar-menu" class="toggle pull-left visible-xs"><i class="fa fa-ellipsis-v"></i></a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#sidebar-chat" data-toggle="sidebar-menu" data-effect="st-effect-1" class="toggle pull-right visible-xs"><i class="fa fa-comments"></i></a>
                    <a class="navbar-brand" href="index.html">ThemeKit</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="main-nav">
                    <ul class="nav navbar-nav">
                        <li><a href="../../index.html">Themes</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li class="dropdown-header">Public User Pages</li>
                                <li><a href="index.html">Timeline</a>
                                </li>
                                <li><a href="user-public-profile.html">About</a>
                                </li>
                                <li><a href="user-public-users.html">Friends</a>
                                </li>
                                <li class="dropdown-header">Private User Pages</li>
                                <li><a href="user-private-messages.html">Messages</a>
                                </li>
                                <li class="active"><a href="user-private-profile.html">Profile</a>
                                </li>
                                <li><a href="user-private-timeline.html">Timeline</a>
                                </li>
                                <li><a href="user-private-users.html">Friends</a>
                                </li>
                            </ul>
                        </li>
                       
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden-xs">
                            <a href="#sidebar-chat" data-toggle="sidebar-menu" data-effect="st-effect-1">
                                <i class="fa fa-comments"></i>
                            </a>
                        </li>
                        <!-- User -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle user" data-toggle="dropdown">
                                <img src="images/people/110/guy-5.jpg" alt="Bill" class="img-circle" width="40" /><?php echo  $_SESSION['username']?>  <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li class="active"><a href="user-private-profile.html">Profile</a>
                                </li>
                                <li><a href="user-private-messages.html">Messages</a>
                                </li>
                                <li><a href="login.html">Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
        </div>
        <!-- Sidebar component with st-effect-1 (set on the toggle button within the navbar) -->
        <div class="sidebar left sidebar-size-2 sidebar-offset-0 sidebar-visible-desktop sidebar-visible-mobile sidebar-skin-dark" id="sidebar-menu">
            <div data-scrollable>
                <div class="sidebar-block">
                    <div class="profile">
                        <img src="images/people/110/guy-5.jpg" alt="people" class="img-circle" />
                        <h4>{{user['name']}}</h4>
                         <button ng-hide="connect" ng-click="addConnection(<?php echo $_SESSION['id']?>)" class="btn btn-default" >{{connectionbutton}}</button>
                    </div>
                </div>
                <h4 class="category">Account</h4>
                <ul class="sidebar-menu">
                    <li class="active"><a href="myprofile.php"><i class="icon-user-1"></i> <span>My Profile</span></a>
                    </li>
                    <li><a ><i class="icon-comment-fill-1"></i> <span>Message</span></a>
                    </li>
                    <li><a href="login.php"><i class="icon-unlock-fill"></i> <span>Logout</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Sidebar component with st-effect-1 (set on the toggle button within the navbar) -->
        <div class="sidebar sidebar-chat right sidebar-size-2 sidebar-offset-0 chat-skin-white sidebar-visible-mobile" id=sidebar-chat>
            <div class="split-vertical">
                <div class="chat-search">
                    <input type="text" class="form-control" placeholder="Search" />
                </div>
                <ul class="chat-filter nav nav-pills ">
                    <li class="active"><a href="#" data-target="li">All</a>
                    </li>
                    <li><a href="#" data-target=".online">Online</a>
                    </li>
                    <li><a href="#" data-target=".offline">Offline</a>
                    </li>
                </ul>
                <div class="split-vertical-body">
                    <div class="split-vertical-cell">
                        <div data-scrollable>
                            <ul class="chat-contacts">
                                <li class="online" data-user-id="1">
                                    <a href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <span class="status"></span>
                                                <img src="images/people/110/guy-6.jpg" width="40" class="img-circle" />
                                            </div>
                                            <div class="media-body">
                                                <div class="contact-name">Jonathan S.</div>
                                                <small>"Free Today"</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="online away" data-user-id="2">
                                    <a href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <span class="status"></span>
                                                <img src="images/people/110/woman-5.jpg" width="40" class="img-circle" />
                                            </div>
                                            <div class="media-body">
                                                <div class="contact-name">Mary A.</div>
                                                <small>"Feeling Groovy"</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="online" data-user-id="3">
                                    <a href="#">
                                        <div class="media">
                                            <div class="pull-left ">
                                                <span class="status"></span>
                                                <img src="images/people/110/guy-3.jpg" width="40" class="img-circle" />
                                            </div>
                                            <div class="media-body">
                                                <div class="contact-name">Adrian D.</div>
                                                <small>Busy</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="offline" data-user-id="4">
                                    <a href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <img src="images/people/110/woman-6.jpg" width="40" class="img-circle" />
                                            </div>
                                            <div class="media-body">
                                                <div class="contact-name">Michelle S.</div>
                                                <small>Offline</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="offline" data-user-id="5">
                                    <a href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <img src="images/people/110/woman-7.jpg" width="40" class="img-circle" />
                                            </div>
                                            <div class="media-body">
                                                <div class="contact-name">Daniele A.</div>
                                                <small>Offline</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="online" data-user-id="6">
                                    <a href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <span class="status"></span>
                                                <img src="images/people/110/guy-4.jpg" width="40" class="img-circle" />
                                            </div>
                                            <div class="media-body">
                                                <div class="contact-name">Jake F.</div>
                                                <small>Busy</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="online away" data-user-id="7">
                                    <a href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <span class="status"></span>
                                                <img src="images/people/110/woman-6.jpg" width="40" class="img-circle" />
                                            </div>
                                            <div class="media-body">
                                                <div class="contact-name">Jane A.</div>
                                                <small>"Custom Status"</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="offline" data-user-id="8">
                                    <a href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <span class="status"></span>
                                                <img src="images/people/110/woman-8.jpg" width="40" class="img-circle" />
                                            </div>
                                            <div class="media-body">
                                                <div class="contact-name">Sabine J.</div>
                                                <small>"Offline right now"</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="online away" data-user-id="9">
                                    <a href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <span class="status"></span>
                                                <img src="images/people/110/woman-9.jpg" width="40" class="img-circle" />
                                            </div>
                                            <div class="media-body">
                                                <div class="contact-name">Danny B.</div>
                                                <small>Be Right Back</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="online" data-user-id="10">
                                    <a href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <span class="status"></span>
                                                <img src="images/people/110/woman-8.jpg" width="40" class="img-circle" />
                                            </div>
                                            <div class="media-body">
                                                <div class="contact-name">Elise J.</div>
                                                <small>My Status</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="online" data-user-id="11">
                                    <a href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <span class="status"></span>
                                                <img src="images/people/110/guy-3.jpg" width="40" class="img-circle" />
                                            </div>
                                            <div class="media-body">
                                                <div class="contact-name">John J.</div>
                                                <small>My Status #1</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script id="chat-window-template" type="text/x-handlebars-template">
            <div class="panel panel-default">
                <div class="panel-heading" data-toggle="chat-collapse" data-target="#chat-bill">
                    <a href="#" class="close"><i class="fa fa-times"></i></a>
                    <a href="#">
                        <span class="pull-left">
                    <img src="{{ user_image }}" width="40">
                </span>
                        <span class="contact-name">{{user}}</span>
                    </a>
                </div>
                <div class="panel-body" id="chat-bill">
                    <div class="media">
                        <div class="media-left">
                            <img src="{{ user_image }}" width="25" class="img-circle" alt="people" />
                        </div>
                        <div class="media-body">
                            <span class="message">Feeling Groovy?</span>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <img src="{{ user_image }}" width="25" class="img-circle" alt="people" />
                        </div>
                        <div class="media-body">
                            <span class="message">Yep.</span>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <img src="{{ user_image }}" width="25" class="img-circle" alt="people" />
                        </div>
                        <div class="media-body">
                            <span class="message">This chat window looks amazing.</span>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <img src="{{ user_image }}" width="25" class="img-circle" alt="people" />
                        </div>
                        <div class="media-body">
                            <span class="message">Thanks!</span>
                        </div>
                    </div>
                </div>
                <input type="text" class="form-control" placeholder="Type message..." />
            </div>
        </script>
        <div class="chat-window-container"></div>
        <!-- sidebar effects OUTSIDE of st-pusher: -->
        <!-- st-effect-1, st-effect-2, st-effect-4, st-effect-5, st-effect-9, st-effect-10, st-effect-11, st-effect-12, st-effect-13 -->
        <!-- content push wrapper -->
        <div class="st-pusher" id="content">
            <!-- sidebar effects INSIDE of st-pusher: -->
            <!-- st-effect-3, st-effect-6, st-effect-7, st-effect-8, st-effect-14 -->
            <!-- this is the wrapper for the content -->
            <div class="st-content">
                <!-- extra div for emulating position:fixed of the menu -->
                <div class="st-content-inner">
                    <nav class="navbar navbar-subnav navbar-static-top" role="navigation">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#subnav">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="fa fa-ellipsis-h"></span>
                                </button>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="subnav">
                                <ul class="nav navbar-nav ">
                                   <?php require 'searchbox.php';?>
                                </ul>
                                <ul class="nav navbar-nav  navbar-right ">
                                    <li><a href="login.html"> Logout<i class="fa fa-fw fa-sign-out"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.navbar-collapse -->
                        </div>
                    </nav>
                    <div class="container-fluid">
                        <div class="tabbable">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab"><i class="fa fa-fw fa-picture-o"></i> Photos</a>
                                </li>
                                <li class=""><a href="#profile" data-toggle="tab"><i class="fa fa-fw fa-folder"></i> Albums</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="home">
                                    <img src="images/place1.jpg" alt="image" />
                                    <img src="images/place2.jpg" alt="image" />
                                    <img src="images/food1.jpg" alt="image" />
                                </div>
                                <div class="tab-pane fade" id="profile">
                                    <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
                                </div>
                                <div class="tab-pane fade" id="dropdown1">
                                    <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
                                </div>
                                <div class="tab-pane fade" id="dropdown2">
                                    <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading panel-heading-gray">
                                        <a href="#" class="btn btn-white btn-xs pull-right"><i class="fa fa-pencil"></i></a>
                                        <i class="fa fa-fw fa-info-circle"></i> About
                                    </div>
                                    <div class="panel-body">
                                        <ul class="list-unstyled profile-about margin-none">
                                            <li class="padding-v-5">
                                                <div class="row">
                                                    <div class="col-sm-4"><span class="text-muted">Date of Birth</span>
                                                    </div>
                                                    <div class="col-sm-8">{{user['dob']}}</div>
                                                </div>
                                            </li>
                                            <li class="padding-v-5">
                                                <div class="row">
                                                    <div class="col-sm-4"><span class="text-muted">Job</span>
                                                    </div>
                                                    <div class="col-sm-8">Specialist</div>
                                                </div>
                                            </li>
                                            <li class="padding-v-5">
                                                <div class="row">
                                                    <div class="col-sm-4"><span class="text-muted">Gender</span>
                                                    </div>
                                                    <div class="col-sm-8">Male</div>
                                                </div>
                                            </li>
                                            <li class="padding-v-5">
                                                <div class="row">
                                                    <div class="col-sm-4"><span class="text-muted">Lives in</span>
                                                    </div>
                                                    <div class="col-sm-8">Miami, FL, USA</div>
                                                </div>
                                            </li>
                                            <li class="padding-v-5">
                                                <div class="row">
                                                    <div class="col-sm-4"><span class="text-muted">email</span>
                                                    </div>
                                                    <div class="col-sm-8">{{user['email']}}</div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading panel-heading-gray">
                                        <div class="pull-right">
                                            <button ng-hide="connect" ng-click="addConnection(<?php echo $_SESSION['id']?>)" class="btn btn-primary btn-xs"><i class="fa fa-plus">{{connectionbutton}}</i></button>
                                        </div>
                                        <i class="icon-user-1"></i> Friends
                                    </div>
                                    <div class="panel-body">
                                        <ul class="img-grid">
                                            <li>
                                                <a href="#">
                                                    <img src="images/people/110/guy-6.jpg" alt="image" />
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="images/people/110/woman-3.jpg" alt="image" />
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="images/people/110/guy-2.jpg" alt="image" />
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="images/people/110/guy-9.jpg" alt="image" />
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="images/people/110/woman-9.jpg" alt="image" />
                                                </a>
                                            </li>
                                            <li class="clearfix">
                                                <a href="#">
                                                    <img src="images/people/110/guy-4.jpg" alt="image" />
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="images/people/110/guy-1.jpg" alt="image" />
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="images/people/110/woman-4.jpg" alt="image" />
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img src="images/people/110/guy-6.jpg" alt="image" />
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div ng-repeat="ach in user['achievements']">
                         <div class="row">
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading panel-heading-gray">
                                        <a href="#" class="btn btn-white btn-xs pull-right"><i class="fa fa-pencil"></i></a>
                                        <i class="fa fa-fw fa-info-circle"></i>Achievements</div>
                                    <div class="panel-body">
                                        <ul class="list-unstyled profile-about margin-none">
                                            <li class="padding-v-5">
                                                <div class="row">
                                                    <div class="col-sm-4">Title</div>
                                                    <div class="col-sm-8">{{ach['title']}}</div>
                                                </div>
                                            </li>
                                            <li class="padding-v-5">
                                                <div class="row">
                                                    <div class="col-sm-4"><span class="text-muted">Date</span>
                                                    </div>
                                                    <div class="col-sm-8">{{ach['date']}}</div>
                                                </div>
                                            </li>
                                            <li class="padding-v-5">
                                                <div class="row">
                                                    <div class="col-sm-4"><span class="text-muted">Organisation</span>
                                                    </div>
                                                    <div class="col-sm-8">{{ach['organisation']}}</div>
                                                </div>
                                            </li>
                                            <li class="padding-v-5">
                                                <div class="row">
                                                    <div class="col-sm-4">Description</div>
                                                    <div class="col-sm-8">{{ach['description']}}</div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                <!-- /st-content-inner -->
            </div>
            			</div>
            <!-- /st-content -->
        </div>
        <!-- /st-pusher -->
        <!-- Footer -->
        <footer class="footer">
            <strong>ThemeKit</strong> v3.6.3 &copy; Copyright 2015
        </footer>
        <!-- // Footer -->
    </div>
    <!-- /st-container -->
    <!-- Inline Script for colors and config objects; used by various external scripts; -->
    <script>
    var colors = {
        "danger-color": "#e74c3c",
        "success-color": "#81b53e",
        "warning-color": "#f0ad4e",
        "inverse-color": "#2c3e50",
        "info-color": "#2d7cb5",
        "default-color": "#6e7882",
        "default-light-color": "#cfd9db",
        "purple-color": "#9D8AC7",
        "mustard-color": "#d4d171",
        "lightred-color": "#e15258",
        "body-bg": "#f6f6f6"
    };
    var config = {
        theme: "social-2",
        skins: {
            "default": {
                "primary-color": "#16ae9f"
            },
            "orange": {
                "primary-color": "#e74c3c"
            },
            "blue": {
                "primary-color": "#4687ce"
            },
            "purple": {
                "primary-color": "#af86b9"
            },
            "brown": {
                "primary-color": "#c3a961"
            },
            "default-nav-inverse": {
                "color-block": "#242424"
            }
        }
    };
    </script>
    <!-- Separate Vendor Script Bundles -->
    <script src="js/vendor-core.min.js"></script>
    <script src="js/vendor-tables.min.js"></script>
    <script src="js/vendor-forms.min.js"></script>
    <!-- <script src="js/vendor-media.min.js"></script> -->
    <!-- <script src="js/vendor-player.min.js"></script> -->
    <!-- <script src="js/vendor-charts-all.min.js"></script> -->
    <!-- <script src="js/vendor-charts-flot.min.js"></script> -->
    <!-- <script src="js/vendor-charts-easy-pie.min.js"></script> -->
    <!-- <script src="js/vendor-charts-morris.min.js"></script> -->
    <!-- <script src="js/vendor-charts-sparkline.min.js"></script> -->
    <script src="js/vendor-maps.min.js"></script>
    <!-- <script src="js/vendor-tree.min.js"></script> -->
    <!-- <script src="js/vendor-nestable.min.js"></script> -->
    <!-- <script src="js/vendor-angular.min.js"></script> -->
    <!-- Compressed Vendor Scripts Bundle
    Includes all of the 3rd party JavaScript libraries above.
    The bundle was generated using modern frontend development tools that are provided with the package
    To learn more about the development process, please refer to the documentation.
    Do not use it simultaneously with the separate bundles above. -->
    <!-- <script src="js/vendor-bundle-all.min.js"></script> -->
    <!-- Compressed App Scripts Bundle
    Includes Custom Application JavaScript used for the current theme/module;
    Do not use it simultaneously with the standalone modules below. -->
    <!-- <script src="js/module-bundle-main.min.js"></script> -->
    <!-- Standalone Modules
    As a convenience, we provide the entire UI framework broke down in separate modules
    Some of the standalone modules may have not been used with the current theme/module
    but ALL the modules are 100% compatible -->
    <script src="js/module-essentials.min.js"></script>
    <script src="js/module-layout.min.js"></script>
    <script src="js/module-sidebar.min.js"></script>
    <!-- <script src="js/module-media.min.js"></script> -->
    <!-- <script src="js/module-player.min.js"></script> -->
    <script src="js/module-timeline.min.js"></script>
    <script src="js/module-chat.min.js"></script>
    <script src="js/module-maps.min.js"></script>
    <!-- <script src="js/module-charts-all.min.js"></script> -->
    <!-- <script src="js/module-charts-flot.min.js"></script> -->
    <!-- <script src="js/module-charts-easy-pie.min.js"></script> -->
    <!-- <script src="js/module-charts-morris.min.js"></script> -->
    <!-- <script src="js/module-charts-sparkline.min.js"></script> -->
    <!-- [social-2] Core Theme Script:
        Includes the custom JavaScript for this theme/module;
        The file has to be loaded in addition to the UI modules above;
        module-bundle-main.js already includes theme-core.js so this should be loaded
        ONLY when using the standalone modules; -->
    <script src="js/theme-core.min.js"></script>
</body>
</html>