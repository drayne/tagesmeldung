<?php
/**
 * Created by PhpStorm.
 * User: vedran.bojicic
 * Date: 01.10.2018
 * Time: 14:05 PM
 */

namespace App\Overriders;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Schema\AbstractSchemaManager;
use Doctrine\DBAL\Schema\OracleSchemaManager;

class OracleSchemaManagerOverride extends OracleSchemaManager
{

    protected $oracleSchemaManager;
    protected $conn;


    public function listViewNames()
    {
        $sql = $this->_platform->getListViewsSQL($this->_platform);
        $tables = $this->_conn->fetchAll($sql);
        $tableNames = $this->_getPortableViewsList($tables);
        foreach ($tableNames as $key => $value) {
            $viewNames[] = $key;
        }
        return $viewNames;

    }

    public function viewsExist($viewNames)
    {
        $tableNames = array_map('strtolower', (array) $viewNames);

        return count($tableNames) == count(\array_intersect($tableNames, array_map('strtolower', $this->listViewNames())));
    }


}