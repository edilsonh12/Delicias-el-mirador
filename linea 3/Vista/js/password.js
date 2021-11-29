$('#password').keyup(function(e) {
        var strongRegex = new RegExp("^(?=.{12,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
        var mediumRegex = new RegExp("^(?=.{8,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
        var enoughRegex = new RegExp("(?=.{4,}).*", "g");
        if (false == enoughRegex.test($(this).val())) {
                $('#mensaje').html('Mas caracteres.').css("color", "red");
        } else if (strongRegex.test($(this).val())) {
                $('#mensaje').className = 'ok';
                $('#mensaje').html('Fuerte!').css("color", "green");
        } else if (mediumRegex.test($(this).val())) {
                $('#mensaje').className = 'alert';
                $('#mensaje').html('Media!').css("color", "orange");
        } else {
                $('#mensaje').className = 'error';
                $('#mensaje').html('Debil!').css("color", "red");
        }
        return true;
    });