angular.module('myDirective', [])
    .directive('jqdatepicker', function () {
        return {
            restrict: 'A',
            require: 'ngModel',
             link: function (scope, element, attrs, ngModelCtrl) {
                element.datepicker({
                    dateFormat: 'yy-mm-dd',
                    onSelect: function (date) {
                        scope.date = date;
                        scope.$apply();
                    }
                });
            }
        };
    })
    .directive('ejqdatepicker', function () {
        return {
            restrict: 'A',
            require: 'ngModel',
             link: function (scope, element, attrs, ngModelCtrl) {
                element.datepicker({
                    dateFormat: 'yy-mm-dd',
                    onSelect: function (e_date) {
                        scope.e_date = e_date;
                        scope.$apply();
                    }
                });
            }
        };
    });