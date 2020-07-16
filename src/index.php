<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="index.js"></script>

<style>
    input {
        width: 80px;
        height: 80px;
        text-align: center;

    }

    .arr, arr_bilo, arr_stalo {
        text-align: center;
    }

    .mr {
        margin: 60px 0;
    }

    .check_this {
        background: #00f500;
    }

    .check_this_red {
        background: rgba(255, 0, 0, 0.61);
    }

</style>

<div class="container">

    <div class="py-5 text-center">
        <input class="arr" type="text" name="arr[]">
        <input class="arr" type="text" name="arr[]">
        <input class="arr" type="text" name="arr[]">
        <input class="arr" type="text" name="arr[]">
        <input class="arr" type="text" name="arr[]">
        <input class="arr" type="text" name="arr[]">
        <input class="arr" type="text" name="arr[]">
        <input class="arr" type="text" name="arr[]">
        <input class="arr" type="text" name="arr[]">
    </div>
    <div class="text-center">
        <input type="submit" value="Начать" id="start">
    </div>

        <div class="mr text-center">
            <h3>Было</h3>
            <div id="bilo"></div>
        </div>

        <div class="mr text-center">
            <h3>Стало</h3>
            <div id="stalo"></div>
        </div>


</div>


<script>
    $(document).ready(function () {

        $('.arr').bind("change keyup input click", function () {
            if (this.value.match(/[^0-9]/g)) {
                this.value = this.value.replace(/[^0-9]/g, '');
            }
            if (this.value.length > 2) {
                this.value = this.value.slice(0, -1);
            }
            if (this.value[0] === '0') {
                this.value = this.value.slice(0, -1);
            }
        });

        $('.arr').bind("click", function () {
                this.value = '';
        });

        $('#start').on('click', function () {
            $.ajax({
                url: '/puzir.php',
                method: 'post',
                data: $('input[name="arr[]"]'),
                success: function (data) {
                    let result = JSON.parse(data);

                    let html_bilo = '';
                    $.each(result.bilo, function (index, value) {
                        html_bilo = html_bilo + '<input class="arr_bilo" type="text" value="'+ value +'">';
                    });

                    let html_stalo = '';
                    $.each(result.stalo, function (index, value) {
                        html_stalo = html_stalo + '<input class="arr_stalo" type="text" value="'+ value +'">';
                    });
                    html_stalo = html_stalo + '<ul>';


                    $('#bilo').html(html_bilo);
                    $('#stalo').html(html_stalo);
                }
            });
        });


    });
</script>

