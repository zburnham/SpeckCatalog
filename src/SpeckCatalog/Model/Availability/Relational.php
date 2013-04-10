<?php

namespace SpeckCatalog\Model\Availability;

use SpeckCatalog\Model\AbstractModel;
use SpeckCatalog\Model\Availability as Base;

class Relational extends Base
{
    protected $parent;
    protected $distributor;

    /**
     * @return distributor
     */
    public function getDistributor()
    {
        return $this->distributor;
    }

    /**
     * @param $distributor
     * @return self
     */
    public function setDistributor($distributor)
    {
        $this->distributor = $distributor;
        return $this;
    }

    /**
     * @return parent
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param $parent
     * @return self
     */
    public function setParent(AbstractModel $parent)
    {
        $this->parent = $parent;

        $this->uomCode = $parent->getUomCode();
        $this->quantity = $parent->getQuantity();
        $this->productId = $parent->getProductId();

        return $this;
    }

    public function __toString()
    {
        $string = $this->has('distributor') ? $this->getDistributor()->getName(): '___' ;
        return $string;
    }
}
