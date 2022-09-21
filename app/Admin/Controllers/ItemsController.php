<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Show;
use App\Models\Item;
use App\Models\ItemType;

use Encore\Admin\Layout\Content;


class ItemsController extends AdminController{
    protected $title = 'Item';

    protected function grid(){
        $grid = new Grid(new Item());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('ItemType.title', __('Category'));
        $grid->column('price', __('Price'));
        $grid->column('stars', __('Stars'));
        $grid->column('img', __('Thumbnail Photo'))->image('', 60, 60);
        $grid->column('description', __('Description'))->style('max-width:200px');

        $grid->column('created_at', __('Created At'));
        $grid->column('updated_at', __('Updated At'));

        return $grid;
    }
}