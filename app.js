
// Hamburger Open or Close Side Navigation Bar
function openNav() {
    document.getElementById("sidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("sidenav").style.width = "0";
}

// Countries Option REST API
document.addEventListener('DOMContentLoaded', () => {
    const selectDrop = document.querySelector('#countries');

    fetch('https://restcountries.com/v3.1/all').then(res => {
        return res.json();
    }).then(data => {
        let countryOpt = "";
        var sortedCountries = [];
        for (var i = 0; i < data.length; i++) {
            sortedCountries[i] = data[i].name.common;
        }
        sortedCountries.sort();
        for (var i = 0; i < sortedCountries.length; i++) {
            countryOpt += `<option>${sortedCountries[i]}</option>`;
        }
        selectDrop.innerHTML += countryOpt;
    }).catch(err => {
        console.log(err);
    })

});

// Quantity Select Option
document.addEventListener('DOMContentLoaded', () => {
    const selectProd = document.getElementById("testt");
    for (var i = 0; i < 100; i++) {
        var opt = document.createElement("option");
        opt.append(i);
        selectProd.appendChild(opt);
    }
});

// Remove Product in Cart
function removeProduct() {
    document.getElementsByClassName("cart products").remove();
};

// RegEx for Registration
// $(document).ready(function() {
//     $("#registrationForm").on(function(e) {
//         e.preventDefault();

//     if (!f_nameRGEX.test(f_name)) {
//         alert("Please enter a valid first name!");
//         return false;
//     }
//     if (!l_nameRGEX.test(l_name)) {
//         alert("Please enter a valid last name!");
//         return false;
//     }
//     if (!emailRGEX.test(email)) {
//         alert("Please enter a valid email!");
//         return false;
//     }
//     if (!passwdRGEX.test(passwd)) {
//         alert("Please enter a valid password\n(Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character)!");
//         return false;
//     }
//     fetch('?controller=user&action=insert', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/x-www-form-urlencoded',
//         },
//         body: `F_NAME=${f_name}&L_NAME=${l_name}&EMAIL=${email}&PASSWD=${passwd}&C_PASSWD=${confirmPasswd}`
//     })
//     .then(response => response.text())
//     .then(data => {
//         alert(data); // Display the response from the server
//     })
//     .catch(error => {
//         console.error('Error:', error);
//     });
    
// }
//     );
// }
// );
// Regex:
// https://www.w3schools.com/php/php_form_url_email.asp


// Select Option User Criteria Search
function status_update(value) {
    window.location.href = "?controller=product&action=newarrivals&page=1&criteria=" + value;
}