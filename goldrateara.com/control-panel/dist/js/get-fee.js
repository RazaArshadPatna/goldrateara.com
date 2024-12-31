var alert_success = "alert alert-success alert-dismissible";
var alert_waring = "alert alert-warning alert-dismissible";
var alert_info = "alert alert-info alert-dismissible";
var alert_danger = "alert bg-red alert-dismissible";


function chkfee() {
    // if (confirm("Are you sure you want to promote Selected Student")) {} else {
    //     return false;
    // }
    var dues = $("#dues").val();
    var adv = $("#adv").val();
    if (isNaN(dues)) {
        dues = 0;
    }
    if (isNaN(adv)) {
        adv = 0;
    }
    var allVals = [];
    var allVals = $('input[name=mycheck]:checked').map(function() {
        return $(this).val();
    }).get();
    var allMonths = [];
    var allMonths = $('input[name=mycheck]:checked').map(function() {
        return $(this).data("month")
    }).get();
    var allFeeDetails = [];
    var allFeeDetails = $('input[name=mycheck]:checked').map(function() {
        return $(this).data("fee")
    }).get();
    console.log(JSON.stringify(allFeeDetails));
    //var allfee = JSON.stringify(allFeeDetails);
    var elements = allVals.length;
    var total = 0;
    if (elements > 0) {
        for (var i = 0; i < elements; i++) {
            if (i == 0) {
                total = parseInt(total) + parseInt(allVals[i]) + parseInt(dues) - parseInt(adv);
            } else {
                total = parseInt(total) + parseInt(allVals[i]);
            }
        }
        $('#sfee').val(JSON.stringify(allFeeDetails));
        $('#payble').val(total);
        $('#pay_amount').val(total);
        $('#month').val(allMonths);
        $('#pamount').val(allVals);
    } else {
        total = 0;
        $('#pay_amount').val('');
        $('#month').val('');
        $('#pamount').val('');
        $('#payble').val(total);
        Msg("Select Month to Pay fee", alert_danger);
    }





}

function Edit() {

}


function Msg(text, event) {
    $('#msg_box').text(text);
    $('#msg').addClass(event);
    $('#msg').removeClass("hidden");
}

function hide() {
    $('#msg').addClass("hidden");
}


$("#checkAll").click(function() {
    $('input:checkbox').not(this).prop('checked', this.checked);
});
$("#discount").blur(function() {
    $('#pay_amount').val(parseInt($("#payble").val()) - parseInt($("#discount").val()));
});