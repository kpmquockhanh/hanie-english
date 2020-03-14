<script src="{{ asset('node_modules/izitoast/dist/js/iziToast.min.js') }}"></script>
<script>
    $('.categories').select2({
        placeholder: 'Select an option',
        allowClear: true,
        // maximumSelectionLength: 3,
        width: 'resolve',
        ajax: {
            url: "{{ route('categories.index') }}",
            dataType: 'json',
            quietMillis: 250,
            delay: 250,
            data: function (params) {
                const query = {
                    q: params.term,
                    // page: params.page || 1
                };

                return query;
            },
            cache: true
        },
    });
    $('.right-answer').select2({
        placeholder: 'Select an option',
        ajax: { // instead of writing the function to execute the request we use Select2's convenient helper
            url: "{{ route('answers.index') }}",
            dataType: 'json',
            quietMillis: 250,
            delay: 250,
            data: function (params) {
                const query = {
                    q: params.term,
                    page: params.page || 1
                };

                return query;
            },
            cache: true
        },
        width: 'resolve'

    });
    $('.right-answer').change(e => {
        $('.wrong-answers').val(null).trigger('change');
    });
    $('.wrong-answers').select2({
        placeholder: 'Select an option',
        allowClear: true,
        maximumSelectionLength: 3,
        width: 'resolve',
        ajax: { // instead of writing the function to execute the request we use Select2's convenient helper
            url: "{{ route('answers.index') }}",
            dataType: 'json',
            quietMillis: 250,
            delay: 250,
            data: function (params) {
                const rightAnswer = $('.right-answer').val();
                const query = {
                    q: params.term,
                    e: rightAnswer,
                    page: params.page || 1
                };

                return query;
            },
            cache: true
        },
    });


    $('#content').on('keyup', e => {
        if (e.keyCode === 13) {
            $('#submit-answer').trigger('click')
        }
    });
    $('#submit-answer').click(e => {
        const content = $('#content');
        axios.post(
            "{{ route('answers.store') }}",
            {
                content: content.val()
            }
        ).then(data => {
            if (data.data.success) {
                iziToast.show({
                    // theme: 'light',
                    title: 'Answer created',
                    // message: `${content.val()} answer has been created`,
                    position: 'topRight', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
                    // progressBarColor: 'rgb(0, 255, 184)',
                });
                content.val('');
                $('#modal-answer').modal('hide')
            } else {
                iziToast.error({
                    title: 'Error',
                    position: 'topRight', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
                });
            }
        }).catch(err => {
            console.log(err)
        })
    });
    $('#modal-answer').on('shown.bs.modal', function (e) {
        $('#content').focus();
    });

    $('#content-cate').on('keyup', e => {
        if (e.keyCode === 13) {
            $('#submit-cate').trigger('click')
        }
    });
    $('#submit-cate').click(e => {
        const content = $('#content-cate');
        axios.post(
            "{{ route('categories.store') }}",
            {
                name: content.val()
            }
        ).then(data => {
            if (data.data.success) {
                iziToast.show({
                    title: 'Category created',
                    position: 'topRight', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
                });
                content.val('');
                $('#modal-category').modal('hide')
            } else {
                iziToast.error({
                    title: 'Error',
                    position: 'topRight', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
                });
            }
        }).catch(err => {
            console.log(err)
        })
    })
    $('#modal-category').on('shown.bs.modal', function (e) {
        $('#content-cate').focus();
    })
</script>
