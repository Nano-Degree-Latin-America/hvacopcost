$(document).ready(function () {
    $('.dropify').dropify({
        messages: {
            'default': 'Arrastra una imagen o da click',
            'replace': 'Arrastra una imagen o da click para reemplazar',
            'remove': 'Quitar',
            'error': 'Oops! ha ocurrido un error.'
        }
    });
    $('.dropify-clear').on('click', function () {
        $('#btn-aceptar').removeClass("btn")
        $('#btn-aceptar').removeClass("btn-primary");
        $('#btn-aceptar').addClass("btn-disabled");
    });
    $('#btn-excel').on('click', function () {
        Upload();
    });
})

function enableButton() {
    $('#btn-aceptar').removeClass("btn-disabled")
    $('#btn-aceptar').addClass("btn");
    $('#btn-aceptar').addClass("btn-primary");
}

function Upload() {
    //Reference the FileUpload element.
    var fileUpload = document.getElementById("fileUpload");

    //Validate whether File is valid Excel file.
    var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.xls|.xlsx)$/;
    if (regex.test(fileUpload.value.toLowerCase())) {
        if (typeof (FileReader) != "undefined") {
            var reader = new FileReader();

            //For Browsers other than IE.
            if (reader.readAsBinaryString) {
                reader.onload = function (e) {
                    ProcessExcel(e.target.result);
                };
                reader.readAsBinaryString(fileUpload.files[0]);
            } else {
                //For IE Browser.
                reader.onload = function (e) {
                    var data = "";
                    var bytes = new Uint8Array(e.target.result);
                    for (var i = 0; i < bytes.byteLength; i++) {
                        data += String.fromCharCode(bytes[i]);
                    }
                    ProcessExcel(data);
                };
                reader.readAsArrayBuffer(fileUpload.files[0]);
            }
        } else {
            alert("This browser does not support HTML5.");
        }
    } else {
        alert("Please upload a valid Excel file.");
    }
};
function ProcessExcel(data) {
    //Read the Excel File data.
    var workbook = XLSX.read(data, {
        type: 'binary'
    });

    //Fetch the name of First Sheet.
    var firstSheet = workbook.SheetNames[0];

    //Read all rows from First Sheet into an JSON array.
    var excelRows = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[firstSheet]);
    console.log(excelRows);
     for (let i = 0; i < excelRows.length; i++) {
        var cooling = excelRows[i]['cooling'].split(';')
        var heating = excelRows[i]['heating'].split(';')
         
        $.ajax({
            type: 'POST',
            url: '/setDegreeHrs',
            dataType: 'json',
            data: {
                idCiudad: excelRows[i]['idCiudad'],
                mes: excelRows[i]['mes'],
                cooling: cooling[1],
                heating: heating[1],
                activoCooling: excelRows[i]['activoCooling'],
                "_token": $("meta[name='csrf-token']").attr("content")
            },
            success: function (response) {


            },
            error: function (responsetext) {
                console.log(responsetext);
            }
        });

     }
};