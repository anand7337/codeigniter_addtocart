// Import the functions you need from the SDKs you need
// import { initializeApp } from "https://www.gstatic.com/firebasejs/9.22.0/firebase-app.js";
// import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.22.0/firebase-analytics.js";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
    apiKey: "AIzaSyAIa4Ib9l6JkksxZnjED8j6mhRsxcJ9P9E",
    authDomain: "ci3-verification.firebaseapp.com",
    projectId: "ci3-verification",
    storageBucket: "ci3-verification.appspot.com",
    messagingSenderId: "778064711628",
    appId: "1:778064711628:web:3253bd554f56977d50d769",
    measurementId: "G-V4Z8ZEH8G6"
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);
firebase.analytics();

// const app = initializeApp(firebaseConfig);
// const analytics = getAnalytics(app);



window.onload = function() {
    render();
}

function render() {
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
    recaptchaVerifier.render();

}
// var coderesult;
function phoneAuth() {
    //get the number
    var number = document.getElementById('phone').value;
    // alert(number);
    //it takes two parameter first one is number and second one is recaptcha
    firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier)
        .then(function(confirmationResult) {

            window.confirmationResult = confirmationResult;
            coderesult = confirmationResult;
            console.log(coderesult);
            alert("Message sent");
        }).catch(function(error) {
            alert(error.message);
        });

}