<?php

class BasicInspection
{
    public function getCost()
    {
        return 19;
    }
}

class BasicInspectionAndOilChange
{
    public function getCost()
    {
        return 19 + 19;
    }
}

class BasicInspectionAndOilChangeTireRotation
{
    public function getCost()
    {
        return 19 + 19 + 10;
    }
}

echo (new BasicInspectionAndOilChangeTireRotation())->getCost();

