<style>
    .hidden
    {
        display:none;
    }
</style>

<script>
    var cr1= new Array();
    cr1['car']='<td>Залог – «Автомобиль»</td>' +
        '<td>' +
        '<select id="auto"  onchange=\'SelectChange("auto","cr3")\'>' +
        '<option value="">---</option>' +
        '<option value="auto-pravo" >С правом пользования</option>' +
        '<option value="auto-jhome" >Жилой дом, квартиры</option>' +
        '</select>' +
        '</td>';

    cr1['home']='<td>Залог – «Недвижимость»</td>' +
        '<td>' +
        '<select id="home-nd"   onchange=GetSumma("home-nd")>' +
        '<option value="">---</option>' +
        '<option value="home-nd-doly">Доля в квартире, земельные участки, гаражи</option>' +
        '<option value="home-nd-s">С постановкой на стоянку</option>' +
        '</select>' +
        '</td>';

    cr1['auto-pravo']='<td>Прописка</td>' +
        '<td>' +
        '<select id="auto-pravo-propiska" onchange=GetSumma("auto-pravo-propiska") >' +
        '<option value="">---</option>' +
        '<option value="auto-pravo-propiska-home">Городская прописка</option>' +
        '<option value="auto-pravo-propiska-kray">Краевая прописка</option>' +
        '</select>' +
        '</td>';

    cr1['auto-jhome']='<td>Прописка</td>' +
        '<td>' +
        '<select id="auto-jhome-propiska" onchange=GetSumma("auto-jhome-propiska")>' +
        '<option value="">---</option>' +
        '<option value="auto-pravo-propiska-home">Городская прописка</option>' +
        '<option value="auto-pravo-propiska-kray">Краевая прописка</option>' +
        '</select>' +
        '</td>';


    function SelectChange(selector,lavel)
    {
        $('#'+lavel).html(cr1[$( '#'+selector+' option:selected' ).val()]);
    }


    //Выдает результат
    function GetSumma(selector)
    {
        alert($( '#'+selector+' option:selected' ).val());
    }

</script>

<section id="calk">
    <div class="container">
        <div class="row">
            <p class="h2 title">калькулятор займа</p>
            <table class="table">
                <tbody>
                <tr>
                    <td>Сумма займа</td>
                    <td>
                        <input type="number" name="price" id="price"/>
                    </td>
                </tr>
                <tr>
                    <td>На какой срок</td>
                    <td>
                        <select name="time" id="time">
                            <option value="1">1 год</option>
                            <option value="2">2 года</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Тип залога</td>
                    <td>
                        <select name="type" class="cal-select" id="type" onchange='SelectChange("type","cr2");$("#cr3").html("");'>
                            <option value="">---</option>
                            <option value="car" >Автомобиль</option>
                            <option value="home" >Недвижимость</option>
                        </select>
                    </td>
                </tr>
                <tr id="cr2">
                </tr>
                <tr id="cr3">
                </tr>
               <!--

                -->
                </tbody>
            </table>
            <a class="raschet" href="#">Расчитать</a>
            <table class="table howMach">
                <tbody>
                <tr>
                    <td>Ежемесечный платеж составит:</td>
                    <td id="platej">4985 р</td>
                </tr>
                <tr>
                    <td>Общая сумма к выплате составит:</td>
                    <td id="summa">15 085 р</td>
                </tr>
                </tbody>
            </table>
            <p class="text-center text-uppercase">Отправить заявку на получение заима</p>
            <form action="" id="zaivkaNa">
                <input required placeholder="*Ваше Имя" type="text"/>
                <input required placeholder="*Ваш телефон" type="tel"/>
                <input type="submit"/>
            </form>
        </div>
    </div>
</section>
