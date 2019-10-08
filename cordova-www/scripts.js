var app = angular.module("myApp", ["ngRoute"]);
app.config(function($routeProvider) {
  $routeProvider
    .when("/", {
      templateUrl: "feed.html",
      controller: 'feedCtrl'
    })
    .when("/post", {
      templateUrl: "post.html",
    })
    .when("/feed", {
      templateUrl: "feed.html",
      controller: 'feedCtrl'
    })
    .when("/perfil", {
      templateUrl: "perfil.html",
    })

    .otherwise({
        redirectTo: "/feed"
      });
});



app.controller('feedCtrl', function($scope, $http) {
    $http.get("http://www.guilherme.in/backapp/feed.php")
    .then(function (response) {$scope.names = response.data.records;});
 });


 

 app.submitForm = function(){
    $http({
     method:"POST",
     url:"http://www.guilherme.in/backapp/insert.php",
     data:{'user_id':$scope.user_id, 'text':$scope.post,'action':$scope.submit_button}
    }).success(function(data){
     if(data.error != '')
     {
      console.log('nao foi possivel inserir o post');
     }
     else
     {
      console.log('post inserido com sucesso');
     }
    });
   };
  



