
<ul class="nav nav-tabs">


</ul>

<script>
    let dates = [];
    let dateResult = '';

    function showDates() {
        fetch("http://localhost/cinema/api/dates")
            .then((response) => {
                if (response.ok) {
                    return response.json();
                }
            })
            .then((json) => {
                dates = json;

                    for (let key in json) {
                        let arrDate = dates[key].date.split('-');
                        let day = arrDate[2];
                        let month = arrDate[1];
                        let string ='';
                        let active = key == 0 ? 'active' : '';
                        let show = key == 0 ? 'show' : '';
                        string = '<li class="nav-item date_item '+ active + show +' "  id="'+ dates[key].date +'"><a class="nav-link ' + active +'">'
                            + day+'.'+month + '</a></li>';
                        dateResult += string;
                    }
                    document.querySelector('.nav-tabs').innerHTML = dateResult;

                    $( ".date_item" ).click(function() {
                        console.log($( this ).attr('id'));
                        $('.nav-link').removeClass('active');
                        $('.nav-item').removeClass('active');
                        $('.nav-item').removeClass('show');
                        $(this).children('.nav-link').addClass('active');
                        $(this).addClass('active');
                        $(this).addClass('show');
                        <?if($title == 'Расписание'):?>
                            document.querySelector('.seanсes_block').innerHTML = '';
                            showSeances($( this ).attr('id'));
                        <?elseif($title == 'Главная'):?>
                            document.querySelector('.content').innerHTML = '';
                            showCinemas($( this ).attr('id'));
                        <?endif?>
                    });
            })
            .catch(function (err) {
                alert('Ошибка' + err);
            });
    }

    showDates();


</script>
