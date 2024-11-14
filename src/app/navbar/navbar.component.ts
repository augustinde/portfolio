import {Component} from '@angular/core';

@Component({
	selector: 'app-navbar',
	standalone: true,
	templateUrl: 'navbar.component.html'
})
export class NavbarComponent {
	isMobileMenuOpen = false;

	toggleMobileMenu() {
		this.isMobileMenuOpen = !this.isMobileMenuOpen;
	}

}
