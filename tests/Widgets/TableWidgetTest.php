<?php

namespace StatusBoard\Tests\Widgets;

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
}
