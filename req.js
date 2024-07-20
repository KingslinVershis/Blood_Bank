var uname=document.getElementById('name');
var form=document.getElementById('form');
var number=document.getElementById('number');
var mail=document.getElementById('mail');
var date=document.getElementById('date');
var gender=document.getElementById('gender');
var priority=document.getElementById('priority');
var bloodgroup=document.getElementById('bloodgroup');
var hospital=document.getElementById('hptl'); 

function blood(){
    var blood=document.myform.bloodgroup.value;
    if(blood==""){
        error(bloodgroup, `Blood Type is Required`);
        return false;
    }
    else{
        success(bloodgroup);
        return true;
    }
}

function prio(){
    var prior=document.myform.priority.value;
    if(prior==""){
        error(priority, `Priority is Required`);
        return false;
    }
    else{
        success(priority);
        return true;
    }
}

function gen(){
    var gend=document.myform.gender.value;
    if(gend==""){
        error(gender, `Gender is Required`);
        return false;
    }
    else{
        success(gender);
        return true;
    }
}
String.prototype.isEmail = function() {
    return !!this.match(/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/);
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

function checknumber(input,val){
    const data=input.value.length;
    if(input.value===""){
        error(input,`${getname(input)} is Required`)
        return false;
    }
    else if(data == val){
        success(input);
        return true;
    }
    else{
        error(input,`Please Enter Your 10 Digit ${getname(input)}`)
        return false;
    }
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


function checkvalue(inputs){
    let valid=true;
    inputs.forEach((input) => {
        if(input.value.trim()==""){
            error(input,`${getname(input)} is required`);
            valid=false;
        }
        else{
            success(input);
        }
    });
    return valid;
}

function getname(input){
   return input.getAttribute('data-name');
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




form.addEventListener("submit",function(e){
   e.preventDefault();
   var one= checkvalue([uname,number,mail,hospital,date]);
   var two= checklength(uname, 3, 15);
   var three= checkmail(mail);
   var four= checknumber(number,10);
   var five=checklength(hospital,5,25);
   var six=blood();
   var seven=prio();
   var eight=gen();  
   console.log(one,two,three,four,five,six,seven,eight);

    if (one && two && three && four && five && six &&seven && eight) {
        
        fetch('req.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
          },
          body: new URLSearchParams({
            name: uname.value,
            mail: mail.value,
            address: hospital.value,
            number: number.value,
            date: date.value,
            bloodgroup: bloodgroup.value,
            priority: priority.value,
            gender: gender.value

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
