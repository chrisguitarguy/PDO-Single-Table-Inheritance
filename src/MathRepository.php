<?php
/**
 * For a blog post on http://christopherdavis.me
 *
 * @package     Chrisguitarguy\Example\PdoPolymorphism
 * @license     http://opensource.org/licenses/MIT MIT
 */

namespace Chrisguitarguy\Example\PdoSta;

/**
 * Storage repository for math objects.
 */
interface MathRepository
{
    /**
     * Save a math object.
     *
     * @param   Math $math
     * @return  int the primary key of the newly saved object
     */
    public function insert(Math $math);

    /**
     * Get all the math objects we currently have stored.
     *
     * @return  Math[]
     */
    public function all();
}
