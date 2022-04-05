const deleteItem=document.getElementsByClassName("littleCross");

for( const item of deleteItem){
item.addEventListener("click",()=>{
    document.location.href=`./index.php?page=add&section=delete&id=${item.dataset.id}`
})

}