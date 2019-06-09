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
</script>
