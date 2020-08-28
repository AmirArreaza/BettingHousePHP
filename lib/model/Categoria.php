<?php

class Categoria extends BaseCategoria
{
    public function __toString()
  {
    return $this->getName();
  }

}
