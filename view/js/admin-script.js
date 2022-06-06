var createbtn = document.getElementById('create-account-btn');
var closebtn = document.getElementById('close-btn')
var createbox = document.getElementsByClassName('create-account-container')[0]


function openContainer() {
    createbox.style.display = 'flex'
}

function close() {
    createbox.style.display = 'none'
}

function openmenu(id) {
    document.getElementById(id).parentNode.children[1].style.display = 'inline-block';
}

function closemenu(id) {
    console.log(document.getElementById(id))
    document.getElementById(id).style.display = 'none'
}

function closeBox(cname) {
    document.getElementsByClassName(cname)[0].style.display = 'none';
}

function closer(id) {
    document.getElementById(id).style.display = 'none';
}

function opener(id) {
    document.getElementById(id).style.display = 'flex'
}



//  live searching]

function getStd(val, userType, sortBy = 'ID', sortType = 'ASC', isAcc = false) {

    if (sortBy == '') {
        sortBy = 'ID';
    }

    if (sortType == '') {
        sortType = 'ASC';
    }
    let type = document.getElementById('searchby').value;
    var typeNvalue = {
        'type': type,
        'userType': userType,
        'value': val,
        'sortBy': sortBy,
        'sortType': sortType,
        'isAcc': isAcc
    }
    console.log(typeNvalue);
    var typeNvalueJson = JSON.stringify(typeNvalue);
    // console.log(typeof(typeNvalueJson));

    $student = "";
    if (val == "" && !isAcc) {
        //  do nothing
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                for (let i = 0; i < document.getElementsByClassName('list-content').length; ++i) {
                    document.getElementsByClassName('list-content')[i].style.display = "none";
                }
                document.getElementsByClassName('list-content-container')[0].innerHTML = this.responseText;

            }
        };
        xmlhttp.open("get", "../../controller/getStudent.php?empty=" + userType, true);
        xmlhttp.send();
    } else if (val == "" && isAcc) {
        console.log('here');
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

                for (let i = 0; i < document.getElementsByClassName('list-content').length; ++i) {
                    document.getElementsByClassName('list-content')[i].style.display = "none";
                }
                document.getElementsByClassName('list-content-container')[0].innerHTML = this.responseText;

            }
        };
        xmlhttp.open("get", "../../controller/getStudent.php?employees=employee", true);
        xmlhttp.send();

    } else {
        // create an httpreqest obj
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                for (let i = 0; i < document.getElementsByClassName('list-content').length; ++i) {
                    document.getElementsByClassName('list-content')[i].style.display = "none";
                }
                document.getElementsByClassName('list-content-container')[0].innerHTML = this.responseText;

            }
        };
        xmlhttp.open("GET", "../../controller/getStudent.php?q=" + typeNvalueJson, true);
        xmlhttp.send();
    }


}



function Desc(by, userType, isAcc) {
    console.log(by + " " + userType);
    getStd(null, userType, by, 'DESC', isAcc)
}

function Asc(by, userType, isAcc) {
    getStd(null, userType, by, 'ASC', isAcc)
}