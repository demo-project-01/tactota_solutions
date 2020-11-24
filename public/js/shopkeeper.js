$(document).ready(function(){
    $('#search').keyup(function(){
        var query = $(this).val();
        if(query != '')
        {
            $.ajax({
                url:"../controller/sales.php?action=dashbord_search",
                method:"POST",
                data:{query:query},
                success:function(data)
                {
                    $('#result').fadeIn();
                    $('#result').html(data);
                }
            });
        }
    });
    $(document).on('click', 'li', function(){
        $('#search').val($(this).text());
        $('#result').fadeOut();
    });
});
