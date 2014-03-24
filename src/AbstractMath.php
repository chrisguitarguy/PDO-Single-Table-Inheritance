<?php
/**
 * For a blog post on http://christopherdavis.me
 *
 * @package     Chrisguitarguy\Example\PdoPolymorphism
 * @license     http://opensource.org/licenses/MIT MIT
 */

namespace Chrisguitarguy\Example\PdoSta;

abstract class AbstractMath implements Math
{
    private $math_type;
    private $math_value;

    public function __construct($value=null)
    {
        $this->math_value = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function getValue()
    {
        return $this->math_value;
    }

    /**
     * Magic setter method for PDO to use when setting props.
     *
     * @param   string $key
     * @param   mixed $value
     * @return  void
     */
    public function __set($key, $value)
    {
        switch ($key) {
            case 'math_type':
                $this->math_type = $value;
                break;
            case 'math_value':
                $this->math_value = $value;
                break;
            default:
                throw new \InvalidArgumentException(sprintf(
                    '"%s" is not a valid property for %s',
                    $key,
                    get_class($this)
                ));
        }
    }
}
