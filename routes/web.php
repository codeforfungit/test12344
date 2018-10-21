<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Member;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;

Route::get('/', function () {
echo "no role";

    /*$user=User::where('id',1)
        ->with('role')
        ->first();*/
print_r(session('userRole'));
   // dd(Auth::user()->userHasOneRole()->toArray());


});
Route::any('carbon','FormerController@carbon')->name('carbon');

Route::any('select-role-list','FormerController@selectRoleList')->name('selectRoleList')->middleware('auth');
Route::middleware(['user.role'])->group(function () {

    Route::any('former','FormerController@contactForm')->name('former');


    Route::get('contactForm', 'ContactsController@contactForm');
    Route::post('contactForm', 'ContactsController@contactFormPost');





});

Route::get('contact', 'ContactsController@showContactForm');
Route::post('contact', 'ContactsController@contact');
Route::get('custom', 'ContactsController@custom');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('users', function(Builder $builder) {
   // DB::connection()->enableQueryLog();
    if (request()->ajax()) {

        $response= DataTables::of(Member::query())->addColumn('page_name', function ($user) {
            return '<a href="#edit-'.$user->page_name.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
        })->rawColumns(['page_name'])
            ->toJson();
    //    print_r(DB::getQueryLog());
        return $response;
        //print_r($response);
    }

    $html = $builder->minifiedAjax()->parameters([
        'drawCallback' => 'function() { }',
        'initComplete'=>'function () {
        this.api().columns().every(function () {
            var column = this;
            var input = document.createElement("input");
            $(input).appendTo($(column.footer()).empty())
            .on("change", function () {
                column.search($(this).val(), false, false, true).draw();
            });
        });
    }',
        'buttons' => ['export'],
      /*  'initComplete'=>'function(){
       
        }',*/
     //   'paging' => true,
      //  'searching' => true,
       // 'info' => false,
        //'searchDelay' => 350,
        'dom'=> 'Bfrtip',
      //  'orderable' => true,
      //  "pageLength"=> 2,
       // 'button'=> ['colvis'],
     //   'dom'          => 'Bfrtip',
        'lengthMenu' => [5,10,15],
        "columnDefs"=> [
    ' {
                "targets": [ 2 ],
                "visible": false,
                "searchable": false
            },{ "searchable"=> false,
    "targets"=>0
    ]}'
  ],
        'buttons'      => ['copy', 'csv', 'excel', 'pdf', 'print',],
    ])
        ->columns([
        ['data' => 'id', 'name' => 'id', 'title' => 'id','visible' => true],
      /*  ['data' => 'page_name', 'name' => 'page_name', 'title' => 'page_name',  'searchable' => true,
            'orderable' => true],*/
            ['data' => 'page_name', 'name' => 'page_name', 'title' => 'page_name',],

        ['data' => 'page_url', 'name' => 'page_url', 'title' => 'page_url','searchable' => false,],
        ['data' => 'created_at', 'name' => 'created_at', 'title' => 'Created At'],
        ['data' => 'updated_at', 'name' => 'updated_at', 'title' => 'Updated At'],
            ]);

    return view('index', compact('html'));
});

Route::get('userdata',function (){
    $response= DataTables::of(Member::query())->toJson();
    return $response;
    if (request()->ajax()) {


        //print_r($response);
    }
});

Route::get('user', function(Datatables $dataTable) {
    $builder = $dataTable->getHtmlBuilder();
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
