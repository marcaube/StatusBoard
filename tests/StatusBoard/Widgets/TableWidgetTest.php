<?php

use StatusBoard\Widget\TableWidget;

class TableWidgetTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Testing the table rows
     */
    public function testRows()
    {
        $table = new TableWidget();

        // Add one row
        $row = array('cell1', 'cell2', 'cell3');
        $table->addRow($row);
        $this->assertEquals($table->getRows(), array($row));

        // Set multiple rows
        $rows = array(
            $row,
            $row,
            $row
        );
        $table->setRows($rows);
        $this->assertEquals($table->getRows(), $rows);

        // Add HTML row
        $row = array("<p>Html paragraph</p>");
        $table->setRows(array($row));
        $this->assertEquals($table->getRows(), array($row));
    }

    /**
     * Testing the table columns
     */
    public function testColumns()
    {
        $table = new TableWidget();

        // Add one column
        $column = "column";
        $table->addColumn($column);
        $this->assertEquals($table->getColumns(), array($column));

        // Set multiple columns
        $columns = array(
            "column1",
            "column2",
            "column3"
        );
        $table->setColumns($columns);
        $this->assertEquals($table->getColumns(), $columns);

        // Remove a column
        $table->removeColumn("column2");
        $this->assertEquals($table->getColumns(), array("column1", "column3"));

        // Add HTML column
        $column = array("<h2>Html heading</h2>");
        $table->setColumns(array($column));
        $this->assertEquals($table->getColumns(), array($column));
    }
}
