angular.module('ToDo', ['listToDo'])
  .factory('App2Service', function(listService){
    return{
      list : listService.getList
    };
  })
  .controller('todoController', 
    ['$scope', 'App2Service', function($scope, App2Service){

  $scope.todos = App2Service.list;

  $scope.addTodo = function() {
    $scope.todos.push({
      text: $scope.todoText,
      done: false
    });
    $scope.todoText = ''; 
  };

  $scope.remaining = function() {
    var count = 0;
    angular.forEach($scope.todos, function(todo){
      count+= todo.done ? 0 : 1;
    });
    return count;
  };

  $scope.archive = function() {
    var oldTodos = $scope.todos;
    $scope.todos = [];
    angular.forEach(oldTodos, function(todo){
      if (!todo.done){
        $scope.todos.push(todo);
        }
    });
    localStorage.setItem('todos', JSON.stringify($scope.todos));
  };


  }]);