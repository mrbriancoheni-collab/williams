/**
 * AquaPro Pool Cleaning - Main JavaScript
 * @version 1.0.0
 */

( function () {
	'use strict';

	// =============================================
	// STICKY HEADER
	// =============================================
	const header    = document.getElementById( 'siteHeader' );
	const scrollThreshold = 80;

	function handleHeaderScroll() {
		if ( ! header ) return;
		const notifBar   = document.getElementById( 'notificationBar' );
		const notifHeight = ( notifBar && window.scrollY < notifBar.offsetHeight )
			? notifBar.offsetHeight - window.scrollY
			: 0;
		header.style.top = notifHeight + 'px';

		if ( window.scrollY > scrollThreshold ) {
			header.classList.remove( 'transparent' );
			header.classList.add( 'scrolled' );
		} else {
			header.classList.add( 'transparent' );
			header.classList.remove( 'scrolled' );
		}
	}

	window.handleHeaderScroll = handleHeaderScroll;
	window.addEventListener( 'scroll', handleHeaderScroll, { passive: true } );
	handleHeaderScroll();

	// =============================================
	// MOBILE NAV TOGGLE
	// =============================================
	const navToggle = document.getElementById( 'navToggle' );
	const mainNav   = document.getElementById( 'mainNav' );

	if ( navToggle && mainNav ) {
		navToggle.addEventListener( 'click', function () {
			const isOpen = mainNav.classList.toggle( 'open' );
			navToggle.classList.toggle( 'active', isOpen );
			navToggle.setAttribute( 'aria-expanded', isOpen.toString() );
			document.body.style.overflow = isOpen ? 'hidden' : '';
		} );

		// Close on link click
		mainNav.querySelectorAll( 'a' ).forEach( function ( link ) {
			link.addEventListener( 'click', function () {
				mainNav.classList.remove( 'open' );
				navToggle.classList.remove( 'active' );
				navToggle.setAttribute( 'aria-expanded', 'false' );
				document.body.style.overflow = '';
			} );
		} );

		// Close on outside click
		document.addEventListener( 'click', function ( e ) {
			if ( mainNav.classList.contains( 'open' ) && ! mainNav.contains( e.target ) && ! navToggle.contains( e.target ) ) {
				mainNav.classList.remove( 'open' );
				navToggle.classList.remove( 'active' );
				navToggle.setAttribute( 'aria-expanded', 'false' );
				document.body.style.overflow = '';
			}
		} );
	}

	// =============================================
	// BACK TO TOP
	// =============================================
	const backToTop = document.getElementById( 'backToTop' );

	if ( backToTop ) {
		window.addEventListener( 'scroll', function () {
			backToTop.classList.toggle( 'visible', window.scrollY > 400 );
		}, { passive: true } );

		backToTop.addEventListener( 'click', function () {
			window.scrollTo( { top: 0, behavior: 'smooth' } );
		} );
	}

	// =============================================
	// FAQ ACCORDION
	// =============================================
	document.querySelectorAll( '.faq-question' ).forEach( function ( btn ) {
		btn.addEventListener( 'click', function () {
			const item      = this.closest( '.faq-item' );
			const isActive  = item.classList.contains( 'active' );

			// Close all
			document.querySelectorAll( '.faq-item' ).forEach( function ( el ) {
				el.classList.remove( 'active' );
				el.querySelector( '.faq-question' ).setAttribute( 'aria-expanded', 'false' );
			} );

			// Open clicked (if wasn't open)
			if ( ! isActive ) {
				item.classList.add( 'active' );
				this.setAttribute( 'aria-expanded', 'true' );
			}
		} );
	} );

	// =============================================
	// SCROLL REVEAL
	// =============================================
	if ( 'IntersectionObserver' in window ) {
		const revealObserver = new IntersectionObserver(
			function ( entries ) {
				entries.forEach( function ( entry ) {
					if ( entry.isIntersecting ) {
						// Staggered reveal for grid children
						const parent = entry.target;
						const children = parent.querySelectorAll( '[data-reveal]' );

						if ( children.length > 0 ) {
							children.forEach( function ( child, i ) {
								setTimeout( function () {
									child.classList.add( 'revealed' );
								}, i * 100 );
							} );
						} else {
							parent.classList.add( 'revealed' );
						}

						revealObserver.unobserve( entry.target );
					}
				} );
			},
			{ threshold: 0.15, rootMargin: '0px 0px -60px 0px' }
		);

		document.querySelectorAll( '[data-reveal]' ).forEach( function ( el ) {
			revealObserver.observe( el );
		} );
	} else {
		// Fallback: show all
		document.querySelectorAll( '[data-reveal]' ).forEach( function ( el ) {
			el.classList.add( 'revealed' );
		} );
	}

	// =============================================
	// SMOOTH SCROLL FOR ANCHOR LINKS
	// =============================================
	document.querySelectorAll( 'a[href^="#"]' ).forEach( function ( anchor ) {
		anchor.addEventListener( 'click', function ( e ) {
			const targetId = this.getAttribute( 'href' );
			if ( targetId === '#' ) return;

			const target = document.querySelector( targetId );
			if ( target ) {
				e.preventDefault();
				const headerHeight = header ? header.offsetHeight : 80;
				const targetPos    = target.getBoundingClientRect().top + window.scrollY - headerHeight - 20;

				window.scrollTo( { top: targetPos, behavior: 'smooth' } );
			}
		} );
	} );

	// =============================================
	// QUOTE FORM AJAX SUBMISSION
	// =============================================
	const quoteForm   = document.getElementById( 'quoteForm' );
	const quoteMsg    = document.getElementById( 'quoteFormMsg' );
	const quoteSubmit = document.getElementById( 'quoteSubmitBtn' );

	if ( quoteForm ) {
		quoteForm.addEventListener( 'submit', function ( e ) {
			e.preventDefault();

			if ( ! quoteForm.checkValidity() ) {
				quoteForm.reportValidity();
				return;
			}

			// Loading state
			quoteSubmit.disabled = true;
			quoteSubmit.innerHTML = '<i class="fas fa-spinner fa-spin" aria-hidden="true"></i> Sending...';

			const formData = new FormData( quoteForm );
			formData.append( 'action', 'aquapro_quote' );
			formData.append( 'nonce', typeof aquaproData !== 'undefined' ? aquaproData.nonce : '' );

			fetch( typeof aquaproData !== 'undefined' ? aquaproData.ajaxUrl : '/wp-admin/admin-ajax.php', {
				method: 'POST',
				body: formData,
			} )
				.then( function ( res ) {
					return res.json();
				} )
				.then( function ( data ) {
					if ( data.success ) {
						quoteMsg.style.display    = 'block';
						quoteMsg.style.background  = '#d1fae5';
						quoteMsg.style.color       = '#065f46';
						quoteMsg.style.padding     = '16px 20px';
						quoteMsg.style.borderRadius = '10px';
						quoteMsg.style.marginBottom = '16px';
						quoteMsg.style.fontWeight  = '600';
						quoteMsg.textContent       = '✓ ' + data.data.message;
						quoteForm.reset();

						// Track conversion
						if ( typeof gtag !== 'undefined' ) {
							gtag( 'event', 'quote_form_submit', {
								event_category: 'Lead',
								event_label: 'Hero Quote Form',
							} );
						}
						if ( typeof fbq !== 'undefined' ) {
							fbq( 'track', 'Lead' );
						}
					} else {
						showFormError( data.data ? data.data.message : 'Something went wrong. Please call us.' );
					}
				} )
				.catch( function () {
					showFormError( 'Network error. Please call us at ' + ( typeof aquaproData !== 'undefined' ? aquaproData.phone : '(916) 532-5561' ) );
				} )
				.finally( function () {
					quoteSubmit.disabled = false;
					quoteSubmit.innerHTML = '<i class="fas fa-paper-plane" aria-hidden="true"></i> Send My Free Quote Request';
				} );
		} );
	}

	function showFormError( msg ) {
		if ( ! quoteMsg ) return;
		quoteMsg.style.display    = 'block';
		quoteMsg.style.background  = '#fee2e2';
		quoteMsg.style.color       = '#991b1b';
		quoteMsg.style.padding     = '16px 20px';
		quoteMsg.style.borderRadius = '10px';
		quoteMsg.style.marginBottom = '16px';
		quoteMsg.style.fontWeight  = '600';
		quoteMsg.textContent       = '✕ ' + msg;
	}

	// =============================================
	// PHONE NUMBER CLICK TRACKING
	// =============================================
	document.querySelectorAll( 'a[href^="tel:"]' ).forEach( function ( link ) {
		link.addEventListener( 'click', function () {
			if ( typeof gtag !== 'undefined' ) {
				gtag( 'event', 'phone_click', {
					event_category: 'Contact',
					event_label: 'Phone Click',
				} );
			}
			if ( typeof fbq !== 'undefined' ) {
				fbq( 'track', 'Contact' );
			}
		} );
	} );

	// =============================================
	// COUNTER ANIMATION (Stats)
	// =============================================
	function animateCounter( el, target, duration ) {
		const start    = performance.now();
		const startVal = 0;
		const isPlus   = target.includes( '+' );
		const isK      = target.includes( 'k' ) || target.includes( 'K' );
		const numMatch = target.match( /[\d,]+/ );
		if ( ! numMatch ) return;

		const endVal = parseInt( numMatch[0].replace( /,/g, '' ), 10 );

		function update( time ) {
			const elapsed  = time - start;
			const progress = Math.min( elapsed / duration, 1 );
			const eased    = 1 - Math.pow( 1 - progress, 3 ); // ease-out cubic
			const current  = Math.round( startVal + ( endVal - startVal ) * eased );

			el.textContent = current.toLocaleString() + ( isPlus ? '+' : '' );

			if ( progress < 1 ) {
				requestAnimationFrame( update );
			}
		}

		requestAnimationFrame( update );
	}

	if ( 'IntersectionObserver' in window ) {
		const statObserver = new IntersectionObserver(
			function ( entries ) {
				entries.forEach( function ( entry ) {
					if ( entry.isIntersecting ) {
						const el = entry.target;
						animateCounter( el, el.dataset.target || el.textContent, 2000 );
						statObserver.unobserve( el );
					}
				} );
			},
			{ threshold: 0.5 }
		);

		document.querySelectorAll( '.hero-stat-number' ).forEach( function ( el ) {
			el.dataset.target = el.textContent;
			statObserver.observe( el );
		} );
	}

	// =============================================
	// LAZY LOAD IMAGES
	// =============================================
	if ( 'loading' in HTMLImageElement.prototype ) {
		// Native lazy loading supported
		document.querySelectorAll( 'img[data-src]' ).forEach( function ( img ) {
			img.src = img.dataset.src;
			img.loading = 'lazy';
		} );
	} else if ( 'IntersectionObserver' in window ) {
		const lazyObserver = new IntersectionObserver( function ( entries ) {
			entries.forEach( function ( entry ) {
				if ( entry.isIntersecting ) {
					const img  = entry.target;
					img.src    = img.dataset.src;
					img.classList.remove( 'lazy' );
					lazyObserver.unobserve( img );
				}
			} );
		} );

		document.querySelectorAll( 'img[data-src]' ).forEach( function ( img ) {
			lazyObserver.observe( img );
		} );
	}


	// =============================================
	// TESTIMONIAL SLIDER (simple auto-scroll hint)
	// =============================================
	const testimonialsGrid = document.querySelector( '.testimonials-grid' );
	if ( testimonialsGrid ) {
		// Add touch scroll support on mobile
		let isDown     = false;
		let startX;
		let scrollLeft;

		testimonialsGrid.addEventListener( 'mousedown', function ( e ) {
			isDown = true;
			startX = e.pageX - testimonialsGrid.offsetLeft;
			scrollLeft = testimonialsGrid.scrollLeft;
			testimonialsGrid.style.cursor = 'grabbing';
		} );

		testimonialsGrid.addEventListener( 'mouseleave', function () { isDown = false; testimonialsGrid.style.cursor = ''; } );
		testimonialsGrid.addEventListener( 'mouseup', function () { isDown = false; testimonialsGrid.style.cursor = ''; } );
		testimonialsGrid.addEventListener( 'mousemove', function ( e ) {
			if ( ! isDown ) return;
			e.preventDefault();
			const x     = e.pageX - testimonialsGrid.offsetLeft;
			const walk  = ( x - startX ) * 2;
			testimonialsGrid.scrollLeft = scrollLeft - walk;
		} );
	}

} )();
