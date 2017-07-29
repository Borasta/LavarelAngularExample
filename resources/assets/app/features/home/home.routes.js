routes.$inject = ['$stateProvider'];

export default function routes($stateProvider) {
  $stateProvider
    .state('home', {
      url: '/',
      templateUrl: "./app/routes/home.html",
      controller: 'HomeController',
      controllerAs: 'home'
    });
}