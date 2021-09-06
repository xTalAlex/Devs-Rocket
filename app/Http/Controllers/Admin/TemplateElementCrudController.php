<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TemplateElementRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class TemplateElementCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class TemplateElementCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\TemplateElement::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/template-element');
        CRUD::setEntityNameStrings('template element', 'template elements');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $template_titles=\App\Models\Template::all()->pluck('title','id');
        $options=array( 0 => 'None' );
        foreach($template_titles as $id=>$title){
            array_push($options,$title);
        }
        CRUD::addFilter([
            'name'  => 'template',
            'type'  => 'dropdown',
            'label' => 'Template'
          ], 
          $options,
          function($value) { // if the filter is active
            if($value==0)
                $this->crud->addClause('where','template_id', null);
            else
                $this->crud->addClause('where', 'template_id', $value);
        });

        CRUD::column('id');
        CRUD::column('title');
        CRUD::column('template')->attribute('title');
        CRUD::addColumn([
            'name'      => 'image', // The db column name
            'label'     => 'Image', // Table column heading
            'type'      => 'image',
            'height' => '48px',
            'width'  => '48px',
        ]);

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(TemplateElementRequest::class);

        CRUD::field('title');
        CRUD::field('description');
        CRUD::field('template_id')->type('select');
        CRUD::addField([
            'label' => "Image",
            'name' => "image",
            'type' => 'image',
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 0, // omit or set to 0 to allow any aspect ratio
            // 'disk'      => 's3_bucket', // in case you need to show images from a different disk
            // 'prefix'    => 'uploads/images/profile_pictures/' // in case your db value is only the file name (no path), you can use this to prepend your path to the image src (in HTML), before it's shown to the user;
        ]);
        

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    /**
     * Define what happens when the Show operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupShowOperation()
    {
        CRUD::column('id');
        CRUD::column('title');
        CRUD::column('description');
        CRUD::addColumn([
            'name'     => 'template',
            'label'    => 'Template',
            'type'     => 'closure',
            'function' => function($entry) {
                if($entry->template)
                    return '<a href="/admin/template/'.$entry->template->id.'/show">'.$entry->template->title.'</a>';
                else
                    return '<span>-</span>';
            }
        ]);
        CRUD::addColumn([
            'name'     => 'image',
            'label'    => 'Image',
            'type'     => 'closure',
            'function' => function($entry) {
                if($entry->image)
                    return '<img src="'.($entry->image).'">';
                else
                    return '<span>-</span>';
            }
        ]);
        CRUD::column('created_at');
        CRUD::column('updated_at');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }
}
