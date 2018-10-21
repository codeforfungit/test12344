<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 <link rel="stylesheet" href="{{asset('css/select2.css')}}">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="{{asset('js/select2.js')}}"></script>
</head>
<body>

<div class="container">

    <div class="row">
        <select class="js-example-responsive" style="width: 75%"></select>
    </div>
</div>
<script>
    $(function () {
        $(".js-example-responsive").select2({
            minimumInputLength: 3,
            multiple: true, maximumSelectionSize: 1,
            templateResult: formatRepo,
            templateSelection: formatRepoSelection,
            escapeMarkup: function (markup) { return markup; },
         
           // minimumResultsForSearch: 5,
            //width: 'resolve', // need to override the changed default
            ajax: {
                url: 'http://localhost:8080/validator/public/api',
                dataType: 'json',
                data: function (params) {
                    var query = {
                        search: params.term,
                        page: params.page || 1
                    }

                    // Query parameters will be ?search=[term]&page=[page]
                    return query;
                },
               /* processResults: function (data) {
                    console.log(data);
                    // Tranforms the top-level key of the response object from 'items' to 'results'
                    return {
                        results: data
                    };
                }*/
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            }

        });
    })
    function formatRepo (repo) {

        if (repo.loading) {
            return repo.text;
        }

        var markup = "<div class='select2-result-repository clearfix'>" +
            "<div class='select2-result-repository__avatar'><img src='" + repo.text + "' /></div>" +
            "<div class='select2-result-repository__meta'>" +
            "<div class='select2-result-repository__title'>" + repo.text + "</div>";

        if (repo.description) {
            markup += "<div class='select2-result-repository__description'>" + repo.text + "</div>";
        }

        markup += "<div class='select2-result-repository__statistics'>" +
            "<div class='select2-result-repository__forks'><i class='fa fa-flash'></i> " + repo.text + " Forks</div>" +
            "<div class='select2-result-repository__stargazers'><i class='fa fa-star'></i> " + repo.text + " Stars</div>" +
            "<div class='select2-result-repository__watchers'><i class='fa fa-eye'></i> " + repo.text + " Watchers</div>" +
            "</div>" +
            "</div></div>";

        return markup;
    }

    function formatRepoSelection (repo) {
        return repo.text || repo.text;
    }
</script>
<!--
https://select2.org/data-sources/ajax



-->
</body>
</html>
