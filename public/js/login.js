$(function() {

    $('input[name="email"]').on('input', function() {
        validator();
    })
    $('input[name="password"]').on('input', function() {
        validator();
    })

    function validator() {

        let error = false;

        const emailForm = $('input[name="email"]');
        const emailFormErr = $('input[name="email"] + p');
        if (emailForm.val() === '' || emailForm.val().match(/^\s+$/)) {
            emailForm.css('background-color', '#faa');
            emailFormErr.text('Eメールアドレスを入力してください');
            error = true;

        } else if (!emailForm.val().match(/^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/)) {
            emailForm.css('background-color', '#faa');
            emailFormErr.text('正しく入力してください');
            error = true;

        } else {
            emailForm.css('background-color', '#eee');
            emailFormErr.text('');
        }

        const passForm = $('input[name="password"]');
        const passFormErr = $('input[name="password"] + p');
        if (passForm.val() === '') {
            passForm.css('background-color', '#faa');
            passFormErr.text('パスワードを入力してください');
            error = true;

        } else {
            passForm.css('background-color', '#eee');
            passFormErr.text('');
        }

        if(error) {
            $('input[type="submit"]').prop('disabled', true);
        } else {
            $('input[type="submit"]').prop('disabled', false);
        }

    }

});