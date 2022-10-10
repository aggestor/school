<?php

namespace Core;

use App\Models\PromotionModel;

class PromotionProcessor extends Processor
{
    private $promotion = null;
    public function __construct()
    {
        !$this->promotion && $this->promotion = new PromotionModel;
    }
    public function getAll()
    {
        return $this->loadData($this->promotion->findAll());
    }

}
