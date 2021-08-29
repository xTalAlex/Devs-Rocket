<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class UserCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
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
        CRUD::setModel(\App\Models\User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user');
        CRUD::setEntityNameStrings('user', 'users');
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
        CRUD::column('email');
        CRUD::addColumn([
            'name'      => 'avatar', // The db column name
            'label'     => 'Avatar', // Table column heading
            'type'      => 'image',
            'height' => '48px',
            'width'  => '48px',
            'radius' => '9999px',
        ]);
        CRUD::addColumn([
            'name'  => 'role.description',
            'label' => 'Role',
            'type'  => 'text'
        ],);
        CRUD::column('full_name');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the show operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupShowOperation()
    {
        CRUD::column('id');
        CRUD::addColumn([
            'name'      => 'avatar', // The db column name
            'label'     => 'Avatar', // Table column heading
            'type'      => 'image',
            'height' => '144px',
            'width'  => '144px',
            'radius' => '9999px',
        ]);
        CRUD::column('name');
        CRUD::column('last_name');
        CRUD::column('email');
        CRUD::column('email_verified_at');
        CRUD::column('last_seen');
        CRUD::addColumn([
            'name'  => 'role.description',
            'label' => 'Role',
            'type'  => 'text'
        ],);
        CRUD::column('biography');
        CRUD::column('created_at');
        CRUD::column('updated_at');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
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
        CRUD::setValidation(UserRequest::class);

        CRUD::addField([   // relationship
            'label'     => "Role",
            'type'      => 'select',
            'name'      => 'role_id',
         ],);
    }
}
