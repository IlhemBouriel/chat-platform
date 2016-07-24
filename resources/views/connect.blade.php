<html lang="en" class="no-js" ng-app="app"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>FaceOmek</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="{{  URL::asset('favicon.ico') }}"> 
        <link rel="stylesheet" type="text/css" href="{{  URL::asset('css/demo.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{  URL::asset('css/style3.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{  URL::asset('css/animate-custom.css') }}" />
             <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
     <script   src="https://code.jquery.com/jquery-3.1.0.js"   integrity="sha256-slogkvB1K3VOkzAI8QITxV3VzpOnkeNVsKvtkYLMjfk="   crossorigin="anonymous"></script>
     <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<style type="text/css">
  b{
    color: red;
  }
  .body{
    background-color: rgba(149, 165, 166,1.0) !important;
  }
</style>

    </head>
    <body>
        <div class="container">
            <!-- Codrops top bar -->
           
            <header>
                <h1>Login and Registration Form Of<span> "FaceOmek"</span></h1>
				
            </header>
            <section>			
	
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                           <form method="POST" action="{{ URL::to('connect') }}">
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="email" class="uname" data-icon="u" > Your email </label>
                                    @if ($email == '')
                                    <input id="email" name="email" required="required" type="text" placeholder="mymail@mail.com"/>
                                    @else
                                     <input id="username" name="email" required="required" type="text" value="{{ $email }}"/>
                                     @endif
                                 
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                <p class="keeplogin"> 
									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
									<label for="loginkeeping">Keep me logged in</label>
								</p>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <p class="login button"> 
                                    <input type="submit" value="Login" onclick="SendData()" /> 
								</p>

                                  @if ($msg == '')
                                @else
                                 {{ $msg }}
                                 @endif
                            </form>
                                <p class="change_link">
									Not a member yet ?
									<a href="#toregister" class="to_register">Join us</a>
								</p>
                             
                        </div>

                        <div id="register" class="animate form">
                        <div>
                        <div ng-controller="testController">
                        <form name="myForm" method="POST">
                                <h1> Sign up </h1> 
                                <p> 
                                    <label for="name" class="uname" data-icon="u">Your username</label>
                                    <input id="usernamesignup" name="name" required="required" type="text" ng-model="name" placeholder="mysuperusername690" />
                                </p>
                                <p> 
                                    <label for="email" class="youmail" data-icon="e" > Your email</label>
                                    <input id="emailsignup" name="email" required="required" type="email" onblur="verifyEmail(this.value)" placeholder="mysupermail@mail.com"/> 
                                    <div style=" display: none"  id="div2">
<b>Email is already in use!</b>
</div>
                                </p>
                                <p> 

                                    <label for="pass" class="youpasswd" data-icon="p">Your password </label>
                                    <input id="passwordsignup"  ng-model="pass" name="pass" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p> 
                                    <label for="pass1" class="youpasswd" data-icon="p">Please confirm your password </label>
                                    <input id="passwordsignup_confirm" ng-model="pass1" name="pass1" required="required" type="password" placeholder="eg. X8df!90EO"/>

                                </p>
                                                        <div style=" display: none" id="div1">
<b>Invalid password!</b></br>
</div>
                                <p class="signin button"> 
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

									<input type="submit" ng-click="verify(pass,pass1)" value="Sign up"/> 
								</p>
                                <p class="change_link">  
									Already a member ?
									<a href="#tologin" class="to_register"> Go and log in </a>
								</p>
                         </form>


  </div>

</div>
                        </div>
						
                    </div>
                </div>  

            </section>

        </div>


    </body>

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
     window.location="{{ URL::to('index') }}";
       }
    });
       }
      };
    });

    function verifyEmail(email)
    {
      $.ajax({
       url : "{{ URL::action('TestController@verify') }}",
       type : "post",
       data : {'_token':'{{ csrf_token() }}', 'email':email},
       success : function(code_html){ 
       if (code_html != 'not found')
       {
       $("input[name=email]").val("");
       document.getElementById('div2').style.display="inline";
       }
       else
       {
      document.getElementById('div2').style.display="none";
       }
       
       }
    });
    }
</script>
</html>