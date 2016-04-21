angular.module('users', [])
.controller('usersController',['$scope', 'usersService', function ($scope, usersService ){

$scope.log={
    email:"",
    password:""
};

$scope.reg= {
    name: "",
    lastname: "",
    email: "",
    password: ""
};



$scope.login= function(objLogin) {//promest
    usersService.login($scope.log).success(function(response){
            console.debug(response.user);
            console.debug(response.message);
          })
          .error(function(data) {
              console.debug(response.message);
          });
    
};

$scope.logout= function () {
    usersService.logout();
};

$scope.register= function(objReg) {
   usersService.register(objReg);
};


}])

.service('usersService', ['$http','$q','$log', function ($http, $q, $log) {
        
    var login= function(objLogin) {
      console.log(objLogin);
       var url= 'back-end/index.php/user/login'
       var result = $http.post(url, objLogin);
        
       return result;
    };

    var logout= function () {
       var defer= $q.defer;

       return defer.promise;
    };

    var register= function(objReg) {
        var defer= $q.defer;

       return defer.promise;
    };



    return{
        login: login,
        logout:logout,
        register:register
    };

}]);









  