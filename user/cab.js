function myFunc() {
    element = document.getElementById("cabtype").value;
    if (element == "micro") {
    document.getElementById("lweight").value = "No luggage is allowed!";
    document.getElementById("lweight").disabled = true;
    }
    else {
    document.getElementById("lweight").value = "";
    document.getElementById("lweight").disabled = false;
    }
    }
    
    
    
    $('#ccity').change(function () {
    var pick = $('#ccity').val();
    $('#dcity option[value="' + pick + '"]').prop('disabled', 'disabled').siblings().removeAttr('disabled');
    });
    $('#dcity').change(function () {
    var drop = $('#dcity').val();
    $('#ccity option[value="' + drop + '"]').prop('disabled', 'disabled').siblings().removeAttr('disabled');
    });
    
    $("#lweight").keyup(function () {
    var weight = $("#lweight").val();
    if (isNaN(weight) == true) {
    alert("Integer Value Needed");
    $('#lweight').val('');
    }
    })