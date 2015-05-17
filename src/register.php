<!DOCTYPE html>
<html class="login" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ThemeKit</title>
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
    <link href="css/module-media.min.css" rel="stylesheet" />
    <link href="css/module-timeline.min.css" rel="stylesheet" />
    <!-- <link href="css/module-cover.min.css" rel="stylesheet" /> -->
    <link href="css/module-chat.min.css" rel="stylesheet" />
    <link href="css/module-charts.min.css" rel="stylesheet" />
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
<body>
    <div class="container-fluid">
        <div class="brand-logo">
            <i class="fa fa-pencil"></i>
        </div>
        <div class="row">
            <h1 align="center"> Create a new account</h1>
            <div class="col-sm-4 col-sm-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="alert alert-danger" style="display: none;">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                            </button>
                            *Please complete all required fields
                        </div>
                        <!-- Signup -->
                        <form role="form" action="register_user.php" method="post">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="text" name="dob" class="form-control" placeholder="Date Of Birth">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password Confirmation">
                            </div>
                            <div class="form-group text-center">
                                <div class="checkbox">
                                    <input type="checkbox" id="agree" />
                                    <label for="agree">* I Agree with <a href="#">Terms &amp; Conditions!</a>
                                    </label>
                                </div>
                            </div>
                            <div class="text-center">
                                <input href="index.html" type="submit" class="btn btn-primary"  value="Create an Account"></input>
                            </div>
                        </form>
                        <!-- //Signup -->
                    </div>
                </div>
            </div>
        </div>
    </div>
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
        theme: "admin",
        skins: {
            "default": {
                "primary-color": "#3498db"
            }
        }
    };
    </script>
    <!-- Separate Vendor Script Bundles -->
    <script src="js/vendor-core.min.js"></script>
    <script src="js/vendor-tables.min.js"></script>
    <script src="js/vendor-forms.min.js"></script>
    <script src="js/vendor-media.min.js"></script>
    <!-- <script src="js/vendor-player.min.js"></script> -->
    <script src="js/vendor-charts-all.min.js"></script>
    <!-- <script src="js/vendor-charts-flot.min.js"></script> -->
    <!-- <script src="js/vendor-charts-easy-pie.min.js"></script> -->
    <!-- <script src="js/vendor-charts-morris.min.js"></script> -->
    <!-- <script src="js/vendor-charts-sparkline.min.js"></script> -->
    <script src="js/vendor-maps.min.js"></script>
    <script src="js/vendor-tree.min.js"></script>
    <script src="js/vendor-nestable.min.js"></script>
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
    <script src="js/module-media.min.js"></script>
    <!-- <script src="js/module-player.min.js"></script> -->
    <!-- <script src="js/module-timeline.min.js"></script> -->
    <script src="js/module-chat.min.js"></script>
    <script src="js/module-maps.min.js"></script>
    <script src="js/module-charts-all.min.js"></script>
    <!-- <script src="js/module-charts-flot.min.js"></script> -->
    <!-- <script src="js/module-charts-easy-pie.min.js"></script> -->
    <!-- <script src="js/module-charts-morris.min.js"></script> -->
    <!-- <script src="js/module-charts-sparkline.min.js"></script> -->
</body>
</html>