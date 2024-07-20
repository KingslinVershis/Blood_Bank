var uname=document.getElementById('name');
var mail=document.getElementById('email');
var number=document.getElementById('number');
var city=document.getElementById('city');
var country=document.getElementById('country');
var state=document.getElementById('state');
var form=document.getElementById('form');
var amount=document.getElementById('amount');
var button1=document.getElementsByClassName('a1');
var button2=document.getElementsByClassName('a2');
var button3=document.getElementsByClassName('a3');

function btn1(){    
    var x;
   var b1= button1.value=100;
    x=amount.value=b1;
}

function btn2(){
     var b2= button2.value=500;
     amount.value=b2;
  }

function btn3(){
     var b3= button3.value=2000;
     amount.value=b3;
  }


function error(input,message){
    const fgroup=input.parentElement;
     fgroup.className="fgroup error";
     const p=fgroup.querySelector('p');
     p.innerHTML=message;
}

function success(input){
    const fgroup=input.parentElement;
    fgroup.className="fgroup success";
    const p=fgroup.querySelector('p');
    p.innerHTML="";
}

function checkvalue(inputs){
    let valid=true;
    inputs.forEach((input) => {
        if(input.value.trim()===""){
            error(input,`Fill Your ${getname(input)}`);
            valid = false;
        }
        else{
            success(input);
        }
    });
    return valid;
}

function checknumber(input,val){
    const data=input.value.length;
    if(input.value===""){
        error(input,`${getname(input)} is Required`);
        return false;
    }
    else if(data == val){
      success(input);
     return true;
    }
    else{
      error(input,`Please Enter Your 10 Digit Mobile ${getname(input)} `);
        return false;
    }
  }

  function checklength(input, min, max) {
    const data = input.value.trim().length;
    if(input.value === ""){
       error(input, `${getname(input)} is Required`);
    }
    else if(data < min){
        error(input, `${getname(input)} Must Greater Than ${min} Character`);
    }
    else if(data>max){
        error(input, `${getname(input)} Must Smaller Than ${max} Character`);
    }
    else {
        success(input);
       return true;
    }
    return false;
}

String.prototype.isEmail = function() {
    return !!this.match(/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/);
}


function checkmail(input) {
    if(input.value === "")
{
    error(input, `${getname(input)} is Required`);
    return false;
}
else if (!input.value.trim().isEmail())
{
    error(input, `Please Enter a valid email ID`);
    return false;
}
return true;
}

function getname(input){
    return input.getAttribute('data-name');
 }


form.addEventListener("submit",function(e){
    e.preventDefault();
    var two=checknumber(number,10);
    var three=checklength(uname,3,20);
    var four=checkmail(mail);
    var one=checkvalue([uname,mail,number,amount,state,country,city]);
    console.log(one,two,three,four);
    if(two && three && four && one){
        fetch('donator.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
              
                name: uname.value,
                mail: mail.value,
                number: number.value,
                city: city.value,
                state: state.value,
                country: country.value,
                amount: amount.value
            })
          })
          .then(response => {
            if (response.ok) {
              // Redirect to another page
              window.location.href = 'login.html';
            } else {
              throw new Error('Something went wrong');
            }
          })
          .catch(error => console.error(error));
        }
});

