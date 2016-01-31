angular.module('listToDo', [])
    .factory('listService', function(){
      var Privatelist = [
      {text:'Create a factory', done:true},
      {text:'build an angular app', done:false}
      ];

      return{
         getList : Privatelist
      };
    })
;