<?php

namespace StatusBoard\Widget;

/**
 * Class TableWidget
 */
class TableWidget implements WidgetInterface
{
    private $columns;
    private $rows;

    public function __construct()
    {
        $this->columns = array();
        $this->rows = array();
    }

    /**
     * Add a column
     *
     * @param string $column The name of the column
     *
     * @return TableWidget
     */
    public function addColumn($column)
    {
        $this->columns[] = $column;

        return $this;
    }

    /**
     * Remove a column
     *
     * @param string $column The name of the column
     *
     * @return TableWidget
     */
    public function removeColumn($column)
    {
        if (($key = array_search($column, $this->columns)) !== false) {
            unset($this->columns[$key]);

            // Reset array keys
            $this->columns = array_values($this->columns);
        }

        return $this;
    }

    /**
     * Set all columns
     *
     * @param array $columns A list of columns
     *
     * @return TableWidget
     */
    public function setColumns($columns)
    {
        $this->columns = $columns;

        return $this;
    }

    /**
     * @return array
     */
    public function getColumns()
    {
        return $this->columns;
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
