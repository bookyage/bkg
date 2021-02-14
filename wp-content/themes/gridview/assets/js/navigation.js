/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
    var gridview_secondary_container, gridview_secondary_button, gridview_secondary_menu, gridview_secondary_links, gridview_secondary_i, gridview_secondary_len;

    gridview_secondary_container = document.getElementById( 'gridview-secondary-navigation' );
    if ( ! gridview_secondary_container ) {
        return;
    }

    gridview_secondary_button = gridview_secondary_container.getElementsByTagName( 'button' )[0];
    if ( 'undefined' === typeof gridview_secondary_button ) {
        return;
    }

    gridview_secondary_menu = gridview_secondary_container.getElementsByTagName( 'ul' )[0];

    // Hide menu toggle button if menu is empty and return early.
    if ( 'undefined' === typeof gridview_secondary_menu ) {
        gridview_secondary_button.style.display = 'none';
        return;
    }

    gridview_secondary_menu.setAttribute( 'aria-expanded', 'false' );
    if ( -1 === gridview_secondary_menu.className.indexOf( 'nav-menu' ) ) {
        gridview_secondary_menu.className += ' nav-menu';
    }

    gridview_secondary_button.onclick = function() {
        if ( -1 !== gridview_secondary_container.className.indexOf( 'gridview-toggled' ) ) {
            gridview_secondary_container.className = gridview_secondary_container.className.replace( ' gridview-toggled', '' );
            gridview_secondary_button.setAttribute( 'aria-expanded', 'false' );
            gridview_secondary_menu.setAttribute( 'aria-expanded', 'false' );
        } else {
            gridview_secondary_container.className += ' gridview-toggled';
            gridview_secondary_button.setAttribute( 'aria-expanded', 'true' );
            gridview_secondary_menu.setAttribute( 'aria-expanded', 'true' );
        }
    };

    // Get all the link elements within the menu.
    gridview_secondary_links    = gridview_secondary_menu.getElementsByTagName( 'a' );

    // Each time a menu link is focused or blurred, toggle focus.
    for ( gridview_secondary_i = 0, gridview_secondary_len = gridview_secondary_links.length; gridview_secondary_i < gridview_secondary_len; gridview_secondary_i++ ) {
        gridview_secondary_links[gridview_secondary_i].addEventListener( 'focus', gridview_secondary_toggleFocus, true );
        gridview_secondary_links[gridview_secondary_i].addEventListener( 'blur', gridview_secondary_toggleFocus, true );
    }

    /**
     * Sets or removes .focus class on an element.
     */
    function gridview_secondary_toggleFocus() {
        var self = this;

        // Move up through the ancestors of the current link until we hit .nav-menu.
        while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

            // On li elements toggle the class .focus.
            if ( 'li' === self.tagName.toLowerCase() ) {
                if ( -1 !== self.className.indexOf( 'gridview-focus' ) ) {
                    self.className = self.className.replace( ' gridview-focus', '' );
                } else {
                    self.className += ' gridview-focus';
                }
            }

            self = self.parentElement;
        }
    }

    /**
     * Toggles `focus` class to allow submenu access on tablets.
     */
    ( function( gridview_secondary_container ) {
        var touchStartFn, gridview_secondary_i,
            parentLink = gridview_secondary_container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

        if ( 'ontouchstart' in window ) {
            touchStartFn = function( e ) {
                var menuItem = this.parentNode, gridview_secondary_i;

                if ( ! menuItem.classList.contains( 'gridview-focus' ) ) {
                    e.preventDefault();
                    for ( gridview_secondary_i = 0; gridview_secondary_i < menuItem.parentNode.children.length; ++gridview_secondary_i ) {
                        if ( menuItem === menuItem.parentNode.children[gridview_secondary_i] ) {
                            continue;
                        }
                        menuItem.parentNode.children[gridview_secondary_i].classList.remove( 'gridview-focus' );
                    }
                    menuItem.classList.add( 'gridview-focus' );
                } else {
                    menuItem.classList.remove( 'gridview-focus' );
                }
            };

            for ( gridview_secondary_i = 0; gridview_secondary_i < parentLink.length; ++gridview_secondary_i ) {
                parentLink[gridview_secondary_i].addEventListener( 'touchstart', touchStartFn, false );
            }
        }
    }( gridview_secondary_container ) );
} )();


( function() {
    var gridview_primary_container, gridview_primary_button, gridview_primary_menu, gridview_primary_links, gridview_primary_i, gridview_primary_len;

    gridview_primary_container = document.getElementById( 'gridview-primary-navigation' );
    if ( ! gridview_primary_container ) {
        return;
    }

    gridview_primary_button = gridview_primary_container.getElementsByTagName( 'button' )[0];
    if ( 'undefined' === typeof gridview_primary_button ) {
        return;
    }

    gridview_primary_menu = gridview_primary_container.getElementsByTagName( 'ul' )[0];

    // Hide menu toggle button if menu is empty and return early.
    if ( 'undefined' === typeof gridview_primary_menu ) {
        gridview_primary_button.style.display = 'none';
        return;
    }

    gridview_primary_menu.setAttribute( 'aria-expanded', 'false' );
    if ( -1 === gridview_primary_menu.className.indexOf( 'nav-menu' ) ) {
        gridview_primary_menu.className += ' nav-menu';
    }

    gridview_primary_button.onclick = function() {
        if ( -1 !== gridview_primary_container.className.indexOf( 'gridview-toggled' ) ) {
            gridview_primary_container.className = gridview_primary_container.className.replace( ' gridview-toggled', '' );
            gridview_primary_button.setAttribute( 'aria-expanded', 'false' );
            gridview_primary_menu.setAttribute( 'aria-expanded', 'false' );
        } else {
            gridview_primary_container.className += ' gridview-toggled';
            gridview_primary_button.setAttribute( 'aria-expanded', 'true' );
            gridview_primary_menu.setAttribute( 'aria-expanded', 'true' );
        }
    };

    // Get all the link elements within the menu.
    gridview_primary_links    = gridview_primary_menu.getElementsByTagName( 'a' );

    // Each time a menu link is focused or blurred, toggle focus.
    for ( gridview_primary_i = 0, gridview_primary_len = gridview_primary_links.length; gridview_primary_i < gridview_primary_len; gridview_primary_i++ ) {
        gridview_primary_links[gridview_primary_i].addEventListener( 'focus', gridview_primary_toggleFocus, true );
        gridview_primary_links[gridview_primary_i].addEventListener( 'blur', gridview_primary_toggleFocus, true );
    }

    /**
     * Sets or removes .focus class on an element.
     */
    function gridview_primary_toggleFocus() {
        var self = this;

        // Move up through the ancestors of the current link until we hit .nav-menu.
        while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

            // On li elements toggle the class .focus.
            if ( 'li' === self.tagName.toLowerCase() ) {
                if ( -1 !== self.className.indexOf( 'gridview-focus' ) ) {
                    self.className = self.className.replace( ' gridview-focus', '' );
                } else {
                    self.className += ' gridview-focus';
                }
            }

            self = self.parentElement;
        }
    }

    /**
     * Toggles `focus` class to allow submenu access on tablets.
     */
    ( function( gridview_primary_container ) {
        var touchStartFn, gridview_primary_i,
            parentLink = gridview_primary_container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

        if ( 'ontouchstart' in window ) {
            touchStartFn = function( e ) {
                var menuItem = this.parentNode, gridview_primary_i;

                if ( ! menuItem.classList.contains( 'gridview-focus' ) ) {
                    e.preventDefault();
                    for ( gridview_primary_i = 0; gridview_primary_i < menuItem.parentNode.children.length; ++gridview_primary_i ) {
                        if ( menuItem === menuItem.parentNode.children[gridview_primary_i] ) {
                            continue;
                        }
                        menuItem.parentNode.children[gridview_primary_i].classList.remove( 'gridview-focus' );
                    }
                    menuItem.classList.add( 'gridview-focus' );
                } else {
                    menuItem.classList.remove( 'gridview-focus' );
                }
            };

            for ( gridview_primary_i = 0; gridview_primary_i < parentLink.length; ++gridview_primary_i ) {
                parentLink[gridview_primary_i].addEventListener( 'touchstart', touchStartFn, false );
            }
        }
    }( gridview_primary_container ) );
} )();