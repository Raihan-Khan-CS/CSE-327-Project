
$(document).on("click","#delete", function(e){
  e.preventDefault();
  var link= $(this).attr("href");
  swal({
    title: "Are sure to delete?",
    text: "Once Delected, You will not be able recover this imaginary file",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete)=> {
    if (willDelete) {
      window.location.href = link;
    }else{
      swal("Yor imaginary file safe!");
    }
  });
});
