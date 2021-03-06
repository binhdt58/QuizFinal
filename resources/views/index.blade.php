@extends('master')
@section('body')
	<body ng-app="Quiz" class="container-fluid">

	<div id="LoginTab" ng-controller="LoginForm" class="container-fluid wow fadeInDown">
		<!-- $scope.loged: bi?n cho bi?t user ?� log in hay ch?a. Phi�n b?n firebase ph?i ??ng nh?p b?ng email -->
		<div class="row" ng-hide="loged">
			<div class="col-lg-5 col-md-4 col-sm-12 col-xs-12">
				<input type="text" class="form-control input-lg input-login" ng-model="username" placeholder="Email">
			</div>
			<div class="col-lg-5 col-md-4 col-sm-12 col-xs-12">
				<input type="password" class="form-control input-lg input-login" ng-model="password" placeholder="Password">
			</div>
			<button type="button" class="btn btn-lg btn-login col-lg-1 col-md-2 col-sm-6 col-xs-12" ng-click="LogIn()">Log in</button>
			<button type="submit" class="btn btn-lg btn-login col-lg-1 col-md-2 col-sm-6 col-xs-12" ng-click="Register()">Register</button>
		</div>

		<!-- n?u ?� login( in session ) th� s? th�ng b�o xin ch�o. T�i kho?n m?i register c?n v�o profile ch?nh s?a th�ng tin c� nh�n -->
		<div class="row" ng-show="loged">
			<div class="col-lg-10 col-md-8 col-sm-6 col-xs-6">
				<p class="input-login"> Hi @{{user.name}} </p>
			</div>
			<a href="{{asset('userProfile.blade.php')}}" type="button" class="btn btn-lg btn-login col-lg-1 col-md-2 col-sm-3 col-xs-3">Profile</a>
			<button type="button" class="btn btn-lg btn-login col-lg-1 col-md-2 col-sm-3 col-xs-3" ng-click="LogOut()">Log Out</button>
		</div>
	</div>

	<!-- Leaderboard: hi?n ra 5 ng??i c� ?i?m cao nh?t( sau n�y s? th�m t�nh n?ng ?i?m/ s? b�i test cao nh?t )  -->

	<div id="leaderboard" ng-controller="Leaderboard" class="container-fluid wow slideInLeft">
		<p class="leaderboard-tittle">  Leaderboard </p>
		<div class="row">
			<p class="leaderboard-tittle col-lg-1 col-md-2 col-sm-3 col-xs-3"> Users </p>
			<p class="leaderboard-tittle col-lg-1 col-md-2 col-sm-3 col-xs-3 col-lg-offset-10 col-md-offset-8 col-sm-offset-6 col-xs-offset-6"> Score </p>
		</div>
		<div ng-repeat="user in userList|orderBy:'-score'|limitTo:5" class="leaderboard-user">
			<p class="col-lg-2 col-md-2 col-sm-3 col-xs-3"> @{{user.name}} </p>
			<p class="col-lg-1 col-md-1 col-sm-1 col-xs-2 col-lg-offset-9 col-md-offset-9 col-sm-offset-8 col-xs-offset-7"> @{{user.score}} </p>
		</div>
	</div>

	<!-- C�c lo?i b�i test -->
	<div ng-controller="TopicController" class="container-fluid wow slideInLeft">
		<div class="row no-gutter">
			<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" ng-repeat="topic in menu">
				<a href="@{{ topic.link }}" class="card-box">
					<img src="@{{topic.icon}}" class="img">
					<div class="card-box-caption">
						<div class="card-box-caption-content">
							<div class="project-category text-faded">
								<h3>@{{topic.tittle}}</h3>
							</div>
							<div class="project-name">
								@{{topic.description}}
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>

	</body>
@stop