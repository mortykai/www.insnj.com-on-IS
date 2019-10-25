/**
 * Touch & Keyboard navigation.
 *
 * Contains handlers for touch devices and keyboard navigation.
 */

( function( $) {
  
  var mainNavigation= $( '.main-navigation');
  var mainMenuButton= $( '.main-navigation > button');

  function openMainMenu() {
    mainNavigation.addClass( 'expanded-true');
    mainMenuButton.removeClass( 'tm2_menuClosed');
    mainMenuButton.addClass( 'tm2_menuOpen');
  }

  function closeMainMenu() {

    closeAllSubMenus( mainNavigation);
    
    mainNavigation.removeClass( 'expanded-true');
    mainMenuButton.removeClass( 'tm2_menuOpen');
    mainMenuButton.addClass( 'tm2_menuClosed');
  }

	function toggleAriaExpandedState( ariaItem) {
		'use strict';

		var ariaState = ariaItem.attr( 'aria-expanded');

		if ( ariaState === 'true' ) {
			ariaState = 'false';
		} else {
			ariaState = 'true';
		}
		ariaItem.attr( 'aria-expanded', ariaState);
	}

	function openSubMenu( menuItem ) {
		'use strict';
  
   if( !menuItem.hasClass( 'off-canvas')){
      menuItem.addClass( 'off-canvas');
      $( '.sub-menu', menuItem).addClass( 'expanded-true');
      toggleAriaExpandedState( $( 'a[aria-expanded]', menuItem));
    }
	}

	function closeSubMenu( menuItem ) {
		'use strict';

    if( menuItem.hasClass( 'off-canvas')){
      closeAllSubMenus( menuItem);
      menuItem.removeClass( 'off-canvas' );
      $( '.sub-menu', menuItem).removeClass( 'expanded-true' );
      toggleAriaExpandedState( $( 'a[aria-expanded]', menuItem) );
    }
	}

  function closeAllSubMenus( startingElement){
    $( '.off-canvas', startingElement).each( function(){ closeSubMenu( $( this));});
  }


  function addTouchControl(){
  
    // touches on main menu button toggles main menu open and closed
    /*
    mainMenuButton.on( 'touchstart', function( evt){
      if( mainNavigation.hasClass( 'expanded-true'))
        closeMainMenu();
      else
        openMainMenu();
      evt.preventDefault();
      evt.stopPropagation();
      return false;
    });
    */

    //$( '.site-branding').on( 'touchstart', '.main-navigation:not(.expanded-true) > button', function(){
    mainNavigation.parent().on( 'touchstart', '.main-navigation:not(.expanded-true) > button', function(){
      openMainMenu();
      return false;
    });
   
    //$( '.site-branding').on( 'touchstart', '.main-navigation.expanded-true > button', function(){
    mainNavigation.parent().on( 'touchstart', '.main-navigation.expanded-true > button', function(){
      closeMainMenu();
      return false;
    });

    /*
    // touches on menu items anchors performs default action
    $( '.main-navigation').on( 'touchstart', '.menu-item:not(.menu-item-has-children) > a, .sub-menu.expanded-true > .menu-item > a', function( evt){
      evt.stopPropagation();
    });
    */
   
    /*
    // touches on submenu items anchors performs default action
    $( '.menu-item:not(.menu-item-has-children) a').on( 'touchstart', function( evt){
      evt.stopPropagation();
    });
    */
   
    /*   
    // touches on menu items with childrens' anchors opens submenu if closed, takes default action if open
    $( '.menu-item-has-children > a').on( 'touchstart', function( evt){
      var menuItem= $( this).parent();
      if( menuItem.is( '.off-canvas'))
        evt.stopPropagation();
      else
        evt.preventDefault();
      });
    */
   
    // touches on menu items with children toggle the submenu open and closed
    //$( '.main-navigation ul').on( 'touchstart', '.menu-item-has-children:not(.off-canvas)', function( evt){
    $( '.main-navigation ul').on( 'touchstart', '.menu-item-has-children:not(.off-canvas)', function(){
      openSubMenu( $( this));
      return false;
    });

    // touches on menu items with children toggle the submenu open and closed
    $( '.main-navigation ul').on( 'touchstart', '.off-canvas', function( evt){
      var t= $(evt.target);
      if( ! $(evt.target).is( 'ul *')){
        closeSubMenu( $( this));
        return false;
      }
    });

    /*
    // touches on menu items with children toggle the submenu open and closed
    $( '.menu-item-has-children').on( 'touchstart', function( evt){
      var menuItem= $( this);
      if( menuItem.hasClass( 'off-canvas' ))
          closeSubMenu( menuItem);
        else
          openSubMenu( menuItem);
      return false;
    });
    */

    //touches outside any submenu close the submenu
    $( '.main-navigation-container').on( 'touchstart', function( evt){
      if( ! $(evt.target).is( '.main-menu *')){
        closeAllSubMenus( $( this));
        return false;
      }
    });

    /*
    $( '.main-navigation').on( 'touchstart', function( evt){ 
      //if( (!$( evt.target).is( 'a')))
        var tgt= evt.target;
        evt.preventDefault();
        return false;
    });
    */
   
    // touches outside the main menu close the main menu
    $( document).on( 'touchstart', function( evt){
      if( !( $(evt.target).is( '.main-navigation *'))){
        closeMainMenu();
        return false;
      }
    });

  }

	function debounce(func, wait, immediate) {
		'use strict';

		var timeout;
		wait      = (typeof wait !== 'undefined') ? wait : 20;
		immediate = (typeof immediate !== 'undefined') ? immediate : true;

		return function() {

			var context = this, args = arguments;
			var later = function() {
				timeout = null;

				if (!immediate) {
					func.apply(context, args);
				}
			};

			var callNow = immediate && !timeout;

			clearTimeout(timeout);
			timeout = setTimeout(later, wait);

			if (callNow) {
				func.apply(context, args);
			}
		};
	}

  //test for touch events support and if not supported, attach .no-touch class to the HTML tag.
  if (!("ontouchstart" in document.documentElement))
    $('html').addClass( 'no-touch');

	/**
	 * Matches polyfill for IE11
	 */
	if (!Element.prototype.matches) {
		Element.prototype.matches = Element.prototype.msMatchesSelector;
	}
  
  

	addTouchControl();


  var isResizing = false;
	window.addEventListener( 'resize', function() {
return;    
    isResizing = true;
		debounce( function() {
			if ( isResizing ) {
				return;
			}
			//toggleSubmenuDisplay();
			isResizing = false;
		}, 150 );
	} );

	document.addEventListener( 'customize-preview-menu-refreshed', function( e, params ) {
		if ( params.wpNavMenuArgs.theme_location=== 'menu-1' ) {
			toggleSubmenuDisplay();
		}
	});

})( jQuery);
