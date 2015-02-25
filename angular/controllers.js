var phonecatApp = angular.module('phonecatApp', []);

phonecatApp.controller('PhoneListCtrl', function ($scope,$http) {
/* 	$http.get('https://graph.facebook.com/162312057134623/feed?access_token=387763527963969|rdv4zfxCShaAnUpAPNhBe9CWeV8').success(function(data){
		$scope.phones(data);
	}); */
  $scope.phones = [
    {'name': 'Nexus S',
     'snippet': 'Fast just got faster with Nexus S.',
	 'age':1},
    {'name': 'Motorola XOOM with Wi-Fi',
     'snippet': 'The Next, Next Generation tablet.',
	 'age':2},
    {'name': 'MOTOROLA XOOM',
     'snippet': 'The Next, Next Generation tablet.',
	 'age':3}
  ];
	$scope.name = 'world';
	$scope.orderProp = 'age';
});