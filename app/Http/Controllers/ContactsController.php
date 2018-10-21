<?php

namespace App\Http\Controllers;

use App\Column;
use App\DataTables\UsersDataTable;
use App\Member;
use App\Report;
use App\ReportColumn;
use App\ViewReport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Validator;
use JohnLobo\CustomValidator\CustomRule;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;

class ContactsController extends Controller
{
    public function showContactForm(DataTables $dataTables,Builder $builder,UsersDataTable $usersDataTable)
    {

       // $response=Member::get();
      //  echo "<pre>";
     //  print_r($response->toArray());

        // $builder = $dataTables->getHtmlBuilder();
       // $builder = app('datatables.html');
        return $usersDataTable->render('users');
      //  print_r($builder);
       // return view('contact');
        $html = $builder->columns([
            ['data' => 'id', 'name' => 'id', 'title' => 'Id'],
            ['data' => 'name', 'name' => 'name', 'title' => 'Name'],
            ['data' => 'email', 'name' => 'email', 'title' => 'Email'],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => 'Created At'],
            ['data' => 'updated_at', 'name' => 'updated_at', 'title' => 'Updated At'],
        ]);


    return view('index', compact('html'));
    }


    public function contact(Request $request)
    {
        $rules = [
            'name' =>['required',new CustomRule()],
            'email' => 'phone_number',
            'message' => 'required|min:5|in_phone',
        ];

        $this->validate($request, $rules);

        // send contact details to email address

        return back()->with("status", "Your message has been received, We'll get back to you shortly.");
    }


    public function custom(Builder $builder,Request $request){


        //$query=ViewReport::query();
        //$query->wh
      /*  $builder->columns([
            'id' => ['footer' => 'footer content']
        ]);*/

        if (request()->ajax()) {
            $column=json_decode($request->custom);
           // try {
//https://datatables.yajrabox.com/fluent/carbon
//https://datatables.yajrabox.com/fluent/carbon

                $result=ViewReport::query();
                $response = DataTables::make($result)    /*->filter(function ($query) use ($request) {
                    if ($request->has('name')) {
                        $query->where('name', 'like', "%{$request->get('name')}%");
                    }

                    if ($request->has('email')) {
                        $query->where('email', 'like', "%{$request->get('email')}%");
                    }
                })*/;

                $raw=[];
                 foreach ($column as $key=>$value){

                     if($value=='link'){
                         $raw[]=$key;
                         $response->addColumn($key, function ($user)use($key) {
                             return '<a href="#edit-' . $user->$key . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                             });
                     }
                     if($value=='date'){
                         $response->addColumn($key, function ($user)use($key) {
                             return Carbon::parse($user->$key)->format('d/m/Y');
                         });
                         $response->filterColumn($key, function ($query, $keyword)use($key) {

                            // $keyword= Carbon::createFromFormat('d/m/Y', $keyword);
                            // print_r($keyword);
                          //  $query->where($key,'like',"%{$keyword}%");
                             //Carbon::createFromFormat('d/m/Y', $value)
                             $query->whereRaw("DATE_FORMAT($key,'%d/%m/%Y') like ?", ["%$keyword%"]);
                         });
                     }

                 }
                $response->rawColumns($raw);

                    $final=$response->toJson();

                    return $final;
           // } catch (\Exception $e) {
           // }
        }

        $response=Report::with('column')->first();
        $news=collect();
        $sendAjax=collect();
        $response->column->map(function ($post)use($news,$sendAjax) {

             $sendAjax[$post->column_name]=$post->column_type;
             $news[]=['data' => $post->column_name,'name' => $post->column_name, 'title' =>$post->pivot->column_alias??$post->column_name ];

            return true;
        });

       // print_r($news->toArray());

        $html = $builder->parameters([
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
            'paging' => true,
            'searching' => true,
            'info' => true,
            //'searchDelay' => 350,
            //  'dom'=> 'Bfrtip',
            'orderable' => true,
            // 'button'=> ['colvis'],
            'dom'          => 'Bfrtip',
            'buttons'      => ['copy', 'csv', 'excel', 'pdf', 'print',],
        ])->columns($news->toArray())->ajax([
            'url' => url('custom'),
            'type' => 'GET',
            'data' => 'function(d) { d.key = "value"; d.custom = $("#custom_value").val(); }',
        ]);

        return view('custom',['html'=>$html,'customValue'=>$sendAjax] );
    }


    public function contactFormPost(Request $request)
    {
     /* echo "<pre>";
      print_r($request->all());*/
        $validationRule=[
            'component1'=>[
                'username'=>'required',
                'password'=>'required',
            ],
            'component2'=>[
                'gender'=>'required',
                'country'=>'required',
                'jon'=>'required'
            ],
            'component3'=>[
                'address'=>'required',
                'idcheck'=>'required',
            ],
            'component4'=>[
                'username'=>'required',
                'password'=>'required',
            ],
        ];
        $validator = Validator::make($request->all(), $validationRule[$request->component]);
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }
    }
    public function contactForm(Request $request)
    {
       return view('form');
    }

    public function api(Request $request){
        $skip=(5*($request->page-1));
        $response=Member::where('customer_name','like',"%{$request->search}%")->offset($skip)->limit(5)->get();
        if($response->count()==0){
            $data['results']=[];
            $data['pagination']=['more'=>false];
            return $data;
        }
        $newArray=[];
        foreach ($response as $key=>$value){

            $newArray[]=['id'=>$value->id,'text'=>$value->customer_name];
        }
        $data['results']=$newArray;
        $data['pagination']=['more'=>true];
        return $data;
    }
}



