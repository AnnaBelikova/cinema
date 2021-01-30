<?php

$id = '';
if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
}
?>
<div class="col-12 main_block">
    <h2>Фильмы</h2>
    <hr/>
    <br>
    <div class="films_block">

        <script>
            let films = [];
            let result = '';
            let id = "<?=$id?>";

            function showSeances() {
                fetch("http://localhost/cinema/api/films/"+id)
                    .then((response) => {
                        if (response.ok) {
                            return response.json();
                        }
                    })
                    .then((json) => {
                        films = json;
                        let actors;
                        if(id == ''){
                            for (let key in json) {
                                actors = films[key].actors == null ? 'Актерский состав не указан' : films[key].actors;
                                let string ='';
                                string = '<a class="film_item " id= "'+films[key].ID+'" class="link" href="films.php?ID='+films[key].ID+'"><img/><div class="film_title"  >'+
                                    films[key].name+ '</div>'+
                                    '<div class = "film_attr"><div class = "film_census">'+ films[key].census +'+ </div>'+
                                    '<div class = "film_genre">'+ films[key].genre_name +'</div></div>'+
                                    '<div class = "film_directed"><b>Режисер: </b>'+ films[key].first_name_directed + ' ' + films[key].last_name_directed +'</div>'+
                                    '<div class = "film_actors"><b>Актеры: </b>'+ actors +'</div>'+
                                    '</a>';
                                result += string + '<br>';
                            }
                            document.querySelector('.films_block').innerHTML = result;
                        }else {
                                let string ='';
                                actors = films.actors == null ? 'Актерский состав не указан' : films[key].actors;
                                string = '<div class="film_detail" >'+
                                    '<div class="film_head"><h3>'+ films.name +'</h3>'+
                                    '<img/></div><div class = "film_attr"><div class = "film_census">'+ films.census +'+ </div>'+
                                    '<div>'+ films.genre_name +'</div></div>'+
                                    '<div><b>Режисер: </b>'+ films.first_name_directed + ' ' + films.last_name_directed +'</div>'+
                                    '<div class = "film_detail_actors"><b>Актеры: </b>'+ actors +'</div>'+
                                    '<div>'+ films.desc +'</div>'+

                                    '</div>';
                                result += string + '<br>';

                            document.querySelector('.films_block').innerHTML = result;
                        }
                    })
                    .catch(function (err) {
                        alert('Ошибка' + err);
                    });
            }

            showSeances()
        </script>

    </div>
</div>

