<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repositories Autocomplete</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

</head>

<body>

    <div class="container">
        <h1>Поиск репозитория GitHub</h1>
        <div class="form-group">

            <div class="input-group">
                <input type="text" id="search" class="form-control" placeholder="Введите название...">

                <span class="input-group-btn">
                    <button class="btn btn-dark" type="button" id="searchButton">Поиск</button>
                </span>
            </div>
        </div>
        <div id="result" class="mt-3"></div>
    </div>

    <script>
        $(document).ready(function () {
            $('#searchButton').click(function () {
                var query = $('#search').val();
                $.get('/repositories/search', { query: query }, function (data) {
                    if (!data.error) {
                        var result = '<a href="' + data.html_url + '" class="text-decoration-none text-dark" target="_blank">'
                        result += '<div class="card"><div class="card-body">';
                        result += '<h5 class="card-title"> Имя проекта: ' + data.name + '</h5>';
                        result += '<p class="card-text"><strong>Автор:</strong> ' + (data.owner.login ? data.owner.login : data.owner) + '</p>';
                        result += '<p class="card-text"><strong>Кол-во звезд:</strong> ' + data.stargazers_count + '</p>';
                        result += '<p class="card-text"><strong>Кол-во просмотров:</strong> ' + data.watchers_count + '</p>';
                        result += '</div></div></a>';
                        $('#result').html(result);
                    } else {
                        $('#result').html('<div class="alert alert-danger">Произошла ошибка: ' + data.error + '</div>');
                    }
                }).fail(function (jqXHR) {
                    $('#result').html('<div class="alert alert-danger">Произошла ошибка: ' + jqXHR.responseJSON.error + '</div>');
                });
            });
        });

    </script>


</body>

</html>