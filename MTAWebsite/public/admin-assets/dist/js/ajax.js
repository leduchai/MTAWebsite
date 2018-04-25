
$( document ).ready(function() {
    var check = $('#toggle-one');
    if(check.is(':checked'))
    {
        $('#import').show();
    }
    else
    {
        $('#import').hide();
    }
    $('#dm').click(function(){

        $('#import').toggle();
    });
});
$('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : true,   
    });
$('#checkall').click(function () {
	if (this.checked) {
		var checkbox = $('.idcheck');
		for (var i = 0; i < checkbox.length; i++) {
			checkbox[i].checked = true;
		}
	}
	else {
		var checkbox = $('.idcheck');
		for (var i = 0; i < checkbox.length; i++) {
			checkbox[i].checked = false;
		}
	}
});
$("#FormDelete").click(function (event) {
	var tacvu = $('#tavu').val();
	if(tacvu==0)
	{
		event.preventDefault();
		return false;
	}
	else
	{
		var x = confirm("Bạn có muốn xóa tất cả các mục được chọn không?");
		if(x)
		{
			var checkbox = $('.idcheck');
			var result = "";
                    // Lặp qua từng checkbox để lấy giá trị
                    for (var i = 0; i < checkbox.length; i++) {
                    	if (checkbox[i].checked === true) {
                    		result += ' [' + checkbox[i].value + ']';
                    	}
                    }
                    if (result != "")
                    {
                    	return true;
                    }
                    else
                    {
                    	alert("Bạn chưa chọn mục để xóa");
                    	return false;
                    }
                    if (x) {
                    	return true;
                    }
                    else {

                    	event.preventDefault();
                    	return false;
                    }
                }
                else
                {
                	event.preventDefault();
                	return false;
                }
                
            }

        });
    function file_change(f) {
            var reader = new FileReader();
            reader.onload = function (e) {            
            var img = document.getElementById("img");           
            img.src = e.target.result;            
            img.style.display = "inline";            
        };     
        reader.readAsDataURL(f.files[0]);     
    }

