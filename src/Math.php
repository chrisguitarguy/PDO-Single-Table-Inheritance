<?php
/**
 * For a blog post on http://christopherdavis.me
 *
 * @package     Chrisguitarguy\Example\PdoPolymorphism
 * @license     http://opensource.org/licenses/MIT MIT
 */

namespace Chrisguitarguy\Example\PdoSta;

/**
 * Our interface: defines a single method that performs an operation on a number.
 *
 * The operation will depend on a value stored in our database.
 */
interface Math
{
    /**
     * Change $input as defined by how this entity was stored.
     *
     * @param   numeric $input
     * @return  numeric The changed value
     */
    public function operate($input);

    /**
     * Get the value by which the $input of operate will be changed.
     *
     * @return  int
     */
    public function getValue();
}
