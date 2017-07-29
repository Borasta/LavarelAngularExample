export default [
	'$scope',
	'$http',
	class AlertController {
	  constructor($scope, $http) {
	    $scope.each = 5;
	    $scope.maxEach = 20;
	    $scope.eachs = [];
	    for(let i = 0; i < $scope.maxEach; i++) $scope.eachs.push(i+1);
	    $scope.q = '';
	    $scope.status_alerts = [];
	    $scope.offices = [];
	    
	    $scope.alerts = [];

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
				$http.post('/api/alerts/', {
					"office_id": $scope.office_id,
					"status_alert_id": $scope.status_alert_id,
					"description": $scope.description
				})
				.then(function (res) {
					if(!res.data.errors) {
						$scope.office_id = ''
						$scope.status_alert_id = ''
						$scope.description = ''
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
				$scope.alerts = null;
				clearTimeout($scope.timeSearch);
				$scope.timeSearch = setTimeout(function() {

					var url = '/api/alerts/list/' + $scope.each + "/search/" + $scope.q;

					if(pag)
						url += "?page=" + pag;

					$http.get(url)
						.then(function (res) {
							$scope.last = res.data.last_page;
							if( pag > $scope.last )
								$scope.list($scope.last)

							$scope.current = res.data.current_page;
							$scope.alerts = res.data.data;
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
				$http.delete("/api/alerts/" + id)
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

			$scope.getStatusAlerts = function() {
				$http.get('/api/status-alerts/')
					.then(function (res) {
						$scope.statusAlerts = res.data;
					}, function (e) {
						console.log('Error');
						console.log(e);
					}, function() {
						console.log("done");
					});
			}

			$scope.list();
			$scope.getOffices();
			$scope.getStatusAlerts();

	  }

	}
]