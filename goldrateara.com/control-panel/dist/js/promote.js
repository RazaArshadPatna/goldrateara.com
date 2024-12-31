var alert_success = "alert alert-success alert-dismissible";
var alert_waring = "alert alert-warning alert-dismissible";
var alert_info = "alert alert-info alert-dismissible";
var alert_danger = "alert bg-red alert-dismissible";


function promote() {
    if (confirm("Are you sure you want to promote Selected Student")) {} else {
        return false;
    }
    var pclass = $("#classp").val();
    var session = $("#session").val();
    if (pclass == '') {
        alert('Promoted Class Cannot be Blank!');
        return false;
    }
    if (session == '') {
        alert('Promoted Session Cannot be Blank!');
        return false;
    }
    var allVals = [];
    var allVals = $('input[name=mycheck]:checked').map(function() {
        return $(this).val();
    }).get();
    var roll = [];
    var roll = $('input[name=mycheck]:checked').map(function() {
        var id = $(this).val();
        return $(".roll" + id).val();
    }).get();
    console.log(roll);

    var elements = allVals.length;

    if (elements > 0) {
        $.ajax({
            type: "POST",
            data: { all: allVals, roll: roll, pclass: pclass, psession: session },
            url: "ajex/master-promote.php",
            success: function(msg) {
                var ar = msg.split(',');
                ar = ar[0];
                $("input[name='mycheck']:checkbox").prop('checked', false);
                $('#checkAll').prop('checked', false);

                Msg(ar, alert_success);
                for (var i = 0; i < allVals.length; i++) {
                    $('#row' + allVals[i]).remove();
                }
            }
        });
    } else {
        Msg("Please select at least one student for Promote in Next Class", alert_danger);
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