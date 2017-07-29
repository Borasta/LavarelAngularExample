routes.$inject = ['$stateProvider'];

export default function routes($stateProvider) {
  $stateProvider
    .state('round', {
      url: '/',
      templateUrl: "./app/routes/round.html",
      controller: 'RoundController',
      controllerAs: 'round'
    });
}