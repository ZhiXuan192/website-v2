// var pharmacy = document.querySelector(".pharmacy");
// pharmacy.addEventListener("click", function(){
//     document.querySelector("body").classList.toggle("active");
// })

var currentPage = window.location.href;
var links = document.querySelectorAll('.sidebar a');

links.forEach(function(link) {
if (currentPage.indexOf(link.getAttribute('href')) !== -1) {
    link.classList.add('active');
}
});