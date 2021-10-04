window.addEventListener("DOMContentLoaded", () => {

    var activeClass = 'active';
    var main_menu_searchbutton = document.querySelector('#seitensuche');
    var main_content = document.getElementById('maincontent');
    var menu_back_btn = document.getElementById('back_navi');

    var selector_submenu_close_button = 'div.submenu-row.first > button.submenu__close-button';
    var selector_main_navi = '#navigation > ul.nav-container__main-nav';
    var selector_main_navi_items = 'li.nav-container__main-nav-item > a';
    var selector_main_navi_submenu = '.main-nav_submenu';

    var main_navi = document.querySelector(selector_main_navi);
    var main_navi_items = main_navi.querySelectorAll(selector_main_navi_items);
    var main_navi_submenu = main_navi.querySelector(selector_main_navi_submenu);


    main_navi_items.forEach((main_navi_item, i) => {

        /**
         * has submenu ?
         */
        if (main_navi_item.hasAttribute('aria-controls')) {

            var submenu_id = main_navi_item.getAttribute('aria-controls');
            var submenuElement = document.getElementById(submenu_id);

            if (submenuElement) {

                var submenu_links = submenuElement.querySelectorAll('a');
                submenu_links.forEach((item, i) => {
                    item.addEventListener('focusin', (e) => {
                        if (!main_navi_item.classList.contains(activeClass)) {
                            main_navi_item.classList.add(activeClass);
                        }
                        if (!submenuElement.classList.contains(activeClass)) {
                            submenuElement.classList.add(activeClass);
                        }
                    });
                });

                var submenu_buttons = submenuElement.querySelectorAll('button');
                submenu_buttons.forEach((item, i) => {
                    item.addEventListener('focusin', (e) => {
                        if (!main_navi_item.classList.contains(activeClass)) {
                            main_navi_item.classList.add(activeClass);
                        }
                        if (!submenuElement.classList.contains(activeClass)) {
                            submenuElement.classList.add(activeClass);
                        }
                    });
                });

            }

        }

        main_navi_item.addEventListener('keydown', (e) => {

            var targetElement = e.target;

            resetMenu();

            if (e.keyCode === 9 && e.shiftKey === false) {

                targetElement.classList.add(activeClass);
                /**
                 * @TODO: check usage for subelement or sibling!!!
                 * @type {HTMLElement}
                 */
                var submenuElement = getSubmenu(targetElement);

                if (submenuElement) {

                    submenuElement.classList.add(activeClass);
                    main_content.classList.add('overlay');

                    submenuElement.addEventListener('keydown', (e) => {
                        if (e.keyCode === 27) {
                            closeMenuItem(targetElement);
                            escapeMenu(targetElement);
                        }
                    })

                    setSubmenuCloseButton(main_navi_item);
                }

            }

            // ESC
            if (e.keyCode === 27) {
                closeMenuItem(targetElement);
            }

        });

        main_navi_item.addEventListener('click', (e) => {

            toogleMenu(e.target);
            setSubmenuCloseButton(e.target);
            setBackNaviButton();

        })

    });

    function escapeMenu(targetElement) {

        var menu = main_navi.querySelectorAll(selector_main_navi_items);

        menu.forEach((item, i) => {
            if (item === targetElement) {
                i++;
                nextElement = (menu[i] || main_menu_searchbutton);
                nextElement.focus();
            }
        });

    }

    function resetMenu() {

        var menu = main_navi.querySelectorAll(selector_main_navi_items);

        menu.forEach((item, e) => {
            item.classList.remove(activeClass);

            var submenuElement = getSubmenu(item);

            if (submenuElement) {
                submenuElement.classList.remove(activeClass);
            }
        });

    }

    function toogleOverlayContent() {

        if (!main_content.classList.contains('overlay')) {
            main_content.classList.add('overlay');
        } else {
            main_content.classList.remove('overlay');
        }
    }

    function toogleMenu(targetElement) {

        var menu = main_navi.querySelectorAll(selector_main_navi_items);

        menu.forEach((item, e) => {
            if (item !== targetElement) {
                item.classList.remove(activeClass);

                if (item.hasAttribute('aria-controls')) {
                    var selectorSubmenu = item.getAttribute('aria-controls');
                    submenuElement = document.getElementById(selectorSubmenu);
                }

                if (submenuElement) {
                    submenuElement.classList.remove(activeClass);
                }
            }
        });

        var submenuElement = getSubmenu(targetElement);

        if (targetElement.classList.contains(activeClass)) {

            main_content.classList.remove('overlay');

            targetElement.classList.remove(activeClass);
            targetElement.setAttribute('aria-expanded', false);

            if (submenuElement) {
                submenuElement.classList.remove(activeClass);
                submenuElement.setAttribute('aria-expanded', false);
                submenuElement.setAttribute('aria-hidden', true);
            }

        } else {

            main_content.classList.add('overlay');

            targetElement.classList.add(activeClass);
            targetElement.setAttribute('aria-expanded', true);

            if (submenuElement) {
                submenuElement.classList.add(activeClass);
                submenuElement.setAttribute('aria-expanded', true);
                submenuElement.setAttribute('aria-hidden', false);
            }

        }
    }

    function getSubmenu(targetElement) {

        var submenuElement = null;

        if (targetElement.hasAttribute('aria-controls')) {
            var selectorSubmenu = targetElement.getAttribute('aria-controls');
            submenuElement = document.getElementById(selectorSubmenu);
        }

        return submenuElement;

    }

    function setSubmenuCloseButton(targetElement) {

        var submenu_close_button = null;

        var submenuElement = getSubmenu(targetElement);

        if (submenuElement) {

            submenu_close_button = submenuElement.querySelector(selector_submenu_close_button);

            if (submenu_close_button) {
                submenu_close_button.addEventListener('click', (e) => {
                    closeMenuItem(targetElement);
                });
                submenu_close_button.addEventListener('keydown', (e) => {
                    closeMenuItem(targetElement);
                });
            }

        }
    }

    function closeMenuItem(targetElement) {

        targetElement.classList.remove(activeClass);

        var submenuElement = getSubmenu(targetElement);

        if (submenuElement) {
            submenuElement.classList.remove(activeClass);
        }
        main_content.classList.remove('overlay');
    }

    /**
     * Mobile Menu
     * @type {HTMLElement}
     */
    var menu_btn = document.getElementById('menu-btn');
    menu_btn.addEventListener('click', toogleMenuButton);
    menu_btn.addEventListener('keydown', toogleMenuButton);

    function toogleMenuButton(event) {

        if (!menu_btn.classList.contains(activeClass)) {
            menu_btn.classList.add(activeClass);
            toogleMainNavi('flex');
            main_content.classList.add('overlay');

        } else {
            menu_btn.classList.remove(activeClass);
            toogleMainNavi('none');
            main_content.classList.remove('overlay');
            unsetActiveMenu();
        }

    }

    function toogleMainNavi(propDisplay) {
        selector_main_navi
        var main_nav = document.querySelector(selector_main_navi);
        //var main_nav = document.getElementsByClassName('nav-container__main-nav')[0];
        main_nav.style.display = propDisplay;
    }

    function setBackNaviButton() {
        toogleBackButton('block');
        menu_back_btn.addEventListener('click', backNavi);
        menu_back_btn.addEventListener('keydown', backNavi);
    }

    function toogleBackButton(propDisplay) {
        menu_back_btn.style.display = propDisplay;
    }

    function unsetActiveMenu() {
        var active_main_navi_item = document.querySelector(selector_main_navi_items + '.' + activeClass);
        if (active_main_navi_item) {
            console.log('active menu-link: ', active_main_navi_item);

            active_main_navi_item.classList.remove(activeClass);

            var submenu = getSubmenu(active_main_navi_item);
            console.log('active submenu: ', submenu);
            submenu.classList.remove(activeClass);
        }
        toogleBackButton('none');
    }

    function backNavi(event) {
        unsetActiveMenu();
    }

});


