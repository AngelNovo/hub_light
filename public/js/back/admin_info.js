$(document).ready(function() {
    // Cambia el color del item del navbar para indicar en cual se está
    let pageName=$("#page").val();
    document.getElementById("page_nav_"+pageName).classList.add("text-success");
    let subName=$("#sub").val();
    document.getElementById(subName).classList.add("text-success");
});
