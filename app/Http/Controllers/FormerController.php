<?php

namespace App\Http\Controllers;




use App\User;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Http\Request;
use Form;
use Illuminate\Support\Facades\Auth;
use Validator;

class FormerController extends Controller
{
    public function index(){
       $html='';
        $html.= Form::open();
        $html.= Form::text('name', 'User name');
        $html.=Form::textarea('description', 'Description');
        $html.=Form::select('city', 'Choose your city', [1 => 'Gotham City', 2 => 'Springfield']);
        $html.=Form::checkbox('orange', 'Orange');
        $html.=Form::radio('orange', 'Orange');
        $html.=Form::range('name', 'User name');
        $html.=Form::hidden('user_id');
        $html.=Form::anchor("Link via parameter", 'foo/bar');
        $html.=Form::submit("Send form");
        $html.=Form::button("Do something", "warning", "lg");
        $html.=Form::reset("Clear form");
        $html.=Form::anchor("Link via url")->url('foo/bar');
        $html.=Form::checkbox('agree', 'I agree')->checked();
        $html.=Form::radio('orange', 'Orange')->inline();
        $html.=Form::checkbox('orange', 'Orange')->inline();
        $html.=Form::text('name', 'Name')->placeholder('Input placeholder');
        $html.=Form::select('city', 'Choose your city', [1 => 'Gotham City', 2 => 'Springfield'])->multiple();
        $html.=Form::open()->locale('forms.user');
        $html.=Form::text('name', 'Name')->help('Help text here');
        $html.=Form::text('name', 'Name')->attrs(['data-foo' => 'bar', 'rel'=> 'baz']);
        $html.=Form::text('name', 'Name')->readonly();
        $html.=Form::text('name', 'Name')->readonly(false);
        $html.=Form::text('name', 'Name')->disabled();
        $html.=Form::fieldsetOpen('User data')->disabled();
        $html.=Form::text('name', 'Name')->disabled(false);
        $html.=Form::text('name', 'Name')->block();
        $html.=Form::text('name', 'Name')->block(false);
        $html.=Form::text('name', 'Name')->required();
        $html.=Form::fieldsetOpen('User data')->required();
        $html.=Form::text('name', 'Name')->required(false);
        $html.=Form::text('name', 'Name')->id('user-name');
        $html.=Form::open()->idPrefix('register');
        $html.=Form::button("Do something")->color("primary");
        $html.=Form::button("Button label")->warning();
        $html.=Form::button("Do something")->size("sm");
        $html.=Form::button("Do something")->size("lg");
        $html.=Form::text('age', 'Your age')->type('number');
        $html.=Form::text('age')->label('Your age');
        $html.=Form::text('name', 'Your name')->value('Maria');
        $html.=Form::render('text')->name('age')->label('Your age');

        $html.= Form::close();
        return view('former',['html'=>$html]);

    }

    public function contactForm(Request $request){

        if($request->post()){
            $validator = Validator::make($request->all(),[
                'name' => 'required|max:255|min:5',
                'description' => 'required',
                'agree_terms_1'=>'required',
                'city' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect('former')
                    ->withErrors($validator)
                    ->withInput();
            }

            /*if ($validator->fails()) {
                return response()->json(['errors'=>$validator->errors()]);
            }*/
        }
        //$user=['city'=>'2','description'=>'asfafas','name'=>'Jhm'];
        $user=[];
        $html='';
        $html.=bs()->openForm('post', route('former'),[]);

        $html.= bs()->text('name')->placeholder('Username');
        $html.= bs()->textArea('description')->placeholder('description');
        $html.=bs()->formGroup()
            ->label('Country')
            ->control(bs()->select('city', ['' => 'France', 'S' => 'Sweden', 'P' => 'Portugal'],'') );
        $html.= bs()->radioGroup('agree_terms_1', [
            'y' => 'I am interested!',
            'n' => 'No, thanks.',
        ], '');
        $html.=bs()->formGroup()
            ->label('This is the label of the control')
            ->control(bs()->text('first_name')->placeholder('I am the form group control'))
            ->helpText('This is the help text of the form group');
        $html.=bs()->submit('Login');
        $html=
        $html.=bs()->closeForm();
        /*$html.=Form::inlineForm()->method('post')->route('former')->fill($user);

        $html.=Form::text('name', 'User name');
        $html.=Form::textarea('description', 'Description');
        $html.=Form::select('city', 'Choose your city', [5=>'---Select--','' => 'qrqw',1 => 'Gotham City', 2 => 'Springfield']);
        $html.=Form::submit('Awesome button')->id('my-btn')->danger()->lg();
        $html.=Form::close();*/

        return view('former',['html'=>$html]);
    }


    public function selectRoleList(Request $request,User $user){

        if(!Auth::user()->isUserHasMultipleRole()){

            abort(403, 'Unauthorized action.');
        }

        if($request->post()){

            $userRole=$user->authUser()->checkRole($request->role_id);
            if($userRole){
                $user->setRoleInSession($request->role_id);
                return redirect('former');
            }
            return redirect('select-role-list');
        }

        return view('select_role_list',['roles'=>Auth::user()->getRoles()]);
    }


    public function carbon(){


        //dd(Carbon::now()->format('M-Y'));
        $additionalAddressList=[
            [
                'from_date'=>'15/1/2018',
                'to_date'=>'10/3/2018',
            ],
            [
                'from_date'=>'10/1/2013',
                'to_date'=>'10/6/2013',
            ],
            [
                'from_date'=>'10/1/2017',
                'to_date'=>'10/5/2018',
            ], [
                'from_date'=>'1/10/2013',
                'to_date'=>'1/12/2013',
                ], [
                'from_date'=>'1/10/2013',
                'to_date'=>'1/12/2014',
            ]
        ];

        $this->printMe($additionalAddressList);

        $sorted = collect($additionalAddressList);

        $sorted->transform(function ($item, $key) {
            //$a='from_date';
            if(isset($item['from_date'])){
                $item['from_date']= Carbon::createFromFormat('d/m/Y', $item['from_date']);
            }
            if(isset($item['from_date'])){
                $item['to_date']= Carbon::createFromFormat('d/m/Y', $item['to_date']);
            }
            //$this->printMe($item[$a]);
            return $item;
        });
        $sorted=$sorted->sortBy('from_date');
        $this->printMeArray($sorted);


        $endDate=Carbon::now();
        $this->printMe($endDate->toDateString());
        $lastDate=$endDate->copy()->subYear(5)->format('Y-m');
        $this->printMe($lastDate);
        $totaldiff=$endDate->diffInMonths($endDate);

        $this->printMe($totaldiff);
        $total=0;
        echo "<br>----------------LOOP STARTS-------------------------------<br>";
        $newArray=[];
        foreach ($sorted as $key=>$value){

           // dd($value);
           $fromDate=$value['from_date'];   //Carbon::createFromFormat('d/m/Y', $value['from_date']);
            $toDate=$value['to_date'];  //Carbon::createFromFormat('d/m/Y', $value['to_date']);

           // echo "From date===".$fromDate."===To date===".$toDate."===Last Date===".$lastDate.'<br><br>';


echo "<br>-----------------------------------------------<br>";
            $start    = (new DateTime($fromDate))->modify('first day of this month');
            $end      = (new DateTime($toDate))->modify('first day of next month');
            $interval = DateInterval::createFromDateString('1 month');
            $period   = new DatePeriod($start, $interval, $end);
            $i=0;
            foreach ($period as $dt) {
                if($lastDate<=$dt->format("Y-m")){
                    array_push($newArray,$dt->format("Y-m"));
                    echo $dt->format("Y-m") . "<br>\n";
                    $i++;
                }




            }
            echo "Total Months=".$i."<br>";
        /*    if($fromDate<$lastDate){
                if($toDate<$lastDate){
                    //nothing to do
                }
                if($toDate>$lastDate){

                    $total+=$this->diffDate($toDate,$lastDate); //$toDate->diffInMonths($lastDate)+1;

                    $lastDate=$toDate;

                }
            }

            if($fromDate>=$lastDate){
                if($toDate>=$lastDate){
                    $total+=$this->diffDate($toDate,$fromDate);             //$toDate->diffInMonths($fromDate)+1;
                    $lastDate=$toDate;
                }

            }
            echo "<br>===".$total."<br>";*/

        }

        sort($newArray);
dd(array_values(array_unique($newArray)));







    }

    public function diffDate($fromDate,$toDate){
        $ts1 = strtotime($fromDate);
        $ts2 = strtotime($toDate);

        $year1 = date('Y', $ts1);
        $year2 = date('Y', $ts2);
        echo "<br>Year".$year1."=".$year2."<br>";

        $month1 = date('m', $ts1);
        $month2 = date('m', $ts2);
        echo "<br>Month".$month1."=".$month2."<br>";
        $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
        return $diff;
    }

public  function diffdat($date1, $date2){
    $begin = new DateTime( $date1 );
    $end = new DateTime( $date2 );
    $end = $end->modify( '+1 month' );

    $interval = DateInterval::createFromDateString('1 month');

    $period = new DatePeriod($begin, $interval, $end);
    $counter = 0;
    foreach($period as $dt) {
        $counter++;
    }

}
public function diff1($d1,$d2){
    $date1 = new DateTime($d1);
    $date2 = new DateTime($d2);

    return  $date2->format('n') - $date1->format('n') + 1;
}
    public function printMe($value){
        echo "<pre>";
        print_r($value);
        echo "<pre>";
    }
    public function printMeArray($value){
        echo "<pre>";
        print_r($value->toArray());
        echo "<pre>";
    }

}















/*Former::framework('TwitterBootstrap3');

       Former::horizontal_open()
           ->id('MyForm')
           ->rules(['name' => 'required'])
           ->method('GET');

       Former::xlarge_text('name') # Bootstrap sizing
       ->class('myclass') # arbitrary attribute support
       ->label('Full name')
           ->value('Joseph')
           ->required() # HTML5 validation
           ->help('Please enter your full name');

       Former::textarea('comments')
           ->rows(10)
           ->columns(20)
           ->autofocus();

       Former::actions()
           ->large_primary_submit('Submit') # Combine Bootstrap directives like "lg and btn-primary"
           ->large_inverse_reset('Reset');

       Former::close();*/