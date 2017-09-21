
function validateForm(event) {

    var phone = document.form.phone.value,
    email = document.form.email.value,
    fname = document.form.fname.value,
    lname=document.form.lname.value,
    gender=document.form.gender.value,
    selected1=document.form.country.value,
    selected2=document.form.countryI.value,
    year=document.form.year.value, 
    
    tomatch = /^\d{3}-\d{3}-\d{4}$/,
    emailMatch =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/,
    errors = [];

    

    if (!fname){
      errors.push("Enter your first name");
    }

    if (!lname){
      errors.push("Enter your last name");
    }
    if (!year){
      errors.push("Please enter year of birth");
    }
    if (!gender){
      errors.push("select your gender");
    }
    if (!phone){
      errors.push("The Phone Number is required.");
    } else if (!tomatch.test(phone)){
      errors.push("The phone number must be formated as follows: XXX-XXX-XXXX.");
    }
    if (!email){
      errors.push("The email is required.");
    } else if (!emailMatch.test(email)){
      errors.push("The email must be formated as follows: name@domain.com.");
    }
    if (!selected1){
      errors.push("Please select your country");
    }
    if (!selected2){
      errors.push("Please select your country of interest");
    }
    if(!document.form.agree.checked) {
      errors.push("Please accept the terms");
    }
    
    
    if (errors.length) {
      event.preventDefault();
      alert(errors.join("\n"));
    }

}