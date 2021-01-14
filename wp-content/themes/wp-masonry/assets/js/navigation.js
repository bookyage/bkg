/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
    var wp_masonry_primary_container, wp_masonry_primary_button, wp_masonry_primary_menu, wp_masonry_primary_links, wp_masonry_primary_i, wp_masonry_primary_len;

    wp_masonry_primary_container = document.getElementById( 'wp-masonry-primary-navigation' );
    if ( ! wp_masonry_primary_container ) {
        return;
    }

    wp_masonry_primary_button = wp_masonry_primary_container.getElementsByTagName( 'button' )[0];
    if ( 'undefined' === typeof wp_masonry_primary_button ) {
        return;
    }

    wp_masonry_primary_menu = wp_masonry_primary_container.getElementsByTagName( 'ul' )[0];

    // Hide menu toggle button if menu is empty and return early.
    if ( 'undefined' === typeof wp_masonry_primary_menu ) {
        wp_masonry_primary_button.style.display = 'none';
        return;
    }

    wp_masonry_primary_menu.setAttribute( 'aria-expanded', 'false' );
    if ( -1 === wp_masonry_primary_menu.className.indexOf( 'nav-menu' ) ) {
        wp_masonry_primary_menu.className += ' nav-menu';
    }

    wp_masonry_primary_button.onclick = function() {
        if ( -1 !== wp_masonry_primary_container.className.indexOf( 'wp-masonry-toggled' ) ) {
            wp_masonry_primary_container.className = wp_masonry_primary_container.className.replace( ' wp-masonry-toggled', '' );
            wp_masonry_primary_button.setAttribute( 'aria-expanded', 'false' );
            wp_masonry_primary_menu.setAttribute( 'aria-expanded', 'false' );
        } else {
            wp_masonry_primary_container.className += ' wp-masonry-toggled';
            wp_masonry_primary_button.setAttribute( 'aria-expanded', 'true' );
            wp_masonry_primary_menu.setAttribute( 'aria-expanded', 'true' );
        }
    };

    // Get all the link elements within the menu.
    wp_masonry_primary_links    = wp_masonry_primary_menu.getElementsByTagName( 'a' );

    // Each time a menu link is focused or blurred, toggle focus.
    for ( wp_masonry_primary_i = 0, wp_masonry_primary_len = wp_masonry_primary_links.length; wp_masonry_primary_i < wp_masonry_primary_len; wp_masonry_primary_i++ ) {
        wp_masonry_primary_links[wp_masonry_primary_i].addEventListener( 'focus', wp_masonry_primary_toggleFocus, true );
        wp_masonry_primary_links[wp_masonry_primary_i].addEventListener( 'blur', wp_masonry_primary_toggleFocus, true );
    }

    /**
     * Sets or removes .focus class on an element.
     */
    function wp_masonry_primary_toggleFocus() {
        var self = this;

        // Move up through the ancestors of the current link until we hit .nav-menu.
        while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

            // On li elements toggle the class .focus.
            if ( 'li' === self.tagName.toLowerCase() ) {
                if ( -1 !== self.className.indexOf( 'wp-masonry-focus' ) ) {
                    self.className = self.className.replace( ' wp-masonry-focus', '' );
                } else {
                    self.className += ' wp-masonry-focus';
                }
            }

            self = self.parentElement;
        }
    }

    /**
     * Toggles `focus` class to allow submenu access on tablets.
     */
    ( function( wp_masonry_primary_container ) {
        var touchStartFn, wp_masonry_primary_i,
            parentLink = wp_masonry_primary_container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

        if ( 'ontouchstart' in window ) {
            touchStartFn = function( e ) {
                var menuItem = this.parentNode, wp_masonry_primary_i;

                if ( ! menuItem.classList.contains( 'wp-masonry-focus' ) ) {
                    e.preventDefault();
                    for ( wp_masonry_primary_i = 0; wp_masonry_primary_i < menuItem.parentNode.children.length; ++wp_masonry_primary_i ) {
                        if ( menuItem === menuItem.parentNode.children[wp_masonry_primary_i] ) {
                            continue;
                        }
                        menuItem.parentNode.children[wp_masonry_primary_i].classList.remove( 'wp-masonry-focus' );
                    }
                    menuItem.classList.add( 'wp-masonry-focus' );
                } else {
                    menuItem.classList.remove( 'wp-masonry-focus' );
                }
            };

            for ( wp_masonry_primary_i = 0; wp_masonry_primary_i < parentLink.length; ++wp_masonry_primary_i ) {
                parentLink[wp_masonry_primary_i].addEventListener( 'touchstart', touchStartFn, false );
            }
        }
    }( wp_masonry_primary_container ) );
} )();