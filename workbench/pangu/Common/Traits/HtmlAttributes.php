<?php
namespace Pangu\Common\Traits;

use Pangu\Common\Utility\Arr;

/**
 * Add methods to handle HTML attributes to an object class
 *
 * @author Anthony Pauwels <hello@anthonypauwels.be>
 * @package Pangu\Common
 */
trait HtmlAttributes
{
    /** @var array */
    protected $classList = [];
    /** @var array */
    protected $attributes = [];

    /**
     * Add class to the list
     *
     * @param string $class
     * @return $this
     */
    public function addClass(string $class)
    {
        $this->classList = array_unique( array_merge( $this->classList, [ $class ] ) );

        return $this;
    }

    /**
     * Add many class to the list
     *
     * @param mixed ...$class_list
     * @return $this
     */
    public function addClasses(...$class_list)
    {
        $class_list = is_array( $class_list[0] ) ? $class_list[0] : $class_list;

        $this->classList = array_unique( array_merge( $this->classList , Arr::trim( $class_list ) ) );

        return $this;
    }

    /**
     * Remove a class to the list
     *
     * @param $class_list
     * @return $this
     */
    public function removeClass($class_list)
    {
        if ( is_string( $class_list ) ) {
            $class_list = explode(',', $class_list );
        }

        $class_list = Arr::trim( $class_list );

        foreach ( $class_list as $class_el ) {
            unset( $this->classList[ $class_el ] );
        }

        return $this;
    }

    /**
     * Remove many classes to the list
     *
     * @param mixed ...$class_list
     * @return $this
     */
    public function removeClasses(...$class_list)
    {
        $class_list = is_array( $class_list[0] ) ? $class_list[0] : $class_list;

        $class_list = Arr::trim( $class_list );

        foreach ( $class_list as $class_el ) {
            unset( $this->classList[ $class_el ] );
        }

        return $this;
    }

    /**
     * Toggle class from the list, remove if exists and add if don't exists
     *
     * @param $class_list
     * @return $this
     */
    public function toggleClass(...$class_list)
    {
        $class_list = is_array( $class_list[0] ) ? $class_list[0] : $class_list;

        $class_list = Arr::trim( $class_list );

        foreach ( $class_list as $class_name ) {
            if ( isset( $this->classList[ $class_name ] ) ) {
                $this->removeClass( $class_name );
            } else {
                $this->addClass( $class_name );
            }
        }

        return $this;
    }

    /**
     * Add an html attribute to the list
     *
     * @param string $attribute_name
     * @param mixed $value
     * @return $this
     */
    public function addAttribute(string $attribute_name, $value = true)
    {
        $this->attributes[ $attribute_name ] = $value;

        return $this;
    }

    /**
     * Add many attributes
     *
     * @param array $attributes
     * @return $this
     */
    public function addAttributes(array $attributes)
    {
        foreach ( $attributes as $attribute_name => $value ) {
            $this->addAttribute( $attribute_name, $value );
        }

        return $this;
    }

    /**
     * Remove an html attribute to the list
     *
     * @param $attribute_name
     * @return $this
     */
    public function removeAttribute($attribute_name)
    {
        if ( isset( $this->attributes[ $attribute_name ] ) ) {
            unset ( $this->attributes[ $attribute_name ] );
        }

        return $this;
    }

    /**
     * Remove many attributes
     *
     * @param mixed ...$attributes
     * @return $this
     */
    public function removeAttributes(...$attributes) {
        $attributes = is_array( $attributes[0] ) ? $attributes[0] : $attributes;

        $attributes = Arr::trim( $attributes );

        foreach ( $attributes as $attribute_name ) {
            $this->removeAttribute( $attribute_name );
        }

        return $this;
    }

    /**
     * Get the value of the given attribute.
     * If attribute do not exists, return false
     *
     * @param string $attribute_name
     * @return mixed
     */
    public function getAttribute(string $attribute_name) {
        /** if we ask for the class attribute, we return the classList property */
        if ( $attribute_name === 'class' ) {
            return implode(' ', $this->classList);
        }

        return isset( $this->attributes[ $attribute_name ] ) ? $this->attributes[ $attribute_name ] : false;
    }

    /**
     * Method alias to addAttribute or getAttribute
     *
     * @param string $attribute_name
     * @param mixed $value
     * @return mixed
     */
    public function attr(string $attribute_name, $value = null) {
        if ( !is_null( $value ) ) {
            return $this->addAttribute( $attribute_name, $value );
        }

        return $this->getAttribute( $attribute_name );
    }

    /**
     * Build the html string with classes and attributes given
     *
     * @param array $except_attributes
     * @return string
     */
    protected function buildHtmlAttributes(array $except_attributes = []):string {
        $buffer = '';

        foreach ( array_unique( $this->attributes ) as $key => $value ) {
            if ( !in_array( $key, array_merge( $except_attributes , ['class'] ) ) ) {
                $buffer.= ' ' . $key . ( ( $value !== true ) ? '="' . $value . '"' : null);
            }
        }

        if ( !empty( $this->classList ) && !in_array( 'class', $except_attributes ) ) {
            $buffer.= ' class="' . $this->getAttribute('class') . '"';
        }

        return $buffer;
    }
}
