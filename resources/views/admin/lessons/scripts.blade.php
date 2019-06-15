<script>
    $('.course').select2({
        placeholder: 'Select an option',
        allowClear: true,
        // maximumSelectionLength: 3,
        width: 'resolve',
        ajax: {
            url: "{{ route('lessons.index') }}",
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
</script>
