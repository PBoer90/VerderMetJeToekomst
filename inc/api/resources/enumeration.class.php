<?php

abstract class Api_Resource_Enumeration_Base
{
    abstract public function setEducations($educations);
    abstract public function hasEducations();
    abstract public function getEducations();

    abstract public function setBranches($branches);
    abstract public function hasBranches();
    abstract public function getBranches();
}