import angular from "angular";
import uirouter from 'angular-ui-router';

import routing from './alert.routes';
import AlertController from './alert.controller';

export default angular.module('app.alert', [uirouter])
  .config(routing)
  .controller('AlertController', AlertController)
  .name;