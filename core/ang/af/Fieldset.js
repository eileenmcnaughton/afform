(function(angular, $, _) {
  // Example usage: <af-form><af-entity name="Person" type="Contact" /> ... <fieldset af-fieldset="Person> ... </fieldset></af-form>
  angular.module('af').directive('afFieldset', function() {
    return {
      restrict: 'A',
      require: '^afForm',
      scope: {
        modelName: '@afFieldset'
      },
      link: function($scope, $el, $attr, afFormCtrl) {
        $scope.afFormCtrl = afFormCtrl;
      },
      controller: function($scope){
        this.getDefn = function getDefn() {
          return $scope.afFormCtrl.getEntity($scope.modelName);
          // return $scope.modelDefn;
        };
        this.getData = function getData() {
          return $scope.afFormCtrl.getData($scope.modelName);
        };
        this.getName = function() {
          return $scope.modelName;
        };
      }
    };
  });
})(angular, CRM.$, CRM._);
