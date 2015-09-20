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
        '<option value="auto-jhome" >С постановкой на стоянку</option>' +
        '</select>' +
        '</td>';

    cr1['home']='<td>Залог – «Недвижимость»</td>' +
        '<td>' +
        '<select id="home-nd"   onchange=GetSumma("home-nd")>' +
        '<option value="">---</option>' +
        '<option value="home-nd-doly">Доля в квартире, земельные участки, гаражи</option>' +
        '<option value="home-nd-s">Жилой дом, квартиры</option>' +
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

    cr1['auto-jhome']='summa';


    function SelectChange(selector,lavel)
    {
        if($( '#'+selector+' option:selected' ).val()=='auto-jhome')
        {
            GetSumma('auto');
            $("#cr3").html("");
        }
        else
        {
            $('#'+lavel).html(cr1[$( '#'+selector+' option:selected' ).val()]);
        }
    }


    //Выдает результат
    function GetSumma(selector)
    {
        var select = $( '#'+selector+' option:selected' ).val();
        console.info(select);
        var percent = 0;
        var summa = parseFloat($("#price").val());
        if(select=='auto-pravo-propiska-home')
        {

            if(summa<=50000)
            {
                percent=8;
            }
            else
            {
                percent=10;
            }
        }
        else if(select=='auto-pravo-propiska-kray')
        {

            if(summa<=50000)
            {
                percent=7;
            }
            else
            {
                percent=8;
            }
        }
        //---------------------------------------------
        else if(select=='auto-jhome')
        {

            if(summa<=50000)
            {
                percent=6;
            }
            else
            {
                percent=4;
            }
        }
    else if(select=='home-nd-doly')
    {

        if(summa<=50000)
        {
            percent=7;
        }
        else
        {
            percent=6;
        }
    }
    else if(select=='home-nd-s')
    {

        if(summa<=50000)
        {
            percent=6;
        }
        else
        {
            percent=4;
        }
    }


       var kk=Math.floor((summa*percent)/100);

        $("#platej").html(kk+" р.");

        console.info(selector);
        $(".raschet").attr('param',selector);
    }

    function Raschet()
    {
        //console.info($(".raschet").attr('param'));
        GetSumma($(".raschet").attr('param'));
    }

</script>

<style>
    .raschet
    {
        border: 0;
    }
</style>

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
            <button class="raschet" param="" onclick='GetSumma($(".raschet").attr("param"));'>Расчитать</button>
            <table class="table howMach">
                <tbody>
                <tr>
                    <td>Ежемесечный платеж составит:</td>
                    <td id="platej"></td>
                </tr>
                <!-- <tr>
                    <td>Общая сумма к выплате составит:</td>
                    <td id="summa">15 085 р</td>
                </tr>-->
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
