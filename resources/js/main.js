;(function($) {


    $(".datepicker").datepicker({
        format: 'dd/mm/yyyy'
    });

    $(".money").maskMoney({
        thousands:'.',
        allowZero: true,
        decimal:',',
        affixesStay: false
    })

})(jQuery)