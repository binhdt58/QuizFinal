@extends('master')
@section('body')
<body ng-app="Quiz" class="container-fluid">
<!-- Log in tab. N?u m� ?ang l�m test tho�t ra th� k?t qu? kh�ng ???c ch?p nh?n( L?u v�o t�i kho?n ) -->
<div id="LoginTab" ng-controller="LoginForm" class="container-fluid wow fadeInDown">
    <div class="row" ng-hide="loged">
        <div class="col-lg-5 col-md-4 col-sm-12 col-xs-12">
            <input type="email" class="form-control input-lg input-login" ng-model="username" placeholder="Email">
        </div>
        <div class="col-lg-5 col-md-4 col-sm-12 col-xs-12">
            <input type="password" class="form-control input-lg input-login" ng-model="password" placeholder="Password">
        </div>
        <button type="button" class="btn btn-lg btn-login col-lg-1 col-md-2 col-sm-6 col-xs-12" ng-click="LogIn()">Log in</button>
        <button type="submit" class="btn btn-lg btn-login col-lg-1 col-md-2 col-sm-6 col-xs-12" ng-click="Register()">Register</button>
    </div>
    <div class="row" ng-show="loged">
        <div class="col-lg-10 col-md-8 col-sm-6 col-xs-6">
            <p class="input-login"> Hi @{{ user.name }} </p>
        </div>
        <a href="{{asset('userProfile.blade.php')}}" class="btn btn-lg btn-login col-lg-1 col-md-2 col-sm-3 col-xs-3">Profile</a>
        <button type="button" class="btn btn-lg btn-login col-lg-1 col-md-2 col-sm-3 col-xs-3" ng-click="LogOut()">Log Out</button>
    </div>
</div>

<img class="img-responsive" src="@yield('headerImage')">
<!-- L?u c�c b�i test v� c�c tr?ng th�i c?a n�
    editDB = true: l?a ch?n gi?a vi?c edit ques DB hay take test. Ng??i d�ng bth c� th? v�o trang edit DB nh?ng ko th? th�m hay x�a ???c
                    ( N�n s? ch? ?? xem list l� ch�nh ).
    !editDB && loaded && publish: loaded l� bi?n cho bi?t 10 c�u h?i ?� ???c l?a ch?n random ch?a( bao g?m c? vi?c load t? server v? ).
                        publish: cho bi?t ng??i d�ng ?ang ? c�u 1 -> 9 hay l� ? c�u 10. C�u 1 -> 9 th� ?n submit s? ra c�u ti?p. C�u 10 ?n submit
                        s? hi?n l�n c�c ?�p �n v� th�ng b�o ?i?m.
    !editDB && loaded && !publish Hi?n k?t qu?: C�u tr? l?i ?�ng s? c� m�u xanh l� c�y. M�u xanh d??ng l� l?a ch?n c?a ng??i d�ng. M�u ?? l� k?t qu? sai.
    D�ng angular kh� b� ? kho?n t�i s? d?ng code trong 1 v�i tr??ng h?p.
-->
<div ng-controller="QuestLibrary" class="container-fluid wow fadeInLeft" id="questionBoard" ng-show="loaded">
    <div class="row" ng-show="editDB">
        <a href="@yield('editPage')" class="btn btn-answer btn-lg col-lg-6 col-md-6 col-sm-12 col-xs-12">Edit question bank</a>
        <div class="btn btn-answer btn-lg col-lg-6 col-md-6 col-sm-12 col-xs-12" ng-click="takeTest()">Take test</div>
    </div>

    <div ng-show="publish && !editDB && loaded">
        <p class="question-style"> @{{ currentQuestion.data }} </p>
        <div class="row">
            <div class="btn btn-answer col-lg-3 col-sm-6 col-xs-12" ng-repeat="ans in currentQuestion.answer" ng-click="select($index)" ng-class="{sel: $index == selected}">
                @{{ ans }}
            </div>
        </div>
        <div class="btn btn-answer marginTop pull-left" ng-click="ReturnQuiz()"> Return </div>
        <div class="btn btn-answer marginTop pull-right" ng-click="submitQuestion()"> Submit </div>
    </div>

    <div ng-show="!publish && !editDB && loaded">
        <p class="question-style"> Your score is @{{ score }} </p>
        <div ng-repeat="question in list">
            <p class="question-style"> @{{ question.data }} </p>
            <p class="btn-answer col-lg-3 col-xs-6 col-xs-12" ng-repeat="ans in question.answer"
               ng-class="{sel: $index == getSel($parent.$index),right: $index == getRight($parent.$index),good:$index == getRight($parent.$index) && $index == getSel($parent.$index) }">
                @{{ ans }}
            </p>
        </div>
        <div class="btn btn-login btn-lg col-lg-2 col-lg-offset-10 col-md-3 col-md-offset-9 col-sm-6 col-sm-offset-6 col-xs-12" ng-click="ReturnQuiz()"> Return </div>
    </div>
</div>

</body>
@stop