document.getElementById("add_arg").addEventListener("click", function (evt) {
    evt.preventDefault();
    var key = document.getElementById("key2add").value;
    var val = document.getElementById("val2add").value;
    if( !key || !val ) {
        alert( "Please provide both a key and value" );
        return false;
    }
    var html = "<div><span>" + key + " => " + val + "</span>";
    html += '<input type="hidden" name="' + key + '"value="' + val + '"></input>';
    html += "</div>";
    document.getElementById("args").innerHTML += html;
    document.getElementById("key2add").value = '';
    document.getElementById("val2add").value = '';
});
