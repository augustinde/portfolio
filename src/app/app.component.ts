import {Component} from '@angular/core';
import {NavbarComponent} from './navbar/navbar.component';
import {RouterOutlet} from '@angular/router';

@Component({
	selector: 'app-root',
	standalone: true,
	templateUrl: './app.component.html',
	imports: [
		NavbarComponent,
		RouterOutlet
	]
})
export class AppComponent  {

}
