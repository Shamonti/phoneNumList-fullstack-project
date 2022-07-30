
//let collection,  buttonGroup, messageBox, buttonId;

//messageBox = document.getElementById('message');


/*function accessPhoneNumber(id, phone, email)
{
    collection = document.getElementById(id);
    buttonGroup = document.getElementById('buttonGroup'+id);
    buttonId = document.getElementById(id).value;
    collection.classList.add('hide');
    buttonGroup.classList.remove('hide');
    document.getElementById('messagePhone'+id).innerHTML = phone;
    if (email != null)
        document.getElementById('messageEmail'+id).innerHTML = email;
    else
        document.getElementById('messageEmail'+id).innerHTML = 'N/A';



}*/




/*function accessPhoneNumber(id, phone, email) {

    collection = document.getElementById(id);
    buttonGroup = document.getElementById('buttonGroup' + id);
    buttonId = document.getElementById(id).value;
    collection.classList.add('hide');
    buttonGroup.classList.remove('hide');
    document.getElementById('messagePhone' + id).innerHTML = phone;
    if (email != null)
        document.getElementById('messageEmail' + id).innerHTML = email;
    else
        document.getElementById('messageEmail' + id).innerHTML = 'N/A';
    //----- Open model CREATE -----//
    /!*jQuery('#btn-add').click(function () {
        jQuery('#btn-save').val("add");
        jQuery('#myForm').trigger("reset");
        jQuery('#formModal').modal('show');
    });*!/
    // CREATE

    $.ajax({
        url:"{{ route('historyDate') }}",
        method:"POST",
        data:{from_date:from_date, to_date:to_date, _token:"{{ csrf_token() }}"},
        dataType:"json",
        success:function(data)
        {
            var usedCredit = 0;
            for(var count = 0; count < data.length; count++)
            {
                usedCredit = usedCredit+data[count].usedCredit;
            }
            $("#usedCredit").text(usedCredit);
        }
    })




        /!*$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

        var formData = {
            id: id,
        };
        var state = "add";
        var type = "POST";
        var ajaxurl = '/autocomplete-search-data';
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {

            },
            error: function (data) {
                console.log(data);
            }
        });*!/
}*/
