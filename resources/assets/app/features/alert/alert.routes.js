routes.$inject = ['$stateProvider'];

export default function routes($stateProvider) {
  $stateProvider
    .state('alert', {
      url: '/',
      templateUrl: "./app/routes/alert.html",
      controller: 'AlertController',
      controllerAs: 'alert'
    });
}