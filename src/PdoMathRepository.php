<?php
/**
 * For a blog post on http://christopherdavis.me
 *
 * @package     Chrisguitarguy\Example\PdoPolymorphism
 * @license     http://opensource.org/licenses/MIT MIT
 */

namespace Chrisguitarguy\Example\PdoSta;

class PdoMathRepository implements MathRepository
{
    const DEFAULT_TABLE = 'sta_math';

    private $dbh;
    private $table;

    public function __construct(\PDO $dbh, $table=null)
    {
        $this->dbh = $dbh;
        $this->table = $table ?: static::DEFAULT_TABLE;
    }

    /**
     * {@inheritdoc}
     */
    public function insert(Math $math)
    {
        $stm = $this->dbh->prepare("INSERT INTO {$this->table} (math_type, math_value) VALUES (:math_type, :math_value)");
        $stm->bindValue(':math_type', get_class($math));
        $stm->bindValue(':math_value', $math->getValue(), \PDO::PARAM_INT);
        if (!$stm->execute()) {
            throw new \UnexpectedValueException('Unable to execute insert statement');
        }

        return $this->dbh->lastInsertId();
    }

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        $stm = $this->dbh->query(
            "SELECT math_type, math_value FROM {$this->table}",
            \PDO::FETCH_CLASSTYPE | \PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE
        );

        return $stm->fetchAll();
    }
}
