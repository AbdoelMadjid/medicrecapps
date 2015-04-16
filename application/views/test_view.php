
<!DOCTYPE html>
<html  lang="en" >
<head> hallo</head>
<body>


    <form>
        <div id="navigation_bar">
            <div id="search">
                <form>

                    <div id="do_search_btn" class="menu" >
                        <p id="center">Do Search</p>
                    </div>

                    <div id="search_field" class="menu" >
                        <input type="text" name="search_field_input" id="search_input" value="Type in here">
                    </div>

                </form>
            </div>
        </div>
        <script type="text/javascript">

                $( "#do_search_btn" ).click(function() {

                    var input = $("[name='search_field_input']").val();

                    if(input ==""){
                    $("[name='search_field_input']").val("Enter search 1st");

                    }
                    else if(input=="Type in here")
                    {
                        $("[name='search_field_input']").val("Enter search 1st");
                    }
                    else if(input=="Enter search 1st")
                    {
                        $("[name='search_field_input']").val("Enter search 1st");
                    }
                    else {
                    <!-- CALL THE FUNCTION FROM THE CONTROLLER HERE PLEASE -->
                    }
                });
        </script>
    </form>
</body>
</html>