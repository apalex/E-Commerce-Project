
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

// Select Option User Criteria Search
function status_update(value) {
    window.location.href = "?controller=product&action=newarrivals&page=1&criteria=" + value;
}

// Validate if an address has been selected
document.addEventListener('DOMContentLoaded', () => {
    var radioBtn = document.getElementsByName("address");
    for (var i = 0; i < radioBtn.length; i++) {
        if (document.getElementsByName("address").checked == true) {
            return true;
        } else if (i == radioBtn.length - 1) {
            document.getElementById("Place-Order").addEventListener("click", function(event) {
                event.preventDefault();
            })
        }
    }
})

function validateAddress() {
    if (document.querySelector('input[name="address"]:checked')) {
        return true;
    } else {
        event.preventDefault();
    }
}
