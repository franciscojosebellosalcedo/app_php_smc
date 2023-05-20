window.addEventListener("DOMContentLoaded",(e)=>{
    const listItem=[...document.querySelectorAll(".item-header")];
    listItem[0].classList.add("item-active")
    listItem.map((item)=>{
        item.addEventListener("click",(e)=>{
            listItem.map((itemHeader)=>{
                itemHeader.classList.remove("item-active");
            })
            item.classList.add("item-active");
        });
    });
    
});