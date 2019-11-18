$(document).ready(function()
{
    /* Navbar */
    let burger = document.querySelector('.burger');
    let nav = document.querySelector('#'+burger.dataset.target);

    burger.addEventListener('click', function()
    {
        burger.classList.toggle('is-active');
        nav.classList.toggle('is-active');
    });

    $(".mtxt").empty();

    let interv = 0;
    
    $("#code").on("focus", function(e)
    {
        interv = setInterval(function()
        {
            let code = $("#code").val().split(" ");

            
            $("#ide").html($("#code").val());

            for(let i = 0; i < code.length; i++)
            {
                if(code[i] != "")
                {
                    $("#ide").html($("#ide").html().replace(code[i], SyntaxeDetector(code[i])));
                }
            }

            console.log(code);
        },50);
    });

    $("#code").on("keydown", function(e)
    {
        if(e.which == 13)
        {
            return false;
        }
    });

    $("#code").on("blur", function(e)
    {
        clearInterval(interv);
    });
});

function SyntaxeDetector(syntax)
{
    switch($.trim(syntax.toUpperCase()))
    {
        case "SELECT":
        case "DELETE":
        case "FROM":
        case "WHERE":
        case "LIKE":
        case "BETWEEN":
        case "FALSE":
        case "NULL":
        case "TRUE":
        case "NOT":
        case "IN":
        case "AND":
        case "CREATE":
        case "TABLE":
        case "ADD":
        case "DROP":
        case "CONSTRAINT":
        case "PRIMARY":
        case "KEY":
        case "AUTO_INCREMENT":
        case "GROUPE":
        case "ORDER":
        case "BY":
        case "HAVING":   
        case "ALTER":  
        case "DESC":
        case "USE":
        case "SHOW":
        case "COLUMNS":
        case "DATABASES":
        case "DATABASE":
        case "UPDATE":
        case "SET":
        case "AS":
        case "TABLES":
        case "INSERT":
        case "INTO":
        case "VALUES":
        {
            return "<span style='color: blue;'>"+syntax+"</span>"     
        }
        case "*":
        {
            return "<span style='color: red;'>"+syntax+"</span>"
        }
        case "VARCHAR":
        case "CHAR":
        case "DATE":
        case "TIME":
        case "INT":
        case "DOUBLE":
        {
            return "<span style='color: orange;'>"+syntax+"</span>"
        }
        default:
        {
            return "<span style='color: black;'>"+syntax+"</span>"
        }
    }
}

