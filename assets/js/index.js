//menu-bar
var btnBars=document.querySelector('.btn-bars');
var showCategory=document.querySelector('.category');
var btnExit=document.querySelector('.btn-exit');
var showOverlay=document.querySelector('.overlay');
btnBars.addEventListener('click', ()=>{
    showCategory.classList.toggle('show-category');
    showOverlay.classList.toggle('show-overlay');
    showSearch.classList.remove('show-search');
    //
    btnExit.addEventListener('click', ()=>{
        showCategory.classList.remove('show-category');
        showOverlay.classList.remove('show-overlay');
    });
});
showOverlay.addEventListener('click',()=>{
    showCategory.classList.remove('show-category');
    showOverlay.classList.remove('show-overlay');
});

// search-show-none 
var btnSearch=document.querySelector('.search-res');
var showSearch=document.querySelector('.search-wp-none');
btnSearch.addEventListener('click',()=>{
    showSearch.classList.toggle('show-search');
});

