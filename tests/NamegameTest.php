<?php
/**
 * Name game tests
 *
 * @package NamegameTests
 */

/**
 * NamegameTest
 *
 * @uses PHPUnit_Framework_TestCase
 * @package NamegameTests
 * @author Jansen Price <jansen.price@gmail.com>
 */
class NamegameTest extends PHPUnit_Framework_TestCase
{
    /**
     * Set Up
     *
     * @return void
     */
    public function setUp()
    {
        $this->object = new Namegame\Namegame();
    }

    /**
     * Test the names
     *
     * @dataProvider nameProvider
     * @return void
     */
    public function testNames($name, $expected)
    {
        $actual = $this->object->play($name);

        $this->assertEquals($expected, $actual);
    }

    /**
     * Provider for the list of names and expected results
     *
     * The list of names comes from https://www.ssa.gov/oact/babynames/decades/century.html
     *
     * @return array Data values to provide
     */
    public function nameProvider()
    {
        $data = [];
        $file = file(__DIR__ . "/names.tab");

        foreach ($file as $line) {
            $data[] = explode("\t", trim($line));
        }

        return $data;
    }
}
