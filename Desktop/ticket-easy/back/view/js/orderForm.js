function state()
  {
    var letters = /^[A-Za-z]+$/;
    var verif=document.getElementById('orderState').value
    if(!(verif.match(letters))||(verif.length<3))
    {
        document.getElementById('OrderstateError').innerHTML="Name must contain at least 3 characters";
        document.getElementById("OrderstateError").style.color='red';
    }
    else
    {
        document.getElementById('OrderstateError').innerHTML="";
    }
}

  function stateValidation ()
{
  var letters = /^[A-Za-z]+$/;
    var verif=document.getElementById('orderState').value
    if(!(verif.match(letters))||(verif.length<3))
    {
        document.getElementById('orderState').innerHTML="wrong";
       document.getElementById("orderState").style.color="red";
    }
    else
    {
        document.getElementById('orderState').innerHTML="correct";
        document.getElementById("orderState").style.color='green';
    }
}

document.getElementById('OrderForm').addEventListener('submit',(event)=>
  {event.preventDefault();
    
    state();
    stateValidation ();
    
  })