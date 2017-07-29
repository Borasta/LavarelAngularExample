import '!style!css!bootstrap/dist/css/bootstrap.min.css';

import angular from "angular";
import uirouter from 'angular-ui-router';

import routing from './app.config';

import home from './features/home';
import alert from './features/alert';
import round from './features/round';

angular.module('myApp', [uirouter, 
	home,
	alert,
	round
]).config(routing);