<?php
/**
 * For a blog post on http://christopherdavis.me
 *
 * @package     Chrisguitarguy\Example\PdoPolymorphism
 * @license     http://opensource.org/licenses/MIT MIT
 */

namespace Chrisguitarguy\Example\PdoSta;

class Subtraction extends AbstractMath
{
    /**
     * {@inheritdoc}
     */
    public function operate($input)
    {
        return $input - $this->getValue();
    }
}
