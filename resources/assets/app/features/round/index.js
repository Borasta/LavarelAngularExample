import angular from "angular";
import uirouter from 'angular-ui-router';

import routing from './round.routes';
import RoundController from './round.controller';

export default angular.module('app.round', [uirouter])
  .config(routing)
  .controller('RoundController', RoundController)
  .name;