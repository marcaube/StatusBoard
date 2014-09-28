<?php

namespace StatusBoard\Widget;

/**
 * Class TableWidget
 */
class TableWidget implements WidgetInterface
{
    private $rows;

    public function __construct()
    {
        $this->rows = array();
    }

    /**
     * Add a row
     *
     * @param array $row Row data
     *
     * @return TableWidget
     */
    public function addRow($row)
    {
        $this->rows[] = $row;

        return $this;
    }

    /**
     * Set all rows
     *
     * @param array $rows A list of rows
     *
     * @return TableWidget
     */
    public function setRows($rows)
    {
        $this->rows = $rows;

        return $this;
    }

    /**
     * @return array
     */
    public function getRows()
    {
        return $this->rows;
    }
}
