<?php
$id = '';
if(isset($_GET['ID'])){
    $id = $_GET['ID'];
}
?>
<div class="col-12 main_block">
    <h2>Расписание</h2>
    <hr/><br>
    <?include_once ('./templates/date.php');?>
    <div class="seanсes_block">

        <script>
            let seances=[];
            let result = '';
            let id = "<?=$id?>";
            let date = '2017-02-01'
            function showSeances(dateParam){
                fetch("http://localhost/cinema/api/seances/"+dateParam)
                    .then((response) => {
                        if (response.ok) {
                            return response.json();
                        }
                    })
                    .then((json) => {
                        seances = json;
                            let table = '<table class="table table-hover">' +
                                '<thead>' +
                                '<th>Фильм</th>' +

                                '<th>Ограничение</th>' +
                                '<th>Кинотеатр, Зал</th>' +
                                '<th>Начало</th>' +
                                '<th>Цена</th>' +
                                '<th>Билеты</th>' +
                                '</thead><tbody>';
                            for (let key in json) {
                                let row = '<tr><td>' +  '<a href="films.php?ID='+json[key].movie_id+'">' +json[key].movie_name +'</a></td>' +

                                    '<td>' +  json[key].census +'+ </td>' +
                                    '<td>' +  json[key].name + ', ' + json[key].hall_name +'</td>' +
                                    '<td>' +  json[key].time +'</td>' +
                                    '<td>' +  json[key].price +'</td>' +
                                    '<td> <a class="btn btn-success" href ="places.php?ID=' +  json[key].ID +'">Забронировать</a></td></tr>'
                                ;
                                table += row;
                            }
                            table += '</tbody></table>'
                            document.querySelector('.seanсes_block').innerHTML = table;
                        })
                    .catch(function (err) {
                        alert('Ошибка'+err);
                    });
            }

            showSeances(date);
        </script>

    </div>
</div>

