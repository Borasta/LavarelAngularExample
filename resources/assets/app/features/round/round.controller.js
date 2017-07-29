export default [
	'$scope',
	'$http',
	class RoundController {
	  constructor($scope, $http) {
	    $scope.each = 5;
	    $scope.maxEach = 20;
	    $scope.eachs = [];
	    for(let i = 0; i < $scope.maxEach; i++) $scope.eachs.push(i+1);
	    $scope.q = '';
	    $scope.offices = [];
	    $scope.employees = [];
	    $scope.status_rounds = [];
	    
	    $scope.rounds = [];

	    $scope.timeSearch = null;

	    $scope.next = null;
	    $scope.prev = null;
	    $scope.from = null;
	    $scope.current = null;
	    $scope.to = null;
	    $scope.last = null;
	    $scope.total = null;
	    $scope.pags = null;

	    $scope.success = false;
	    $scope.deletes = false;
	    $scope.errors = null;

	    $scope.successTime = null;

			$scope.store = function() {
				$scope.errors = null;
				$scope.success = null;
				$scope.successTime = null
				$http.post('/api/rounds/', {
					"office_id": $scope.office_id,
					"employee_id": $scope.employee_id,
					"status_round_id": $scope.status_round_id
				})
				.then(function (res) {
					if(!res.data.errors) {
						$scope.office_id = ''
						$scope.employee_id = ''
						$scope.status_round_id = ''
						$scope.list($scope.last + 1);
						
						$scope.newId = res.data.id;
						clearTimeout($scope.successTime);
						$scope.successTime = setTimeout(function() {
							$scope.newId = 0;
							$scope.$apply();
						}, 10000);

						$scope.success = true;
						// Mostrar mensaje de exito 3 segundos
						setTimeout(function() {
							$scope.success = false;
							$scope.$apply();
						}, 10000);

					} 
					else {
						$scope.errors = res.data.errors;
						console.log($scope.errors)
					}
				}, function (e) {
					console.log('Error');
					console.log(e);
				});
			};

			$scope.list = function(pag) {
				$scope.rounds = null;
				clearTimeout($scope.timeSearch);
				$scope.timeSearch = setTimeout(function() {

					var url = '/api/rounds/list/' + $scope.each + "/search/" + $scope.q;

					if(pag)
						url += "?page=" + pag;

					$http.get(url)
						.then(function (res) {
							$scope.last = res.data.last_page;
							if( pag > $scope.last )
								$scope.list($scope.last)

							$scope.current = res.data.current_page;
							$scope.rounds = res.data.data;
							$scope.next = res.data.next_page_url;
							$scope.prev = res.data.prev_page_url;
							$scope.from = res.data.from;
							$scope.to = res.data.to;
							$scope.total = res.data.total;
							$scope.pags = [];
							for(let i = 0; i < $scope.last; i++) $scope.pags.push(i+1);
						}, function (e) {
							console.log('Error');
							console.log(e);
						});
				}, 500);
			}

			$scope.destroy = function(id) {
				$http.delete("/api/rounds/" + id)
					.then(function (res) {
						$scope.list($scope.current);

						$scope.deletes = true;
						// Mostrar mensaje de exito 3 segundos
						setTimeout(function() {
							$scope.deletes = false;
							$scope.$apply();
						}, 10000);
						
					}, function (e) {
						console.log('Error');
						console.log(e);
					});
			}

			$scope.getOffices = function() {
				$http.get('/api/offices/')
					.then(function (res) {
						$scope.offices = res.data;
					}, function (e) {
						console.log('Error');
						console.log(e);
					});
			}

			$scope.getEmployees = function() {
				$http.get('/api/employees/')
					.then(function (res) {
						$scope.employees = res.data;
					}, function (e) {
						console.log('Error');
						console.log(e);
					});
			}

			$scope.getStatusRounds = function() {
				$http.get('/api/status-rounds/')
					.then(function (res) {
						$scope.statusRounds = res.data;
					}, function (e) {
						console.log('Error');
						console.log(e);
					}, function() {
						console.log("done");
					});
			}

			$scope.list();
			$scope.getOffices();
			$scope.getEmployees();
			$scope.getStatusRounds();

	  }

	}
]