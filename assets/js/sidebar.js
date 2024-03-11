let sidebar = document.getElementById("sidebar");
let sidebarCollapse = document.getElementById("sidebarCollapse");

sidebarCollapse.addEventListener('click', ()=>{
    sidebar.classList.toggle("active")
})