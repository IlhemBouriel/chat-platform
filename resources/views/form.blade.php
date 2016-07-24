@extends('index', ['some' => 'data'])

	 <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
	 <script   src="https://code.jquery.com/jquery-3.1.0.js"   integrity="sha256-slogkvB1K3VOkzAI8QITxV3VzpOnkeNVsKvtkYLMjfk="   crossorigin="anonymous"></script>
	 <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	 <style type="text/css">
	 	.div{
	 		display: none;
	 	}
	 </style>
@section('content')
<div ng-app='app'>
  <div ng-controller="testController">
    <form name="myForm" method="POST">
<label for="name">Name:</label>
  <input type="text" name="name" ng-model="name" required></br>
  <label for="Email">Email:</label>
  <input type="email" name="email" onblur="verifyEmail()" required></br>
  <label for="pass">Password:</label>
  <input id="pass" type="password" name="pass" ng-model="pass" required></br>
  <label for="pass1">Retype your Password:</label>
  <input id="pass1" type="password" name="pass1" ng-model="pass1" required></br>
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <button ng-click="verify(pass,pass1)">Register</button>

</form>
<div class="div" id="div1">
Invalid password!</br>
</div>
<div id="div2" class="div">
Email is already in use!
</div>
  </div>
</div>

<script>
	var app = angular.module('app',[]);
	app.controller('testController',function($scope)
	{
      $scope.verify=function(pass,pass1)
      {
         if (pass != pass1)
         {
         	document.getElementById('div1').style.display="inline";
         	 $("input[name=pass]").val("");
         	 $("input[name=pass1]").val("");
         }
         else
         {
        var name=$("input[name=name]").val();
        var email=$("input[name=email]").val();
        var password=$("input[name=pass]").val();
       $.ajax({
       url : "{{ URL::action('TestController@register') }}",
       type : "post",
       data : {'_token':'{{ csrf_token() }}', 'name': name ,'email':email,'pass':pass},
       success : function(code_html){ 
     window.location="{{ URL::to('test') }}";
       }
    });
       }
      };
	});

	function verifyEmail()
	{
		var email=$("input[name=email]").val();
	$.ajax({
       url : "{{ URL::action('TestController@verify') }}",
       type : "post",
       data : {'_token':'{{ csrf_token() }}', 'email':email},
       success : function(code_html){ 
       if (code_html != 'not found')
       {
       document.getElementById('div2').style.display="inline";
       $("input[name=email]").val("");
       }
       else
       {
       document.getElementById('div2').style.display="none";
       }
       
       }
    });
	}
</script>
@stop