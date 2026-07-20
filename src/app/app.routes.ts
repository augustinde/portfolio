import {Routes} from '@angular/router';
import {HomeComponent} from './home/home.component';
import {FudePolicyComponent} from './fude-policy/fude-policy.component';

export const routes: Routes = [
	  {
		  path: '',
		  component: HomeComponent
	  },
	  {
		  path: 'fude/policy',
		  component: FudePolicyComponent
	  }
];
