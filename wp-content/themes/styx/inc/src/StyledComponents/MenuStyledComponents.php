<?php

namespace Styx\StyledComponents;


class MenuStyledComponents extends StyledComponentsBase
{
    const  CONTAINER = 'container';
    const  MENU_ITEM = 'menuItem';
    const MENU_ITEM_ACTIVE = 'menuItemActive';
    const  SUBMENU_CONTAINER = 'submenuContainer';
    const  SUBMENU_ITEM = 'submenuItem';

    const MAIN_MENU_SELECTOR = 'ul.navbar-nav';
    public function elements() {
        return [
            [
                'id' => self::CONTAINER,
                'selector' => self::MAIN_MENU_SELECTOR
            ],
            [
                'id' => self::MENU_ITEM,
                'selector' => sprintf('%s > li', self::MAIN_MENU_SELECTOR)
            ],
            [
                'id' => self::MENU_ITEM_ACTIVE,
                'selector' => sprintf('%s li.current-menu-item', self::MAIN_MENU_SELECTOR)
            ],
            [
                'id' => self::SUBMENU_CONTAINER,
                'selector' => sprintf('%s > li ul',self::MAIN_MENU_SELECTOR )
            ],
            [
                'id' => self::SUBMENU_ITEM,
                'selector' => sprintf('%s > li ul li', self::MAIN_MENU_SELECTOR)
            ]
        ];
    }

}