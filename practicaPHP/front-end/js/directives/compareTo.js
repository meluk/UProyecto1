angular.module('practicaPHP01')
.directive('compareTo', function () {
  return {
    require: 'ngModel',
    link: function (scope, elm, attrs, ctl) {
      scope.$watch(attrs['compareTo'], function (errorMsg) {
        elm[0].setCustomValidity(errorMsg);
        ctl.$setValidity('compareTo', errorMsg ? false : true);
      });
    }
  };
});
