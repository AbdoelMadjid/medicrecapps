(function() {
    var httpRequest;
    dropper = document.getElementById("statedrop");
    dropper.onchange = function() { 
    //alert(dropper.value);
    makeRequest('http://codeigniter.technopoetic.com/index.php/welcome/ajaxdrop?state=' + dropper.value); 
    };

    function makeRequest(url) {
        if (window.XMLHttpRequest) { // Mozilla, Safari, ...
            httpRequest = new XMLHttpRequest();
        } else if (window.ActiveXObject) { // IE
            try {
                httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
            } 
            catch (e) {
                try {
                    httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
                } 
                catch (e) {}
            }
        }

        if (!httpRequest) {
            alert('Giving up :( Cannot create an XMLHTTP instance');
            return false;
        }
        httpRequest.onreadystatechange = alertContents;
        httpRequest.open('GET', url);
        httpRequest.setRequestHeader('X-Requested-With', 'XMLHttpRequest'); 
        httpRequest.send();
    }

    function alertContents() {
        if (httpRequest.readyState === 4) {
            if (httpRequest.status === 200) {
                var data = JSON.parse(httpRequest.response);
                var select = document.getElementById('zipdrop');
                if(emptySelect(select)){
                    for (var i = 0; i < data.state_zips.length; i++){
                        var el = document.createElement("option");
                            el.textContent = data.state_zips[i].zip;
                            el.value = data.state_zips[i].zip;
                            select.appendChild(el);
                    }
                }
            } else {
                alert('There was a problem with the request.');
            }
        }
    }

    function emptySelect(select_object){
        while(select_object.options.length > 0){                
            select_object.remove(0);
        }
        return 1;
    }
})();
