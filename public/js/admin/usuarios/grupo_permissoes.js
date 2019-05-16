$(document).ready(function () {

    function trocaSwitchery(span, seletor, status, check) {
        $(span).data('verifica', status);
        if ($(seletor).is(':checked') === check) {
            $(span).trigger('click');
        }
        $(seletor).prop('checked', status);
    }

    function verificaSwitchery(data) {
        for (let x in data) {
            let seletor = "input[name='permissoes[" + x + "]']";
            let parent = $($($(seletor).parent()).parent());
            let span = $(parent).find('span');
            if (data[x].ativo === 1) {
                // Marca os input que fazem parte do grupo
                trocaSwitchery(span, seletor, true, false);
            } else {
                trocaSwitchery(span, seletor, false, true);
            }
            if (data[x].childs !== undefined) {
                let childs = data[x].childs;
                verificaSwitchery(childs);
            }
        }
    }

    $("#grupo_id").on('change', function () {
        $.ajax({
            url: grupoUrl,
            data: {
                id: $(this).val()
            },
            type: 'POST',
            success: function (data) {
                verificaSwitchery(data);
            },
            error: function (e, i, o) {
                swal(e, 'warning');
                console.log(e, i, o);
            }
        })
    });
});
