<?php

namespace Styx;


class LodashSimple {
    static function array_get_value( array &$array, $parents, $default = null, $glue = '.' ) {
        if ( ! $array || ! is_array( $array ) ) {
            return $default;
        }

        if ( ! is_array( $parents ) ) {
            $parents = explode( $glue, $parents );
        }

        $ref = &$array;

        foreach ( (array) $parents as $parent ) {
            if ( is_array( $ref ) && array_key_exists( $parent, $ref ) ) {
                $ref = &$ref[ $parent ];
                // walk inside object
            } elseif ( is_object( $ref ) && property_exists( $ref, $parent ) ) {
                $ref = &$ref->$parent;
            } else {
                return $default;
            }
        }

        return $ref;
    }

    static function array_set_value( array &$array, $parents, $value, $glue = '.' ) {
        if ( ! is_array( $parents ) ) {
            $parents = explode( $glue, (string) $parents );
        }

        $ref = &$array;

        foreach ( $parents as $parent ) {
            if ( isset( $ref ) && ! is_array( $ref ) ) {
                $ref = array();
            }

            $ref = &$ref[ $parent ];
        }

        $ref = $value;
    }

    static function array_unset_value( &$array, $parents, $glue = '.' ) {
        if ( ! is_array( $parents ) ) {
            $parents = explode( $glue, $parents );
        }

        $key = array_shift( $parents );

        if ( empty( $parents ) ) {
            unset( $array[ $key ] );
        } else {
            self::array_unset_value( $array[ $key ], $parents );
        }
    }

    static function get( $array, $parents, $default = null ) {
        if ( $array ) {
            return self::array_get_value( $array, $parents, $default );
        }
        return $default;
    }

    static function set( array &$array, $parents, $value ) {
        self::array_set_value( $array, $parents, $value );
    }

    static function unsetValue( array &$array, $parents ) {
        self::array_unset_value( $array, $parents );
    }
    static function compact( $array ) {
        return \array_values(\array_filter($array ? $array : []));
    }
    static function merge( ...$values ) {
        $not_null_values = static::compact( $values );
        if ( count( $not_null_values ) > 0 ) {
            return array_replace_recursive( ...$not_null_values );
        }
        return array();
    }
}
