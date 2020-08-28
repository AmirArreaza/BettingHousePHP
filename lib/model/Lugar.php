<?php

class Lugar extends BaseLugar
{
     public function __toString()
  {
    return $this->getName();
  }
}

