<?php
/**
 * Created by PhpStorm.
 * User: Inhere
 * Date: 2016/3/2 0002
 * Time: 22:33
 */

namespace Inhere\Database\Database;

use Windwalker\Query\Sqlite\SqliteQuery;

/**
 * Class Sqlite
 * @package Inhere\Database\Database
 */
class SqliteDriver extends PdoDriver
{
    protected $name = 'sqlite';

    protected $supportBatchSave = true;

    public function newQuery($forceNew = false)
    {
        if ($forceNew || self::$newQueryCache === null) {
            self::$newQueryCache = new SqliteQuery($this->pdo);
        }

        return self::$newQueryCache;
    }

    /**
     * Is this driver supported.
     * @return  boolean
     */
    public static function isSupported()
    {
        return \in_array('sqlite', \PDO::getAvailableDrivers());
    }

    // public function insertMulti($table, &$dataSet, $key = null)
    // {
    // }
}
