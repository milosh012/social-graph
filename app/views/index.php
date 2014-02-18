<!DOCTYPE html>
<html  ng-app="socialgraph" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Social Graph</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/jumbotron-narrow.css" rel="stylesheet">
    <link href="/bower_components/angular-loading-bar/build/loading-bar.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="/">Home</a></li>
          <li><a target="_blank" href="http://github.com/milosh012/social-graph">Source Code</a></li>
        </ul>
        <h3 class="text-muted">Social Graph</h3>
      </div>

      <div class="jumbotron">
        <h1>Social Graph</h1>
        <p class="lead">Have fun!</p>
      </div>

      <div ui-view></div>

      <div class="footer">
        <p>&copy; Social Graph 2014 | <a target="_blank" href="http://github.com/milosh012/social-graph">Source Code</a> | <a href="http://twitter.com/milosjanjic" target="_blank">@milosjanjic</a></p>
      </div>
    </div> <!-- /container -->

    <script src="/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/bower_components/angular/angular.min.js"></script>
    <script src="/bower_components/angular-animate/angular-animate.min.js"></script>
    <script src="/bower_components/angular-ui-router/release/angular-ui-router.min.js"></script>
    <script src="/bower_components/lodash/dist/lodash.min.js"></script>
    <script src="/bower_components/restangular/dist/restangular.min.js"></script>
    <script src="/bower_components/angular-loading-bar/build/loading-bar.min.js"></script>
    <script src="/js/app.js"></script>

  </body>
</html>
