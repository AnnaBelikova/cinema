<?php


$id = '';
if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
}
?>
<div class="col-12 main_block">
    <h2>Забронированные места</h2>
    <hr/>
    <br>
    <div class="places_block">

        <script>
            let places = [];
            let result = '';
            let id = "<?=$id?>";

            function showPlaces() {
                fetch("http://localhost/cinema/api/places/" + id)
                    .then((response) => {
                        if (response.ok) {
                            return response.json();
                        }
                    })
                    .then((json) => {
                        places = json;

                        let string = '<div class = "row">'
                        let rowNumber = 0;
                        let tempRow = '';
                        for (let key in json) {
                            if(json[key].row != rowNumber){

                                rowNumber = json[key].row;
                                string += tempRow + '</div><div class="row">';
                                tempRow = '';
                            }
                            let status = '';
                            if(json[key].status == 'Забронирован'){
                                status = 'red';
                            }
                            tempRow += '<div class ="place_item ' + status +'">'+
                                json[key].number + '</div>';
                            ;
                        }

                        document.querySelector('.places_block').innerHTML = string;
                    })
                    .catch(function (err) {
                        alert('Ошибка' + err);
                    });
            }

            showPlaces()
        </script>

    </div>
</div>


