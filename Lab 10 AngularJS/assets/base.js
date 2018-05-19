var nameApp = angular.module('nameApp', []);
            nameApp.controller('NameCtrl', function ($scope){
                $scope.names = ['David', 'John', 'Paul', 'Mark', 'Christopher', 'Williams'];
                $scope.addName = function() {
                    var lowerNames = $scope.names.map(v => v.toLowerCase());
                    if( lowerNames.includes($scope.enteredName.toLowerCase())){
                        alert('The name already exists!');
                    }
                    else {
                        $scope.names.push($scope.enteredName);
                        $scope.enteredName = ""; //clear the field
                    }
                };
            });
