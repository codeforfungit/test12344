@extends('layouts.app')


@section('content')
<style>
    .error{
        color: red;
    }
</style>
    <div class="row">
        <form method="POST" enctype="multipart/form-data" action="{{url('contactForm')}}">
            @csrf
        <div class="col-12">
            <div class="d-flex flex-row mt-2">
                <ul class="nav nav-tabs nav-tabs--vertical nav-tabs--left" role="navigation">
                    <li class="nav-item">
                        <a href="#lorem" class="nav-link active"  data-component="component1" data-toggle="tab" role="tab" aria-controls="lorem">Lorem</a>
                    </li>
                    <li class="nav-item">
                        <a href="#ipsum" class="nav-link" data-component="component2" data-toggle="tab" role="tab" aria-controls="ipsum">Ipsum</a>
                    </li>
                    <li class="nav-item">
                        <a href="#dolor" class="nav-link " data-component="component3" data-toggle="tab" role="tab" aria-controls="dolor">Dolor</a>
                    </li>
                    <li class="nav-item">
                        <a href="#sit-amet" class="nav-link" data-component="component4" data-toggle="tab" role="tab" aria-controls="sit-amet">Sit Amet</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="lorem" role="tabpanel">
                        <h1>Lorem</h1>

                        <p>Aenean sed lacus id mi scelerisque tristique. Nunc sed ex sed turpis fringilla aliquet in in neque. Praesent posuere, neque rhoncus sollicitudin fermentum, erat ligula volutpat dui, nec dapibus ligula lorem ac mauris. Etiam et leo venenatis purus pharetra dictum.</p>

                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin tempor mi ut risus laoreet molestie. Duis augue risus, fringilla et nibh ac, convallis cursus purus. Suspendisse potenti. Praesent pretium eros eleifend posuere facilisis. Proin ut magna vitae nulla suscipit eleifend. Ut bibendum pulvinar sapien, vel tristique felis scelerisque et. Sed elementum sapien magna, placerat interdum lacus placerat ut. Integer varius, ligula bibendum laoreet sollicitudin, eros metus fringilla lectus, quis consequat nisl nibh ut nisi. Aenean dignissim, nibh ac fermentum condimentum, ante nisl rutrum sapien, at commodo eros sapien vulputate arcu. Fusce neque leo, blandit nec lectus eu, vestibulum commodo tellus. Aliquam sem libero, tristique at condimentum ac, luctus nec nulla.</p>

                        <div class="form-group">
                            <label for="email">Username</label>
                            <input type="text" class="form-control" id="username" name="username">
                            <span class="error error_username" ></span>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" name="password" class="form-control" id="password">
                            <span class="error error_password" ></span>
                        </div>


                    </div>
                    <div class="tab-pane fade" id="ipsum" role="tabpanel">
                        <h1>Ipsum</h1>

                        <p>Aenean pharetra risus quis placerat euismod. Praesent mattis lorem eget massa euismod sollicitudin. Donec porta nulla ut blandit vehicula. Mauris sagittis lorem nec mauris placerat, et molestie elit vehicula. Donec libero ex, condimentum et mi dapibus, euismod ornare ligula.</p>

                        <p>In faucibus tempus ante, et tempor magna luctus id. Ut a maximus ipsum. Duis eu velit nec libero pretium pellentesque. Maecenas auctor hendrerit pulvinar. Donec sed tortor interdum, sodales elit vel, tempor turpis. In tristique vestibulum eros vel congue. Vivamus maximus posuere fringilla. Nullam in est commodo, tristique ligula eu, tincidunt enim. Duis iaculis sodales lectus vitae cursus.</p>
                        <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" value="male">Male
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" value="female">Female
                            </label>
                        </div>
                        <span class="error error_gender" ></span>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="jon" value="crick">crick
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="jon" value="mad">mad
                                </label>
                            </div>
                            <span class="error error_jon" ></span>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="dolor" role="tabpanel">
                        <h1>Dolor</h1>

                        <p>Ut eget lectus tristique, tempus purus sit amet, porta augue. Mauris lobortis sem nec augue ultricies blandit. Nullam sed sem venenatis, pretium urna eget, scelerisque dolor. Morbi nec volutpat leo, quis faucibus tortor. Aenean vel rutrum mauris. Pellentesque lectus massa, tincidunt quis leo non, sodales sagittis nulla. Proin interdum est at nulla laoreet, pulvinar pretium nisl rutrum. In vel elit a risus rhoncus accumsan vulputate non sapien. Sed et rhoncus velit. Nunc commodo augue fermentum, hendrerit neque at, ullamcorper arcu. Nulla tincidunt orci a lectus efficitur elementum. Donec molestie urna vestibulum augue placerat faucibus. In vitae orci vel mauris cursus viverra ac sit amet nisl. Phasellus odio tortor, ullamcorper eget ullamcorper eget, molestie eget justo. Integer elementum purus eget arcu fermentum tincidunt. Nullam erat tellus, dictum sit amet nisi eu, rutrum fermentum odio.</p>
                    </div>
                    <div class="tab-pane fade" id="sit-amet" role="tabpanel">
                        <h1>Sit Amet</h1>

                        <p>Aliquam hendrerit nunc vitae nisi efficitur, eu porta sem aliquam. Aenean tincidunt mi sed mi sodales bibendum. Proin dolor ipsum, mollis venenatis velit eu, iaculis laoreet mi. Mauris eget egestas felis, sit amet finibus nunc. Aliquam non dui sit amet erat auctor mollis ac eget ante. Quisque at quam augue. Nulla dignissim, augue nec cursus consequat, mi nulla efficitur augue, vel fringilla turpis quam eu nunc. Quisque rutrum vehicula lacus sodales molestie. Mauris vel felis sit amet erat maximus cursus ut a velit. In hac habitasse platea dictumst. Vestibulum vel neque sit amet nisl finibus fermentum.</p>
                    </div>
                </div>
            </div>

        </div>
            <input type="submit" class="btn-danger btn" value="save data" id="customSubmit">
        </form>
    </div>


    @push('scripts')

        <script>
$('form').on('click','#customSubmit',function (e) {
    e.preventDefault();
    $('.error').html("");
    //$('.nav-tabs .active').text()
    var id = $('.nav-tabs .active').attr("href");
    var component=$('.nav-tabs .active').data("component");
  //  alert(id);
    var data = {};
    data['component']=component;
    $('.active').find('input:text, input:password, input:file, select, textarea')
        .each(function() {
            alert($(this).attr('name')+"="+this.value);
            data[$(this).attr('name')] = this.value;
        });
    var lastSelected='';
    $('.active').find('input[type="radio"]:checked, input:checkbox').each(function() {

      //  $(this).removeAttr('checked');
       // $(this).removeAttr('selected');
       // var radioValue = $("input[name='gender']:checked").val();
      /*  alert($(this).attr('name')+"="+this.value);
        var radioName=$(this).attr('name');

        var isChecked = $('input[name="'+radioName+'"]').attr('checked')?true:false;

    if(isChecked){
        data[$(this).attr('name')] = this.value;
        lastSelected=radioName;
    }else{

    }*/

       data[$(this).attr('name')] =  $(this).is(":checked")?this.value:'';
    });
    console.log(data);

   console.log($('.tab-content .tab-pane .active').find(':input'));
//{'data':$('.active').find(':input')}
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url:  '{{url("contactForm")}}',
      //  processData: false,
        data:data,
     //   contentType: false,

        success: function (response) {
console.log(response);
            if(response.errors){
                console.log(response.errors);
                $.each(response.errors, function(i, item) {
                    $('.error_'+i).html(item);

                })
            }
        },

        error: function (e) {
            console.log(e);
        }
    });

});
        </script>
    @endpush
@endsection

