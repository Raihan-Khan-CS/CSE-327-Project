$(document).ready(function(){

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
  //Order Pending
  $(document).on("click","#pending", function(e){
    e.preventDefault();
    var link= $(this).attr("href");
    swal({
      title: "Are sure to Confirm Order",
      text: "Once confirm, You will not be able to pending again!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete)=> {
      if (willDelete) {
        window.location.href = link;
      }else{
        swal("Not Confirm!");
      }
    });
});
  //Order Processing
  $(document).on("click","#processing", function(e){
    e.preventDefault();
    var link= $(this).attr("href");
    swal({
      title: "Are sure to processing Order",
      text: "Once confirm, You will not be able to processing again!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete)=> {
      if (willDelete) {
        window.location.href = link;
      }else{
        swal("Not processing!");
      }
    });
    });
    //Order picked
  $(document).on("click","#picked", function(e){
    e.preventDefault();
    var link= $(this).attr("href");
    swal({
      title: "Are sure to picked Order",
      text: "Once confirm, You will not be able to picked again!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete)=> {
      if (willDelete) {
        window.location.href = link;
      }else{
        swal("Not picked!");
      }
    });
    });
    //Order shipped
  $(document).on("click","#shipped", function(e){
    e.preventDefault();
    var link= $(this).attr("href");
    swal({
      title: "Are sure to shipped Order",
      text: "Once confirm, You will not be able to shipped again!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete)=> {
      if (willDelete) {
        window.location.href = link;
      }else{
        swal("Not shipped!");
      }
    });
    });
     //Order delivered
  $(document).on("click","#shipped", function(e){
    e.preventDefault();
    var link= $(this).attr("href");
    swal({
      title: "Are sure to shipped Order",
      text: "Once confirm, You will not be able to shipped again!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete)=> {
      if (willDelete) {
        window.location.href = link;
      }else{
        swal("Not shipped!");
      }
    });
    });
      //Order delivered
  $(document).on("click","#delivered", function(e){
    e.preventDefault();
    var link= $(this).attr("href");
    swal({
      title: "Are sure to delivered Order",
      text: "Once confirm, You will not be able to delivered again!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete)=> {
      if (willDelete) {
        window.location.href = link;
      }else{
        swal("Not delivered!");
      }
    });
    });
        //Cancel Oder
  $(document).on("click","#cancel", function(e){
    e.preventDefault();
    var link= $(this).attr("href");
    swal({
      title: "Are sure to Cancel Order",
      text: "Once cancel, You will not be able to cancel again!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete)=> {
      if (willDelete) {
        window.location.href = link;
      }else{
        swal("Not cancel!");
      }
    });
    });
});
