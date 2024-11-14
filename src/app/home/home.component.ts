import { Component } from '@angular/core';
import {DatePipe} from '@angular/common';

@Component({
	selector: 'app-home',
	standalone: true,
	templateUrl: './home.component.html',
	imports: [
		DatePipe
	]
})
export class HomeComponent {

	protected readonly Date = Date;
}
