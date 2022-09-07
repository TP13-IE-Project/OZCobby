<?php

return array(
    'front-header' => array(

        'navigation' => array(
            'background' => array(
                'color' => '#fff'
            ),
            'padding' => array(
                'padding-top' => '10px',
                'padding-bottom' => '10px'
            ),
        ),
        'menu' => array(
            'menuItem' => array(
                'color' => '#4A5568',
                'typography' => array(
                    'font-size' => '16px',
                    'line-height' => '1.6',
                ),
                'states' => array(
                    'hover' => array(
                        'color' => '#3182CE'
                    )
                )
            ),
            'menuItemActive' => array(
                'color' => '#3182CE'
            ),
            'submenuItem' => array(
                'color' => '#4A5568',
                'typography' => array(
                    'font-size' => '14px',
                    'line-height' => '1.6',
                ),
                'states' => array(
                    'hover' => array(
                        'color' => '#3182CE'
                    )
                )
            ),
            'submenuContainer' => array(
                'background' => array(
                    'color' => '#fff'
                )
            )
        ),
        'hero' => array(
            'background' => array(
                'image' => get_template_directory_uri() . "/assets/images/road-traffic-street-car-automobile-city.jpg",
                'overlay' => array(
                    'enabled' => true,
                    'color' => '#000',
                    'opacity' => 0.3
                ),
            ),
            'padding' => array(
                'padding-top' => '90px',
                'padding-bottom' => '90px'
            ),
            'textAlign' => 'center',
            'fullHeight' => true,
        ),
        'logo' => array(
            'type' => 'text'
        ),

        'title' => array(
            'enabled' => true,
            'color' => 'white',
            'content' => __('Click the pencil icon to edit the text', 'styx'),
            'typography' => array(
                'font-size' => '2.5rem',
                'line-height' => '1.6',
            )
        ),
        'subtitle' => array(
            'enabled' => true,
            'color' => 'white',
            'content' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enimnad minim veniam, quis nostrud exercitation ullamco laboris nisi.', 'styx'),
            'typography' => array(
                'font-size' => '20px',
                'line-height' => '1.6',
            )

        ),
        'primary-button' => array(
            'enabled' => true,
            'content' => __('Primary button', 'styx'),
            'color' => '#fff',
            'background' => array('color' => '#3182CE'),
            'padding' => array(
                'padding-top' => '10px',
                'padding-bottom' => '10px',
                'padding-left' => '30px',
                'padding-right' => '30px'
            ),
            'typography' => array(
                'font-size' => '16px',
                'line-height' => '1.5',
            ),
            'margin' => array(
                'margin-top' => '0px',
                'margin-bottom' => '10px',
                'margin-left' => '10px',
                'margin-right' => '10px'
            ),
            'border' => array(
                'width' => '3',
                'radius' => '4',
                'color' => '#3182CE'
            ),
            'states' => array(
                'hover' => array(
                    'color' => '#fff',
                    'background' => array(
                        'color' => '#2B6CB0'
                    ),
                    'border' => array(
                        'color' => '#2B6CB0'
                    )
                )
            ),
        ),
        'secondary-button' => array(
            'enabled' => true,
            'content' => __('Secondary button', 'styx'),
            'color' => 'white',
            'background' => array('color' => 'transparent'),
            'padding' => array(
                'padding-top' => '10px',
                'padding-bottom' => '10px',
                'padding-left' => '30px',
                'padding-right' => '30px'
            ),
            'margin' => array(
                'margin-top' => '0px',
                'margin-bottom' => '10px',
                'margin-left' => '10px',
                'margin-right' => '10px'
            ),
            'typography' => array(
                'font-size' => '16px',
                'line-height' => '1.5',
            ),
            'border' => array(
                'width' => '3',
                'radius' => '4',
                'color' => '#3182CE'
            ),
            'states' => array(
                'hover' => array(
                    'color' => 'black',
                    'background' => array(
                        'color' => '#fff'
                    ),
                    'border' => array(
                        'color' => 'white'
                    )
                )
            ),
        )
    ),
    'footer' => array(
        'content' => __('Created using Styx powered by Wordpress', 'styx'),
        'background' => array(
            'color' => '#e9ecef'
        ),
        'padding' => array(
            'padding-top' => '64px',
            'padding-bottom' => '64px'
        ),
        'color' => '#2D3748',
        'typography' => array(
            'font-size' => '17px',
            'line-height' => '1.6',
        )
    )
);