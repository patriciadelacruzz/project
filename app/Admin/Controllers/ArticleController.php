<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ArticleController extends AdminController
{
    protected $title = 'Article';

    protected function grid()
    {
        $grid = new Grid(new Article());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('content', __('Content'));
        $grid->column('created_at', __('Created At'));
        $grid->column('updated_at', __('Updated At'));

        return $grid;
    }

    protected function detail($id){
        $show = new Show (Article::findOrFail($id));

        $show->column('id', __('Id'));
        $show->column('title', __('Title'));
        $show->column('content', __('Content'));
        $show->column('created_at', __('Created At'));
        $show->column('updated_at', __('Updated At'));

        return $show;
    }

    protected function form(){
        $form = new Form(new Article());

        
        $form->text('title', __('Title'));
        $form->text('content', __('Content'));

        return $form;
    }
}