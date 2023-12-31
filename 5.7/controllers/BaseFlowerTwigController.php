<?php

class BaseFlowerTwigController extends TwigBaseController
{
    public function getContext(): array
    {
        $context = parent::getContext();

        $query = $this -> pdo->query("SELECT DISTINCT type FROM flower_objects ORDER BY 1");
        $types = $query->fetchAll();
        $context['types'] = $types;

        $show = $query->fetchAll();
        $context['show'] = $show;

        return $context;
    }

}