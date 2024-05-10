(function() {

let field = document.querySelector('.item');
let li = Array.from(field.children);
function SortProduct() {
let select = document.getElementById('select');
let ar = [];

for(let i of li)
{
    const last = i.lastElementChild;
    const x = last.textContent.trim();
    const y =Number(x.substring(1));
    i.setAttribute('data-price', y);
    ar.push(i);
}
this.run = ()=>{
    addevent();
}
function addevent(){
select.onchange = sortingValue;
}
function  sortingValue(){

    if (this.value == 'Default')
    {
       while(field.firstchild){
        field.removeChild(field.firstChild);
       } 
       field.append(...ar);
    }
    if (this.value === 'low-high')
    {
        sortElem(field, li, true);
    }
    if(this.value === 'high-low')
    {
        sortElem(field, li, false);
    }
}

function sortElem(field, li, asc)
{
    let dm, sortLi;
    dm = asc ? 1 : -1;
    sortLi = li.sort((a, b)=>{
        const ax = a.getAttribute('data-price');
        const bx = b.getAttribute('data-price');

        return ax> bx ? (1*dm) : (-1*dm);
    })
    while(field.firstchild)
    {
        field.removeChild(field.firstChild);
    }
    field.append(...sortLi);
}
}
new SortProduct().run();
	})();