<?php
    $id = '';
    if(isset($_GET['ID'])){
        $id = $_GET['ID'];
    }
?>
<div class="col-12 main_block">
    <h2>Кинотеатры</h2>
    <hr/><br>
    <div class=" cinemas_block">
        <div class="cinema_info"></div>
        <?if($id != ''){
            include_once ('./templates/date.php');
        }?>
        <div class = "content tab-content">
            <ul class="cinemas_list">
            </ul>
        </div>


        <script>
            let cinemas=[];
            let result = '';
            let id = "<?=$id?>";
            let date = '';
            if(id != ''){
                date = '2017-02-01'
            }
            function showCinemas(dateParam){
                fetch("http://localhost/cinema/api/cinemas/"+ id + "/" + dateParam)
                    .then((response) => {
                        if (response.ok) {
                            return response.json();
                        }
                    })
                    .then((json) => {
                        cinemas = json;
                        if(id == ''){
                            for (let key in json) {
                                let string ='';
                                string = '<li><a id= "'+cinemas[key].ID+'" class="link" href="?ID='+json[key].ID+'">'+cinemas[key].name+'</a> '+cinemas[key].address+'</li>';
                                result += string + '<br>';
                            }
                            document.querySelector('.cinemas_list').innerHTML = result;
                        }else{

                            let info = '<h3>'+cinemas[0].name+'</h3> <br><div>'+cinemas[0].address+'<div/>';
                            let table = '<table class="table table-hover">' +
                                '<thead>' +
                                '<th>Фильм</th>' +
                                '<th>Ограничение</th>' +
                                '<th>Зал</th>' +
                                '<th>Начало</th>' +
                                '<th>Цена</th>' +
                                '<th>Билеты</th>' +
                                '</thead><tbody>';
                            for (let key in json) {
                                console.log(key);
                                let row = '<tr><td>' +  '<a href="films.php?ID='+json[key].movie_id+'">' +json[key].movie_name +'</a></td>' +
                                    '<td>' +  json[key].census +'+ </td>' +
                                    '<td>' +  json[key].hall_name +'</td>' +
                                    '<td>' +  json[key].time +'</td>' +
                                    '<td>' +  json[key].price +'</td>' +
                                    '<td> <a class ="btn btn-success" href ="places.php?ID=' +  json[key].seance_id +'">Забронировать</a></td></tr>'
                                ;
                                table += row;
                            }
                            table += '</tbody></table>';


                            document.querySelector('.cinema_info').innerHTML = info;
                            document.querySelector('.content').innerHTML = table;
                        }


                    })
                    .catch(function (err) {
                        alert('Ошибка'+err);
                    });
            }

            showCinemas(date);
        </script>

    </div>
</div>

