$(document).ready(function() {
    $('#data-table-dpt').DataTable({
        responsive: true
    });
});
$(document).ready(function() {
    $('#data-table-dptb').DataTable({
        responsive: true
    });
});
$(document).ready(function() {
    $('#data-table-dpk').DataTable({
        responsive: true
    });
});

function notif_delete() {
	tanya = confirm("Anda yakin akan Menghapus Data?");
	if (tanya == true) {
		return true;
	} else {
		return false;
	}
}

function notif_logout() {
	tanya = confirm("Anda yakin akan Keluar ?");
	if (tanya == true) {
		return true;
	} else {
		return false;
	}
}

function delete_data() {
	$(function() {
	$(".delete").click(function(){
	var element = $(this);
	var del_id = element.attr("id");
	var info = 'id=' + del_id;
	if(confirm("Apakah Anda Yakin Ingin Mengapus Data ini ?")){
	 $.ajax({
	   type: "POST",
	   url: "delete.php",
	   data: info,
	   success: function(){
	 }
	});
	  $(this).parents(".show").animate({ backgroundColor: "#003" }, "slow")
	  .animate({ opacity: "hide" }, "slow");
	 }
	return false;
	});
	});
}