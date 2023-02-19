<?php

namespace App\Admin\Controllers;

use App\Models\ContactForm;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ContactFormController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'ContactForm';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ContactForm());

        $grid->column('id', __('Id'));
        $grid->column('subject', __('Subject'));
        $grid->column('email', __('Email'));
        $grid->column('description', __('Description'));
        $grid->column('document', __('Document'))->display(function ($document) {
            if ($document) {
                $url = asset('documents/' . $document);
                return "<a href='$url'>$document</a>";
            } else {
                return '';
            }
        });
        $grid->column('created_at', __('Created at'))->display(function ($value) {
            return date('d/m/Y H:i', strtotime($value));
        });
       

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(ContactForm::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('subject', __('Subject'));
        $show->field('email', __('Email'));
        $show->field('description', __('Description'));
        $show->field('document', __('Document'))->unescape()->as(function ($document) {
            if ($document) {
                $url = asset('documents/' . $document);
                return "<a href='$url'>$document</a>";
            } else {
                return '';
            }
        });
        $show->field('created_at', __('Created at'))->as(function ($createdAt) {
            return date('d/m/Y H:i', strtotime($createdAt));
        });
       

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new ContactForm());

        $form->text('subject', __('Subject'));
        $form->email('email', __('Email'));
        $form->textarea('description', __('Description'));
        $form->text('document', __('Document'));

        return $form;
    }
}
