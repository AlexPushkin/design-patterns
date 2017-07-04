<?php

interface ComputerPart
{
    public function accept(ComputerPartVisitor $visitor): string;
}

class ComputerMouse implements ComputerPart
{
    public function accept(ComputerPartVisitor $visitor): string
    {
        return $visitor->visitMouse($this);
    }
}

class ComputerMonitor implements ComputerPart
{
    public function accept(ComputerPartVisitor $visitor): string
    {
        return $visitor->visitMonitor($this);
    }
}

interface ComputerPartVisitor
{
    public function visitMouse(ComputerMouse $mouse): string;
    public function visitMonitor(ComputerMonitor $mouse): string;
}

class ComputerPlugVisitor implements ComputerPartVisitor
{

    public function visitMouse(ComputerMouse $mouse): string
    {
        return "Mouse plugged.\n";
    }

    public function visitMonitor(ComputerMonitor $mouse): string
    {
        return "Monitor plugged.\n";
    }
}

class ComputerCheckVisitor implements ComputerPartVisitor
{
    private $_partsChecked = 0;

    public function visitMouse(ComputerMouse $mouse): string
    {
        $this->_partsChecked++;
        return "Mouse is working.\n";
    }

    public function visitMonitor(ComputerMonitor $mouse): string
    {
        $this->_partsChecked++;
        return "Monitor is working.\n";
    }

    public function getPartsCheckedNumber(): int
    {
        return $this->_partsChecked;
    }
}


$mouse = new ComputerMouse();
$monitor = new ComputerMonitor();

$pluger = new ComputerPlugVisitor();
echo $mouse->accept($pluger);
echo $monitor->accept($pluger);

$checker = new ComputerCheckVisitor();
echo $checker->getPartsCheckedNumber();
echo "\n";
echo $mouse->accept($checker);
echo $checker->getPartsCheckedNumber();
echo "\n";
echo $monitor->accept($checker);
echo $checker->getPartsCheckedNumber();
echo "\n";

