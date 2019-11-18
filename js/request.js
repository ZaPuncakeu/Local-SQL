function getRequest()
{
    let code = $("#code").val();

    $.ajax(
    {
        type: 'POST',
        data:
        {
            code:code
        },
        url:'../code.php',
        success:function(result)
        {
            $(".result").empty();
            $(".result").append(result);
        }
    });
}