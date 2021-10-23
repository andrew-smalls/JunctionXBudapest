<?php

print '
<body>

<label>Value: <input type="text" id="theValue"></label>
<input type="button" id="setValue" value="Set">

<script>
    (function() 
    {
        var input = document.getElementById("theValue");
        console.log(input);

        if (localStorage && "theValue" in localStorage) 
        {
            input.value = localStorage.theValue;
        }

        document.getElementById("setValue").onclick = function () 
        {
            // Writing the value
            localStorage && (localStorage.theValue = input.value);
        };
    })();

</script>

</body>
';