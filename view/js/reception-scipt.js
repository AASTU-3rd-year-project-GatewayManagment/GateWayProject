var searchBar = document.getElementById('search-bar-entry');
searchBar.addEventListener('keyup', getEntry)

function getEntry(val) {

    // not filtered though
    if (val != "") {
        //  do nothing
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                document.getElementById('search-box-select').innerHTML = this.responseText;

            }
        };

        xmlhttp.open("GET", "../../controller/studentList.php?q=" + val + "_" + false, true);
        xmlhttp.send();
    }
}

// for barcode
var barcode = '';
var interval;
document.addEventListener('keydown', function(e) {
    if (interval)
        clearInterval(interval);
    if (e.key == 'Enter') {
        if (barcode)
            handleBarcode(barcode);
        barcode = '';
        return;
    }
    if (e.key != 'Shift' && e.key != '$')
        barcode += e.key;
    interval = setInterval(() => barcode = '', 100);
});

function handleBarcode(barcode) {
    console.log(barcode);
    if (barcode.length > 6) {
        //  do nothing
        window.location.assign("http://localhost/GateWayProject/controller/studentList.php?q=" + barcode + "_" + true);

        // xmlhttp.open("GET", "../../controller/studentList.php"?q=" + barcode + "_" + true, true);
        // xmlhttp.send();
    }


}