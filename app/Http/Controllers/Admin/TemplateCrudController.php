<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TemplateRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class TemplateCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class TemplateCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Template::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/template');
        CRUD::setEntityNameStrings('template', 'templates');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('id');
        CRUD::column('title');
        CRUD::addColumn([
            'name'      => 'thumbnail', // The db column name
            'label'     => 'Thumbnail', // Table column heading
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
        CRUD::setValidation(TemplateRequest::class);

        CRUD::field('title');
        CRUD::field('description');

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
        CRUD::setValidation(TemplateRequest::class);

        CRUD::field('title');
        CRUD::field('description');
        CRUD::addField([  // Select
            'label'     => "Thumbnail Element",
            'type'      => 'select',
            'name'      => 'template_element_id', // the db column for the foreign key
         
            // optional 
            // 'entity' should point to the method that defines the relationship in your Model
            // defining entity will make Backpack guess 'model' and 'attribute'
            'entity'    => 'thumbnail_element', 
         
            // optional - manually specify the related model and attribute
            'model'     => "App\Models\TemplateElement", // related model
            'attribute' => 'title', // foreign key attribute that is shown to user
         
            // optional - force the related options to be a custom query, instead of all();
            'options'   => (function ($query) {
                 return $query->where('template_id', $this->crud->entry->id)->get();
             }), //  you can use this to filter the results show in the select
         ],);
        //  CRUD::addField([  // Select
        //     'label'     => "Elements",
        //     'type'      => 'select2_multiple',
        //     'name'      => 'templated_element_id', // the db column for the foreign key
         
        //     // optional 
        //     // 'entity' should point to the method that defines the relationship in your Model
        //     // defining entity will make Backpack guess 'model' and 'attribute'
        //     'entity'    => 'elements', 
         
        //     // optional - manually specify the related model and attribute
        //     'model'     => "App\Models\TemplateElement", // related model
        //     'attribute' => 'title', // foreign key attribute that is shown to user

        //     'pivot' =>false,
         
        //     // optional - force the related options to be a custom query, instead of all();
        //     'options'   => (function ($query) {
        //          return $query->where('template_id', $this->crud->entry->id)->orWhere('template_id', null)->get();
        //      }), //  you can use this to filter the results show in the select
        //  ],);
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
            'name'     => 'template_element_id',
            'label'    => 'Thumbnail',
            'type'     => 'closure',
            'function' => function($entry) {
                if($entry->thumbnail_element) 
                    return '<a href="'.url('/admin/template-element/'.$entry->thumbnail_element->id.'/show').'"><img src="'.($entry->thumbnail).'"></a>';
                else
                    return '<span>Default Thumbnail</span>';
            }
        ]);
        CRUD::column('elements')->type('select_multiple');
        CRUD::column('created_at');
        CRUD::column('updated_at');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }
}
