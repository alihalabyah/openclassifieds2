<?php defined('SYSPATH') or die('No direct access allowed.');


/**
 * custom options for the theme
 * @var array
 */
return array(   'theme' => array(	       'type'      => 'text',
                                            'display'   => 'select',
                                            'label'     => __('Change the color theme'),
                                            'options'   => array(   'default'   => 'Blue',
                                                                    'green'     => 'Green',
                                                                    'orange'    => 'Orange',
                                                                ),
                                            'default'   => 'default',
                                            'required'  => TRUE
                                            ),

                'admin_theme' => array(     'type'      => 'text',
                                            'display'   => 'select',
                                            'label'     => __('Change the admin color theme'),
                                            'options'   => array(   'bootstrap' => 'Original',
                                                                    'cerulean'  => 'Dark Blue',
                                                                    'cosmo'     => 'Metro Style',
                                                                    'spacelab'  => 'Nice Grey',
                                                                    'united'    => 'Purple / Orange',
                                                                ), 
                                            'default'   => 'bootstrap',
                                            'required'  => TRUE),

);