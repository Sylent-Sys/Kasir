function printDiv(divName) {
    $("#remove").hide();
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
    $("#remove").show();
}
document.getElementById('ct').onclick = function() {
    printDiv('printArea');
}
