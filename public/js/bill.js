$(document).ready(function(){
    load_data();
    function load_data(query)
    {
        $.ajax({
            url:"../controller/sales.php?action=bill_details",
            method:"post",
            data:{query:query},
            success:function(data)
            {
                $('#result').html(data);
            }
        });
    }

    $('#search_text').keyup(function(){
        var search = $(this).val();
        if(search != '')
        {
            load_data(search);
        }
        else
        {
            load_data();
        }
    });
});
