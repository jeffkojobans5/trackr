// greetings
let greet = document.getElementById('greetings')
var d = new Date();
var time = d.getHours();

if (time < 12) {
  greet.innerHTML = "Good Morning"
}
if (time > 12) {
  greet.innerHTML = "Good Afternoon"
}
if (time == 12) {
  greet.innerHTML = "Good Evening"
}
