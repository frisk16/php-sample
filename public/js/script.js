$(function() {

    $(window).on('scroll', function() {
        const logoutBtn = $('#logout-btn');
        if ($(this).scrollTop() > 300) {
            logoutBtn.css({
                'z-index': 10,
                'opacity': 1,
                'bottom': '16px',
            });
        } else {
            logoutBtn.css({
                'z-index': -1,
                'opacity': 0,
                'bottom': 0,
            });
        }
    });


    $('input[name="name"]').on('input', function() {
        validator();
    })
    $('textarea[name="comment"]').on('input', function() {
        validator();
    })

    function validator() {

        let error = false;

        const nameForm = $('input[name="name"]');
        const nameFormErr = $('input[name="name"] + p');
        if (nameForm.val().match(/^\s+$/)) {
            nameForm.css('background-color', '#faa');
            nameFormErr.text('空白のみは使用できません');
            error = true;

        } else if (nameForm.val().length > 10) {
            nameForm.css('background-color', '#faa');
            nameFormErr.text('10文字以内で入力してください');
            error = true;

        } else {
            nameForm.css('background-color', '#eee');
            nameFormErr.text('');
        }

        const commentForm = $('textarea[name="comment"]');
        const commentFormErr = $('textarea[name="comment"] + p');
        if (commentForm.val() == '') {
            commentForm.css('background-color', '#faa');
            commentFormErr.text('コメントを記入してください');
            error = true;

        } else if (commentForm.val().match(/^\s+$/)) {
            commentForm.css('background-color', '#faa');
            commentFormErr.text('空白のみで投稿はできません');
            error = true;

        } else if (commentForm.val().length < 10) {
            commentForm.css('background-color', '#faa');
            commentFormErr.text('最低10文字以上で記入してください');
            error = true;

        } else if (commentForm.val().length > 255) {
            commentForm.css('background-color', '#faa');
            commentFormErr.text('255文字以内で記入してください');
            error = true;

        } else {
            commentForm.css('background-color', '#eee');
            commentFormErr.text('');
        }

        if (error) {
            $('input[type="submit"]').prop('disabled', true);
        } else {
            $('input[type="submit"]').prop('disabled', false);
        }
    }
});