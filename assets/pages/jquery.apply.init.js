var pageNumber=1;
var key="";
function paginationLinkClicked(page){
	pageNumber=page;
	loadData();
}
function search(searchKey){
	key=searchKey;
	loadData();
}
function loadData(){
	var choice = document.getElementById("num-rows-choice");
	var numRows=choice.options[choice.selectedIndex].value;
	var id = document.getElementById("id").value;
	$.ajax({
		type: 'POST',
		url: 'includes/process-ajax-request.php',
		data: 'rows=' + numRows+"&page="+pageNumber+"&key="+key+"&manage=application&id="+id
	}).done(function (response){
			document.getElementById("application-info").innerHTML = response;
			pageNumber=1;
			! function (t) {
	"use strict";
	var n = function () {};
	n.prototype.init = function () {
		 t(".approve-record").click(function () {
			 var id = $(this).attr('data-record-id');
			 swal({
				 title: "Are you sure, you wanna approve this student entry?",
				 text: "You won't be able to revert this!",
				 type: "warning",
				 showCancelButton: !0,
				 confirmButtonClass: "btn btn-confirm mt-2",
				 cancelButtonClass: "btn btn-cancel ml-2 mt-2",
				 confirmButtonText: "Yes, approve it!"
			 }).then(function () {
				 $.ajax({
					 type: 'POST',
					 url: 'includes/approve.php',
					 data: 'id=' + id+"&manage=application"
				 }).done(function (response) {
					 
					 swal({
						 title: "Approved !",
						 text: "Application has been approved!",
						 type: "success",
						 confirmButtonClass: "btn btn-confirm mt-2"
					 }).then(function(){
						 self.location = "application.php";
					 })
				 }).fail(function () {
						 swal({
							 title: "Issue !",
							 text: "There was issue approving student, please try again later!",
							 type: "error",
							 confirmButtonClass: "btn btn-confirm mt-2"
						 })
					 })
			 })
		 })
	}, t.SweetAlert = new n, t.SweetAlert.Constructor = n
}(window.jQuery),
	function (t) {
		"use strict";
		t.SweetAlert.init()
	}(window.jQuery);

			
	})
}
loadData();

$(document).ready(function() {
	$('form').parsley();

});
			! function (t) {
	"use strict";
	var n = function () {};
	n.prototype.init = function () {
		 t(".delete-record").click(function () {
			 var id = $(this).attr('data-record-id');
			 swal({
				 title: "Are you sure, you wanna delete this entry?",
				 text: "You won't be able to revert this!",
				 type: "warning",
				 showCancelButton: !0,
				 confirmButtonClass: "btn btn-confirm mt-2",
				 cancelButtonClass: "btn btn-cancel ml-2 mt-2",
				 confirmButtonText: "Yes, delete it!"
			 }).then(function () {
				 $.ajax({
					 type: 'POST',
					 url: 'includes/delete.php',
					 data: 'id=' + id+"&manage=application"
				 }).done(function (response) {
					 
					 swal({
						 title: "Deleted !",
						 text: "Application has been deleted!",
						 type: "success",
						 confirmButtonClass: "btn btn-confirm mt-2"
					 }).then(function(){
						 self.location = "apply.php";
					 })
				 }).fail(function () {
						 swal({
							 title: "Issue !",
							 text: "There was issue deleting, please try again later!",
							 type: "error",
							 confirmButtonClass: "btn btn-confirm mt-2"
						 })
					 })
			 })
		 })
	}, t.SweetAlert = new n, t.SweetAlert.Constructor = n
}(window.jQuery),
	function (t) {
		"use strict";
		t.SweetAlert.init()
	}(window.jQuery);
$(window).bind("load",function(){
	
});
