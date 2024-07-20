var uname=document.getElementById('name');
var form=document.getElementById('form');
var number=document.getElementById('number');
var mail=document.getElementById('mail');
var date=document.getElementById('date');
var height=document.getElementById('height');
var weight=document.getElementById('weight');
var pin=document.getElementById('pin');
var age=document.getElementById('age');
var address=document.getElementById('address');
var bloodgroup=document.getElementById('bloodgroup');
var state=document.getElementById('state');
var gender=document.getElementById('gender');



function getname(input){
    return input.getAttribute('data-name');
 }
 
 /*function error(input,message){
     const fgroup=input.parentElement;
     fgroup.className="fgroup error";
     const p=fgroup.querySelector('p');
     p.innerHTML=message;
 }*/

 function error(input, message) {
  const fgroup = input.parentElement;
  if (fgroup) {
    fgroup.className = "fgroup error";
    const p = fgroup.querySelector('p');
    if (p) {
      p.innerHTML = message;
    }
  }
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
        if(input.value.trim()==""){
            error(input,`${getname(input)} is required`);
            valid=false;
        }
        else{
            success(input);
            return true;
        }
    });
    return valid;
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
      error(input,`${getname(input)} is Required`);
      return false;
  }
  else if(data == val){
    success(input);
   return true;
  }
  else{
    error(input,`Please Enter Your Correct ${getname(input)} Digits`);
      return false;
  }
}


/*function checkradio(element, classname) {
  let radios = element.getElementsByClassName(classname);
  let isChecked = false;
  for (let i = 0; i < radios.length; i++) {
      if (radios[i].checked) {
          isChecked = true;
          break;
      }
  }
  return isChecked;
}*/

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
function stat(){
  var stat=document.myform.state.value;
  if(stat==""){
      error(state, `State is Required`);
      return false;
  }
  else{
      success(state);
      return true;
  }
}

      form.addEventListener("submit",function(e){
        e.preventDefault();
      checkvalue([uname,number,date,pin,mail,age,weight,height,address]);
      var two=   checkmail(mail);
      var three= checklength(uname,3,18);
      var four= checknumber(number,10);
      var five=checknumber(pin,6);
      var six=checklength(address,5,50);
      var seven=blood();
      var eight=gen();
      var nine=stat();
      console.log(two,three,four,five,six,seven,eight,nine);
      
      if (two && three && four && five && six && seven && eight && nine) {
            fetch('donor.php', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
              },
              body: new URLSearchParams({
                name: uname.value,
                email: mail.value,
                addr: address.value,
                phno: number.value,
                date: date.value,
                age: age.value,
                height: height.value,
                weight: weight.value,
                pin: pin.value,
                bloodgroup: bloodgroup.value,
                state: state.value,
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

 /* const six=checkradio(bloodgroup);
       const seven=checkradio(state);
       const eight=checkradio(gender);
      const isStateSelected = checkradio(state[0], 'state');
      const isGenderSelected = checkradio(gender[0], 'gender');
      if (!isStateSelected) {
          error(state[0], `${getname(state[0])} is required`);
      }
      if (!isGenderSelected) {
          error(gender[0], `${getname(gender[0])} is required`);
      }
     const seven = checkradio(state, 'state'); // Modified
      const eight = checkradio(gender, 'gender'); // Modified
      const isstateSelected = seven; // Modified
  
      if (!isstateSelected) {
          error(state[0], `${getname(state[0])} is required`); // Modified
      }*/