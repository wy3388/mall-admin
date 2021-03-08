<?php


namespace app\api\controller;


use app\BaseController;

class IndexController extends BaseController
{
    public function index(): string
    {
        return "api";
    }
}