<footer>
    <p>&copy; author Nick Thieuw</p>
</footer>

<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>')</script>-->
<script src="presentation/js/vendor/jquery-1.11.1.js"></script>

<script src="presentation/js/vendor/bootstrap.min.js"></script>

<script src="presentation/js/main.js"></script>
<!--        <script src="//code.jquery.com/jquery-1.10.2.js"></script> heb ik niet nodig er staat al één in-->
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

<script>
    $(function () {
//         $( "#datepicker" ).datepicker({
//             minDate: +1, maxDate: "+0w +3d"});
        $('#datepicker').datepicker({beforeShowDay: showEventDates});

            var eventDates= [<?php 
            
            for($i=1; $i<=$lengte; $i++){
                if ($i===$lengte){
                    $splits = explode('-', $result[$i-1]);
                    echo '{date: new Date('.$splits[0].', '.$splits[1].' - 1, '.$splits[2].')}';
                    //echo '{date: new Date(2015, 1 - 1, '.$i.')}';
                }else{
                    $splits = explode('-', $result[$i-1]);
                    echo '{date: new Date('.$splits[0].', '.$splits[1].' - 1, '.$splits[2].')},';
                }
            }
            ?>];

        function showEventDates(date) {
            for (var i = 0; i
                    < eventDates.length; i++) {
                if (date.getTime()
                        === eventDates[i].date.getTime()) {
                    return [true, ''];
                }
            }
            return [false,
                ''];
        }

        

        // Getter
        var dateFormat = $("#datepicker").datepicker("option", "dateFormat");

        // Setter
        $("#datepicker").datepicker("option", "dateFormat", "dd-mm-yy");

        // Getter
        var showAnim = $("#datepicker").datepicker("option", "showAnim");

        // Setter
        $("#datepicker").datepicker("option", "showAnim", "fold");

        $("#anim").change(function () {
            $("#datepicker").datepicker("option", "showAnim", $(this).val());

        });
    });
</script>

</body>
</html>
